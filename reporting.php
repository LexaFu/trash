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
    		<input type="text" name="address" placeholder="Adresse" required>
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
 			<!-- <button type="submit" name="preview" >Prévisualiser</button>
    		<button type="submit" value="preview" name="preview" target="popup" onclick="javascript:window.open('reporting.php','popup','width=500,height=500')">Envoyer</button> -->
    		<input type="submit" id="previewButton" name="preview" value="Prévisualiser pour envoyer">
    		<input type="submit" id="realSend" name="realSend" value="Confirmer l'envoi" class="hidden">
		</div>

	</form>
	
	<div class="map-container">
		<div id="map" class="map">
		</div>
	</div>
	<script>
		document.querySelector('#previewButton').addEventListener('click',function(e){
			e.preventDefault();
			var form = document.querySelector('.reporting_form');
			document.getElementById('previewArea').innerHTML=form.address.value;
			document.getElementById('realSend').className="";
			return false;
		},false);
	</script>
	
<?php 
	include "footer.php"; 
?>
