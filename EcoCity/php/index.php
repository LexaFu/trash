<?php 

include 'header.php' ?>
    
<script>
// In the following example, markers appear when the user clicks on the map.
// Each marker is labeled with a single alphabetical character.
var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
var labelIndex = 0;

function initialize() {
  var bordeaux = {lat: 44.837789, lng: -0.579180};
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 14,
    center: bordeaux
  });

  // géolocalisation
   navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
    };

        // centrer la map
        map.setCenter(pos);
    });

  // This event listener calls addMarker() when the map is clicked.
  google.maps.event.addListener(map, 'click', function(event) {
    addMarker(event.latLng, map);
  });

  // Add a marker at the center of the map.
  addMarker(bordeaux, map);
}

// Adds a marker to the map.
function addMarker(location, map) {
  // Add the marker at the clicked location, and add the next-available label
  // from the array of alphabetical characters.
  var marker = new google.maps.Marker({
    position: location,
    label: labels[labelIndex++ % labels.length],
    map: map
  });

  console.log(location.lat);
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </head>
  <body>

  	<h1>Bienvenue sur notre site écologique</h1>
		<p>Notre site est destiné à vous permettre de signaler un encombrant afin qu'un collaborateur vienne le retirer en urgence.</br> Elle vous permet aussi, en cas de déménagement, par exemple, de prendre un rendez vous afin qu'un camion soit à disposition pour venir retirer l'encombrant.</p> 

    <div id="map"></div>
  </body>

  <?php include 'footer.php' ?>
</html>
