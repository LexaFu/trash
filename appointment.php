<?php 

ob_start();
include "header.php";
?>

<?php 
  // REQUETE SQL
  $req = $bdd->query("SELECT DATE_FORMAT(date_create,'%d/%m/%Y à %Hh%imin' ) AS date_create_fr FROM appointment ORDER BY date_create LIMIT 10");
?>

<?php
if (!isset($_SESSION['id_user'])) {

        header('Location: login.php'); 

    }else{ ?>

<div class="appointment_container">
  <form class= "appointment_form" action="app_post.php" method="get" >
    <fieldset>
 		  <div class="last_name">
  		  <!-- <label for="last_name">Nom</label> -->
        <input type="text" name="last_name" placeholder="Nom" required>
      </div>

      <div class="first_name">
        <!-- <label for="first_name">Prénom</label> -->
        <input type="text" name="first_name" placeholder="Prénom" required>
      </div>

      <div class="phone">
        <!-- <label for="phone">Téléphone</label> -->
        <input type="text" name="phone" placeholder="Téléphone: " required>
      </div>


      <div class="autocomplete_ctn">

  	    <div id="locationField">
          <!-- <label for="address">Rechercher une adresse: </label> -->
          <input id="autocomplete" placeholder="Rechercher une adresse: "
             onFocus="geolocate()" type="text">
        </div>

        <!-- <input type="hidden" id="lat" name="latitude">
        <input type="hidden" id="lng" name="longitude"> -->

        <p>ou tapez la ici: </p>

        <div class="address">
          <input type="text" name="street_number" placeholder="Numéro de rue: ">
        </div>

        <div class="address">
          <!-- <label for="address">Rue: </label> -->
          <input type="text" name="street" placeholder="Rue: " required>
        </div>

        <div class="address">
        <!-- <label for="address">Ville: </label> -->
          <input type="text" name="city" placeholder="Ville: " required>
        </div>

        <div class="address">
          <!-- <label for="address">Pays: </label> -->
          <input type="text" name="country" placeholder="Pays: " required>
        </div>


        <div class="cp">
          <!-- <label for="cp">Code postal: </label> -->
          <input type="text" name="cp" placeholder="Code Postal: " pattern="33[0-9]{3}" maxlength="5" minlength="5" required>
        </div>

      </div>


      <div class="date_appointment" > 
        <input type="date" id="datepicker" name="date_appointment" placeholder="Date de rendez-vous" required>
      </div>

      <div class="hour">
        <label>Heure: </label> 
        <input class="hour_appointment" type="time" name="hour_appointment" required>
      </div>

      <div class="type">
        <label for="type">Type d'encombrant: </label>
        <select name="type">
          <option>Mobilier</option>
          <option>Mécanique</option>
          <option>Environnemental</option>
        </select>
      </div>

      <div class="size">
        <label for="size">Taille de l'encombrant: </label>
        <select name="size">
          <option>Petit</option>
          <option>Moyen</option>
          <option>Grand</option>
        </select>
      </div>

      <div class="description">
        <!-- <label for="description">Description: </label> -->
        <textarea name="description" size="250" rows="10" cols="50" placeholder="Description: "></textarea>
      </div>
    </fieldset>
    <fieldset id="previewArea">
          
    </fieldset>

      
    <div class="bouton">
      <button type="submit" id="previewButton" name="preview" value="Prévisualiser pour envoyer">Prévisualiser avant d'envoyer</button>
      <input  name="latitude" type="hidden" id="latitude" value="" />
      <input  name="longitude" type="hidden" id="longitude" value="" />
      <input type="submit" id="realSend" name="realSend" value="Confirmer l'envoi" class="hidden" onclick="geolocalise()">
    </div>
  </form>
</div>

<?php 
}
  include "footer.php"; 
?>

<script>
// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.

var placeSearch, autocomplete;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  // administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initAutocomplete() {
  // Create the autocomplete object, restricting the search to geographical
  // location types.
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
      {types: ['geocode']});

  // When the user selects an address from the dropdown, populate the address
  // fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);
}

// [START region_fillform]
function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details
  // and fill the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}
// [END region_fillform]

// [START region_geolocation]
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy
      });
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
// [END region_geolocation]

  

    // sélectionne le bouton preview par l'id, ajoute un évènement au clic en annulant la validation directe du formulaire. Création d'une variable form qui sélectionne reporting_form, renvoie l'élément par l'id et remplace son contenu par ce qui est saisi dans le formulaire dans l'espace 'previewArea'. Puis, rend visible le bouton 'realSend'
    document.querySelector('#previewButton').addEventListener('click',function(e){
      e.preventDefault();
      var form = document.querySelector('.appointment_form');
      var contenuLastName = form.last_name.value;
      var contenuFirstName = form.first_name.value;
      var contenuPhone = form.phone.value;
      var contenuAddress = form.street_number.value +' '+form.street.value+''+form.city.value+''+form.country.value;
      var contenuCp = form.cp.value;
      var contenuType = form.type.value;
      var contenuSize = form.size.value;
      var contenuDescription = form.description.value;
      var previewAreaContent = '';
      previewAreaContent += '<div>'+contenuLastName+'</div>';
      previewAreaContent += '<div>'+contenuFirstName+'</div>';
      previewAreaContent += '<div>'+contenuPhone+'</div>';
      previewAreaContent += '<div>'+contenuAddress+'</div>';
      previewAreaContent += '<div>'+contenuCp+'</div>';
      previewAreaContent += '<div>'+contenuType+'</div>';
      previewAreaContent += '<div>'+contenuSize+'</div>';
      previewAreaContent += '<div>'+contenuDescription+'</div>';
      document.getElementById('previewArea').innerHTML=previewAreaContent;
      document.getElementById('realSend').className="";

      // création d'un géocode pour entrer latitude et longitude dans bdd
      $.get('https://maps.googleapis.com/maps/api/geocode/json?address='+contenuAddress+'&key=AIzaSyCF2vmtOF3IGymbEtscniaxzr6VxBQMRFY',function(results, status){
        var coord = results.results[0].geometry.location;
        form.longitude.value = coord.lng;
        form.latitude.value = coord.lat;
        var gps = JSON.stringify(results.results[0].geometry.location)
        var previewArea = document.getElementById('previewArea');
        previewArea.innerHTML=previewArea.innerHTML+'<div>'+gps+'</div>';
      });
    },false);
  </script>
