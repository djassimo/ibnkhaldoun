<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
</head>
<body>
<div class="container">

<div>

	<label>Taper le nom de la ville : </label>
	<input id="address" type="textbox" >
  <input id="submit" type="Button" value="Montrer la ville">
 
</div>

<div id="map"></div>

<form action="app/localisation/addLocalisation.php" method="post">
    <label>Nom de la ville</label>  
    <input  type="textbox" name="nomVille" id="nomVille"><br>
    <label>Latitude</label> 
    <input id="Latitude" type="textbox" name="lat"><br>
    <label>Longitude</label>    
    <input id="Longitude" type="textbox" name="lng"><br>
    <input id="Ajouter" type="submit" name="envoyer" value="Ajouter un évènement">
</form>
</div>
<script>

    var map;
    var markers= [];


    function initMap() {
    	
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: {lat: 39.753768, lng: 20.644},
            mapTypeId: google.maps.MapTypeId.TERRAIN
        });
        var geocoder = new google.maps.Geocoder();

        document.getElementById('submit').addEventListener('click', function() {
            geocodeAddress(geocoder, map);
        });
       var shape = {
            coords: [1, 1, 1, 20, 18, 20, 18, 1],
            type: 'poly'
          };
               
	 	var marker = new google.maps.Marker({
	    	position: {lat: 39.753768 , lng: 10.644},
	    	map: map,
            shape: shape,
	    	title: "bougez moi",
	    	draggable: true,
	    });
        markers.push(marker);    
      
      
	 	google.maps.event.addListener(marker, 'drag', function(){
	 		setPosition(marker);

	 	});


    }

    function resetMarker(map){
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(map);
                  }
     }

     function informationMarker(marker){
           return contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">Latitude et longitude de cette ville</h1>'+
      '<div id="bodyContent">'+
      '<p><b>Latitude: '+marker.getPosition().lat()+'</b>, </p>'+
     '<p><b>Longitude: '+marker.getPosition().lng()+'</b>, </p>'+
      '</div>'+
      '</div>';
     }

    
    function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                resultsMap.setCenter(results[0].geometry.location);
               resetMarker(null);
              
               
                var marker = new google.maps.Marker({
                            position: results[0].geometry.location,
                            map: resultsMap,
                            title: "bougez moi",
                            draggable: true,
                });
                var contentString =informationMarker(marker);
               var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });
                setPosition(marker);
                markers.push(marker);
            } else {
                alert('La ville est introuvable: ' + status);
            }

          marker.addListener('click', function() {
            infowindow.open(map, marker);
          });
        });
       
    }
    
    function setPosition(marker) {
    	var pos= marker.getPosition();

		$('#Latitude').val(pos.lat());
		$('#Longitude').val(pos.lng());
         var val =$('#address').val(); 
        $('#nomVille').val(val);
       
	}

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyJ5_W_BaAsUAhJff4Ewrq7P845mJ1Udg&callback=initMap"
        async defer></script>

</body>
</html>
