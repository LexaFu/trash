//initialise la map
// In the following example, markers appear when the user clicks on the map.
// Each marker is labeled with a single alphabetical character.
var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
var labelIndex = 0;
var pos;

function initialize() {
  var bordeaux = { lat: 44.837789, lng: -0.579180 };
  var infoWindow = new google.maps.InfoWindow({map: map});
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 15,
    center: bordeaux
  });

// partie Geolocalisation
if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      map.setCenter(pos);

    infoWindow.setPosition(pos);
    infoWindow.setContent('Vous êtes ici');
    map.setCenter(pos);
    }, function () {
            handleLocationError(true, infoWindow, map.getCenter());
        });

    // This event listener calls addMarker() when the map is clicked.
    google.maps.event.addListener(map, 'click', function(event) {
        addMarker(event.latLng, map);
    });

    // Add a marker at the center of the map.
    addMarker(bordeaux, map);
  
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }
    var marker = new google.maps.Marker({
        position: pos,
        map: map,
        title: 'Hello World!'
    });
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
  // console.log(location.lat);
}
google.maps.event.addDomListener(window, 'load', initialize);

// Initialize Firebase
    var config = {
        apiKey: "AIzaSyAHOt1qxJqwBEVFk9g3rk3BmB2kdhUBl7o",
        authDomain: "trash-8dd6d.firebaseapp.com",
        databaseURL: "https://trash-8dd6d.firebaseio.com",
        storageBucket: "trash-8dd6d.appspot.com",
        messagingSenderId: "1070605843017"
    };
    firebase.initializeApp(config);


// initialise le calendrier pour la prise de rendez-vous
 $( function() {
    $( "#datepicker" ).datepicker({
    	altField: "#datepicker",
		closeText: 'Fermer',
		prevText: 'Précédent',
		nextText: 'Suivant',
		currentText: 'Aujourd\'hui',
		monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
		monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
		dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
		dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
		dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
		weekHeader: 'Sem.',
		dateFormat: 'yy-mm-dd'
    });
  });


 //ajout test marqueurs


//  var liste_des_points=[
//   [45.777107436477785, 3.0818769335746765],
//   [45.8, 3.2]
// ];
 
// var imageMarqueur = new google.maps.MarkerImage('images/Marqueur.png'), new google.maps.Size(24, 24), new google.maps.Point(0,0), new google.maps.Point(12, 12));//je suppose ici que c'est la même image pour tous les marqueurs sinon il faut mettre cette ligne dans la boucle
 
 
// var i=0,li=liste_des_points.length;
// while(i<li){
//   new google.maps.Marker({
//           position: new google.maps.LatLng(liste_des_points[i][0], liste_des_points[i][1]),
//           map: Carte,
//           title: "Marqueur-"+i,
//           icon: imageMarqueur,
//      });
//   i++;
// }

