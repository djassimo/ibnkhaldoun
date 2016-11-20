<?php
require_once "../db.php";

$req = $bdd->query("Select * from localisation");
  if($req->rowCount() >0){
      
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>Document</title>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
</head>
<body>
    <div class="container">
    <?php
 
          
     
    while($data = $req->fetch()){
        echo $data['city']."<br>";
        $lat = $data['latitude'];
        $lng = $data['longitude'];
        
       
    }
     // $lat = "36.75220486920335";
       // $lng = "10.160601562500005";
    ?>
        
          <div id="map"></div>
    </div>
    
  
    
    <script>
    function initMap() {
    	
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 5,
            center: {lat: 39.753768, lng: 10.644}
            
        });
        var geocoder = new google.maps.Geocoder();

       /* document.getElementById('submit').addEventListener('click', function() {
            geocodeAddress(geocoder, map);
        });*/
     
     
	 	var marker = new google.maps.Marker({
	    	position: {lat: <?php echo $lat; ?>, lng: <?php echo $lng; ?>},
	    	map: map,
	    	title: "qsdfqf",
	    	draggable: false
	    });


	 	/*google.maps.event.addListener(marker, 'drag', function(){
	 		setPosition(marker);


	 	});*/


    }

    
    function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                resultsMap.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: resultsMap,
                    position: results[0].geometry.location
                });
                
            } else {
                alert('La ville est introuvable: ' + status);
            }
        });
    }
    
    function setPosition(marker) {
    	var pos= marker.getPosition();

		$('#Latitude').val(pos.lat());
		$('#Longitude').val(pos.lng());
		
	}

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyJ5_W_BaAsUAhJff4Ewrq7P845mJ1Udg&callback=initMap"
        async defer></script>
	
</body>
</html>




