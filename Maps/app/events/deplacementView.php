<?php
require_once "../db.php";

// récupération d'un seul trajet a partir d'une date
if(isset ($_GET['date']))
{
  $date = $_GET['date'];
  $req = $bdd->prepare("Select * from chrono WHERE d='$date'");
}else
{
  $req = $bdd->prepare("Select * from chrono WHERE id=1");
}

$req->execute();

  $nbrReq = $req->rowCount();
  $data = $req->fetch();

// récupération de tout les déplacemnt effectuer afin de remplire la barre chronologique  
  $chrono = $bdd->query("SELECT * FROM chrono");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	
	<title>Déplacement</title>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
          <link rel="stylesheet" type="text/css" href="../../css/timeline.css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
</head>
<body>
    <div class="container">
    
 
        <div id="map"></div>
         <div class="bar"></div>
      <div class="timeline">
          <?php 
            while ($d = $chrono->fetch())
             { 
              $dd=  $d['d'];
              $dateD = DateTime::createFromFormat('Y-m-d',$dd)->format('Y');
             
                     echo " <a href='deplacementview.php?date=$dd'>";
             
              ?>
                  <div class="entry">
                  <?php if ($d['dateDebut']!= NULL)
                  {
                    $id = $d['villeDepart'];
                    $villeSejour = $bdd->query("select city from localisation where id = '$id'");
                    $r = $villeSejour->fetch();
                    ?>
                    <h1><?php  echo "de ",$d['dateDebut'],"  à ",$d['d'],"<br>";?></h1>

                     <h2><?php echo $r['city']; ?></h2>
                     <?php
                  }else{
                    ?>
                   <h1><?php echo $dateD; ?></h1>
                    <h2><?php  echo "de ",$d['villeDepart'],"  à ",$d['villeArrivee'],"<br>";?></h2>
                   <?php
                  }
             
                    ?>
                </div>
              <?php
                 echo "</a>";
              /* echo "de ",$d['depart'],"  à ",$d['destination'],"
               <a href='deplacementview.php?date=$dateD'>", $d['date'],"</a> 
               <br>";*/
             } 
          ?>
</div>
        <div class="contenu">

            <div id="addinfo">
              <form>
                <label>sahit</label>
                <input type="text" name="id">
                <p id="id"></p>
              </form>

            </div>
          
        </div>
    </div>
    <script>

       
    function initMap() {
    	
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: {lat: 39.753768, lng: 10.644}
            
        });
        var geocoder = new google.maps.Geocoder();

	
      var positions =[];
      var iterator=0;
      
      
     <?php

     
      	$depart = $data['villeDepart'];
      	$destination = $data['villeArrivee'];
        $id = $data['villeDepart'];

        $sql = $bdd->prepare("Select * from localisation WHERE city = '$depart' or city = '$destination' OR 
                              id = '$id'");
  
      	
		    $sql->execute();
        $tst = $sql->rowCount();
   	  	echo $tst ;


      	while($donnees = $sql->fetch())
      	{
      	    $city = $donnees['city'];  
		        $lat = $donnees['latitude'];
		        $lng = $donnees['longitude'];
		        $idDeplacement = $donnees['id'];

      		if ($donnees['city'] == $depart)
      		 {
		        $event = "depart";
	         }else
	         {
	         	$event = "deplacement";
	         }
     ?>		
     positions.push({
         lat : <?php echo $lat; ?>,
         lng : <?php echo $lng; ?>,
         city : "<?php echo $city; ?>",
         idDeplacement : <?php echo $idDeplacement; ?>,
         event : "<?php echo $event; ?>"
     })  ;  
  <?php

    }
    
    ?>
    
     for(var i=0; i<positions.length; i++){
        setTimeout(addMarker,(i+1)*400); 
     }

     function addMarker(){
      var marker = new google.maps.Marker({
	    	position: {lat: positions[iterator].lat, lng: positions[iterator].lng},
	    	map: map,
	    	title: ""+positions[iterator].idDeplacement,
	    	draggable: false,
	    	animation: google.maps.Animation.DROP
	    });

      marker.addListener('click', function() {
        //id=positions[iterator].idDeplacement;
        //console(positions[iterator].idDeplacement);
         $("#id").text(marker.title);
      });
       iterator++;
    }

    // afficher la ligne du déplacement
     var flightPath = new google.maps.Polyline({
	    path: positions,
	    geodesic: true,
	    strokeColor: '#0066ff',
	    strokeOpacity: 1.0,
	    strokeWeight: 5
	  });

	  flightPath.setMap(map);

     	
       }  
   

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyJ5_W_BaAsUAhJff4Ewrq7P845mJ1Udg&callback=initMap"
        async defer></script>
	
</body>
</html>




