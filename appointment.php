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
          <p>Entrez vos coordonnées</p>
          <div class="adr_ctn">
            <input type="text" name="street" placeholder="N° et nom de la rue: " required>
            <input type="text" name="city" placeholder="Ville: " required>
            <input type="text" name="cp" placeholder="Code Postal: " pattern="33[0-9]{3}" maxlength="5" minlength="5" required>
            <input type="text" name="phone" placeholder="Téléphone: " required>
          </div>
          <p>Informations sur l'encombrant</p>
          <div class="info_ctn">
            <div class="hourAndDate">
              <label for="date_appointment">Date: </label>
              <input id="datepicker" name="date_appointment" required>
              <label>Heure: </label> 
              <input class="hour_appointment" type="time" name="hour_appointment" required>
            </div>
            <div class="typeAndSize">
              <div class="type">
                <input type="radio" name="type" value="Mobilier">
                <p>Mobilier</p>
                <input type="radio" name="type" value="Mécanique">
                <p>Mécanique</p> 
                <input type="radio" name="type" value="Environnemental">
                <p>Environnemental</p> 
              </div>
              
              <div class="size">
                <input type="radio" name="size" value="petit"><p>petit</p>
                <input type="radio" name="size" value="moyen"><p>moyen</p>
                <input type="radio" name="size" value="grand"><p>grand</p>
              </div>
            </div>
            <br>
            <textarea name="description" size="150" rows="2" cols="25" placeholder="Description: "></textarea>
            <div class="bouton">
              <button type="submit" id="previewButton" name="preview" value="Prévisualiser pour envoyer">Prévisualiser avant d'envoyer</button>
              <input  name="latitude" type="hidden" id="latitude" value="" />
              <input  name="longitude" type="hidden" id="longitude" value="" />
              <input type="submit" id="realSend" name="realSend" value="Confirmer l'envoi" class="hidden" onclick="geolocalise()">
            </div>
          </div>
        </fieldset>
        <fieldset id="previewArea">
        </fieldset>
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

