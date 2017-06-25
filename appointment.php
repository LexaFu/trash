<?php 
ob_start();
include "header.php";

// REQUETE SQL
$req = $bdd->query("SELECT DATE_FORMAT(date_create,'%d/%m/%Y à %Hh%imin') AS date_create_fr FROM appointment ORDER BY date_create LIMIT 10");

if (!isset($_SESSION['id_user'])) {

        header('Location: login.php'); 

    }else{ ?>

    <div class="appointment_container">
      <form class= "appointment_form" action="app_post.php" method="get" >
        <fieldset>
          <div class="adr_ctn">
            <input type="text" name="street" placeholder="Rue: " required><br>
            <input type="text" name="city" placeholder="Ville: " required><br>
            <input type="text" name="cp" placeholder="Code Postal: " pattern="33[0-9]{3}" maxlength="5" minlength="5" required><br>
            <input type="text" name="phone" placeholder="Téléphone: " required><br>
          </div>
            <input type="date" id="datepicker" name="date_appointment" placeholder="Date de rendez-vous" required>  <br>
            <label>Heure: </label> 
            <input class="hour_appointment" type="time" name="hour_appointment" required><br>
            <label for="type">Type d'encombrant: </label>
            <select name="type">
              <option>Mobilier</option>
              <option>Mécanique</option>
              <option>Environnemental</option>
            </select>
            <br>
            <label for="size">Taille de l'encombrant: </label>
            <select name="size">
              <option>Petit</option>
              <option>Moyen</option>
              <option>Grand</option>
            </select>
            <br>
            <textarea name="description" size="150" rows="5" cols="35" placeholder="Description: "></textarea>
     
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

<script>
  
// Initialise la prévisualisation
// sélectionne le bouton preview par l'id, ajoute un évènement au clic en annulant la validation directe du formulaire. Création d'une variable form qui sélectionne reporting_form, renvoie l'élément par l'id et remplace son contenu par ce qui est saisi dans le formulaire dans l'espace 'previewArea'. Puis, rend visible le bouton 'realSend'
document.querySelector('#previewButton').addEventListener('click',function(e){
  e.preventDefault();
  var form = document.querySelector('.appointment_form');
  var contenuPhone = form.phone.value;
  var contenuAddress = form.street.value+''+form.city.value;
  var contenuCp = form.cp.value;
  var contenuType = form.type.value;
  var contenuSize = form.size.value;
  var contenuDescription = form.description.value;
  var previewAreaContent = '';
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

<?php 
}
  include "footer.php"; 
?>

