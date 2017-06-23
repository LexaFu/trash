<?php 
include "header.php";
?>

<!-- récupère nom, prénom, email et téléphone par id_user et le stocke dans $resultat -->
<?php  
$req = $bdd->prepare('SELECT first_name, username, last_name, email, phone, status FROM users WHERE id_user=:id_user');
$req->execute(array(
	'id_user'=>$_SESSION['id_user']));
$resultat = $req-> fetch();
?>

<div class="data_user">
	<div class="dt_u_ctn">
		<p>Mes informations: </p>
		<label for="last_name">Nom: </label>
		<input type="text" name="last_name" id="lst-nm" value="<?php echo $resultat['last_name'];?>"><br>
		<label for="first_name">Prénom: </label>
		<input type="text" name="first_name" id="fst-nm" value="<?php echo $resultat['first_name']?>"><br>
		<label for="username">Pseudo: </label>
		<input type="text" name="username" id="usnm" value="<?php echo $resultat['username'];?>">
		<label for="email">Email: </label>
		<input type="text" name="email" id="eml" value="<?php echo $resultat['email']?>"><br>
		<label for="phone">Téléphone: </label>
		<input type="text" name="phone" id="phn" value="<?php echo $resultat['phone']; ?>">	
	</div>
	<div class="apt_ctn">
		<?php 
		if (isset($_GET['date_appointment']) && isset($_GET['hour_appointment'])) {
		$req = $bdd->prepare('SELECT date_appointment, hour_appointment FROM appointment');
		$req->execute(array(
			'date_appointment'=>$_GET['date_appointment'],
			'hour_appointment'=>$_GET['hour_appointment']
			))
		?>

		<p>Vous avez pris rendez vous pour le <?php echo $_GET['date_appointment']; ?> à <?php echo $_GET['hour_appointment']; ?>.</p>

		<?php 
		} else { ?>
			<p>Vous n'avez pris aucun rendez vous pour le moment</p>
		<?php
		}
		?>
	</div>
</div>

<?php
include "footer.php";
?>            
