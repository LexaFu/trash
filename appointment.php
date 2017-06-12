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

<form class= "form" action="app_post.php" method="post" enctype="multipart/form-data">
   	 		<div class="last_name">
        		<label for="last_name">Nom</label>
            <input type="text" name="last_name">
        </div>

        <div class="first_name">
            <label for="first_name">Prénom</label>
            <input type="text" name="first_name">
        </div>

      <div class="phone">
        <label for="phone">Téléphone</label>
        <input type="text" name="phone">
      </div>

		  <div id="locationField">
          <label for="address">Rechercher une adresse: </label>
          <input id="autocomplete" placeholder="Enter your address"
             onFocus="geolocate()" type="text">
      </div>

        <div class="address">
            <label for="address">numero de rue: </label>
            <input type="text" name="street_number" id="street_number" />
        </div>

        <div class="address">
            <label for="address">Rue: </label>
            <input type="text" name="street" id="route" />
        </div>

        <div class="address">
            <label for="address">Ville: </label>
            <input type="text" name="city" id="locality" />
        </div>

      <div class="address">
            <label for="address">Région: </label>
            <input type="text" name="region" id="administrative_area_level_1" />
        </div>

        <div class="address">
            <label for="address">Pays: </label>
            <input type="text" name="country" id="country" />
        </div>


        <div class="cp">
            <label for="cp">Code postal: </label>
            <input type="text" name="cp" id="postal_code"></input>
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
            <label for="description">Description: </label>
            <textarea name="description" size="250" rows="10" cols="50"></textarea>
        </div>

        <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                
            <!-- <input type="file" name="img" id="img" required="true"/> -->

            <!-- <input type=submit value="submit" name="upload"/> -->
            <div class="date_appointment" > 
            <p>Date: <input type="text" id="datepicker" name="date_appointment"></p>
          </div>

      
      <div class="bouton">
            <button type="submit">Envoyer</button>
        </div>
    </form>




		    <script>
// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.

var placeSearch, autocomplete;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
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

    </script>

	<?php } ?>
		
<?php include "footer.php"; ?>



