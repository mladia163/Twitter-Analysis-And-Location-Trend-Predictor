<?php
$pl = 'ChIJm3fmGMjjDDkR0SBZ3jLAlYo';
?>

<!DOCTYPE html>
<html>
  <head>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyArXTg2rn4c4pUh-FxPZffnbJQuB0G84hk&libraries=places&callback=initMap">
    </script>
	
     <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

	  function initMap() {
        var type1 = '<?php echo $pl; ?>';
		var service = new google.maps.places.PlacesService(map);
		var type = "";
		//service.getDetails({
		service.getDetails({
          placeId: type1
		 }, function(place, status) {
          if (status === google.maps.places.PlacesServiceStatus.OK) {
			type = type + place.types;
			document.getElementById('chqthis').innerHTML = type;
           }
        });
	  }
	  
    </script>
  </head>
  <body>
	<div id="chqthis"></div>
	 <div id="map"></div>
    
  </body>
</html>