//initialise la map
function initMap() {
    var pos;
    // Create a map object and specify the DOM element for display.
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -34.397, lng: 150.644},
        scrollwheel: false,
        zoom: 15
    });
    var infoWindow = new google.maps.InfoWindow({map: map});

    // Try HTML5 geolocation.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            ok.addEventListener("click", function (){
                var marker = new google.maps.Marker({
                    position: pos,
                    map: map,
                    title: 'Hello World!'
                });
            });

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            map.setCenter(pos);
        }, function () {
            handleLocationError(true, infoWindow, map.getCenter());
        });
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

