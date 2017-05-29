<?php 
 include "header.php";
?>

<form class= "form" action="rep_post.php" method="post" enctype="multipart/form-data">

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
			<form>
	          	<input name="obstruction" type="radio">Gênant
	          	<input name="obstruction" type="radio">Dangereux<br>
			</form>
			<div class="description">
        		<!-- <label for="description">Description</label> -->
        		<textarea name="description" size="250" rows="10" cols="50" placeholder="Description"></textarea>
    		</div>

    		<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                
            <!-- <input type="file" name="img" id="img" required="true"/> -->

            <!-- <input type=submit value="submit" name="upload"/> -->

			
	 		<div class="bouton">
        		<button type="submit">Envoyer</button>
    		</div>
		</form>
		
<?php 
	include "footer.php"; 
?>
