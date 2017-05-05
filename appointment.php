<?php 
 include "header.php";
?>

<form class= "form" action="app_post.php" method="post" enctype="multipart/form-data">
   	 		<div class="last_name">
        		<label for="last_name">Nom</label>
        		<input type="text" name="last_name" />
    		</div>

    		<div class="first_name">
        		<label for="first_name">Prénom</label>
        		<input type="text" name="first_name" />
    		</div>

			<div class="phone">
				<label for="phone">Téléphone</label>
				<input type="text" name="phone">
			</div>

    		<div class="address">
        		<label for="address">Adresse</label>
        		<input type="text" name="address" />
    		</div>
    		<div class="cp">
        		<label for="cp">Code postal</label>
        		<input type="text" name="cp"></input>
    		</div>

			<div class="type">
			<label for="type">Type d'encombrant</label>
			<select name="type">
				<option>Mobilier</option>
				<option>Mécanique</option>
				<option>Environnemental</option>
			</select>
			</div>

			<div class="size">
			<label for="size">Taille de l'encombrant</label>
			<select name="size">
				<option>Petit</option>
				<option>Moyen</option>
				<option>Grand</option>
			</select>
			</div>

			<div class="description">
        		<label for="description">Description</label>
        		<textarea name="description" size="250" rows="10" cols="50"></textarea>
    		</div>

    		<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                
            <!-- <input type="file" name="img" id="img" required="true"/> -->

            <input type=submit value="submit" name="upload"/>

			<div>
			<label for="date_appointment">Date du rendez vous</label>
				<input type="date" name="date_appointment">
			</div>

	 		<div class="bouton">
        		<button type="submit">Envoyer</button>
    		</div>
		</form>