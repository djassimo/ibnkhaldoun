<?php
require_once "../db.php";

$req = $bdd->query("Select * from localisation");
   $nbrReq = $req->rowCount();
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
    
 
          <div id="map"></div>
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
      while($data = $req->fetch()){
        $city = $data['city'];  
        $lat = $data['latitude'];
        $lng = $data['longitude'];
     ?>		
     positions.push({
         lat : <?php echo $lat; ?>,
         lng : <?php echo $lng; ?>,
         city : "<?php echo $city; ?>"
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
	    	title: positions[iterator].title,
	    	draggable: false,
	    	animation: google.maps.Animation.DROP
	    });
       iterator++;
    }
     	
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




