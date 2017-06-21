<?php 
 include "header.php";
?>

<?php 
	// REQUETE SQL
	$req = $bdd->query("SELECT DATE_FORMAT(date_create,'%d/%m/%Y à %Hh%imin' ) AS date_create_fr FROM reporting ORDER BY date_create LIMIT 5");
?>

	<form class="reporting_form" action="rep_post.php" method="post" enctype="multipart/form-data">
		<fieldset id="saisie">
			<div class="address">
    			<!-- <label for="address">Adresse : </label> -->
    			<input type="text" name="address" id="address" placeholder="Adresse" required>
			</div>

			<div class="cp">
    			<!-- <label for="cp">Code postal : </label> -->
    			<input type="text" name="cp" placeholder="Code postal" pattern="33[0-9]{3}" maxlength="5" minlength="5" required />
			</div>
			<div class="type">
				<label for="type">Type d'encombrant : </label>
				<select name="type" required>
					<option>Mobilier</option>
					<option>Mécanique</option>
					<option>Environnemental</option>
				</select>
			</div>
			<div class="size">
				<label for="size">Taille de l'encombrant : </label>
				<select name="size" required>
					<option>Petit</option>
					<option>Moyen</option>
					<option>Grand</option>
				</select>
			</div>
			<div class="obstruction">
          		<label><input name="obstruction" type="radio" required>Gênant</label>
          		<label><input name="obstruction" type="radio" required>Dangereux</label><br>
			</div>
			<div class="description">
    			<!-- <label for="description">Description</label> -->
    			<textarea name="description" size="250" rows="10" cols="50" placeholder="Description"></textarea>
			</div>
			<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
        </fieldset>
        <fieldset id="previewArea">
        	
        </fieldset>
        <!-- <input type="file" name="img" id="img" required="true"/> -->

        <!-- <input type=submit value="submit" name="upload"/> -->
		
 		<div class="bouton">
    		<input type="submit" id="previewButton" name="preview" value="Prévisualiser pour envoyer">
    		<input  name="latitude" type="hidden" id="latitude" value="" />
			<input  name="longitude" type="hidden" id="longitude" value="" />
    		<input type="submit" id="realSend" name="realSend" value="Confirmer l'envoi" class="hidden" onclick="geolocalise()">
		</div>

	</form>
	
	<div class="map-container">
		<div id="map" class="map">
		</div>
	</div>

<?php 
	include "footer.php"; 
?>
	<script>
		// sélectionne le bouton preview par l'id, ajoute un évènement au clic en annulant la validation directe du formulaire. Création d'une variable form qui sélectionne reporting_form, renvoie l'élément par l'id et remplace son contenu par ce qui est saisi dans le formulaire dans l'espace 'previewArea'. Puis, rend visible le bouton 'realSend'
		document.querySelector('#previewButton').addEventListener('click',function(e){
			e.preventDefault();
			var form = document.querySelector('.reporting_form');
			var contenuAddress = form.address.value;
			var contenuCp = form.cp.value;
			var contenuType = form.type.value;
			var contenuSize = form.size.value;
			var contenuDescription = form.description.value;
			var previewAreaContent = '';
			previewAreaContent += '<div>'+contenuAddress+'</div>';
			previewAreaContent += '<div>'+contenuCp+'</div>';
			previewAreaContent += '<div>'+contenuType+'</div>';
			previewAreaContent += '<div>'+contenuSize+'</div>';
			previewAreaContent += '<div>'+contenuDescription+'</div>';
			document.getElementById('previewArea').innerHTML=previewAreaContent;
			document.getElementById('realSend').className="";
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
