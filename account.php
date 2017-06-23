<?php 
include "header.php";
?>

<!-- récupère nom, prénom, email et téléphone par id_user et le stocke dans $resultat -->
<?php  
$req = $bdd->prepare('SELECT first_name, last_name, email, phone, status FROM users WHERE id_user=:id_user');
$req->execute(array(
	'id_user'=>$_SESSION['id_user']));
$resultat = $req-> fetch();
?>

<!-- affiche le message avec données contenues dans $resultat -->
<p>Bonjour <?php echo $resultat['first_name']?></p>

<p>Mes informations: </p>
<div class="data_user">
	<label for="last_name">Nom: </label>
	<input type="text" name="last_name" value="<?php echo $resultat['last_name'];?>">
	<label for="email">Email: </label>
	<input type="text" name="email" value="<?php echo $resultat['email']?>">
	<label for="phone"></label>
	<input type="text" name="phone" value="<?php echo $resultat['phone']; ?>">	
</div>

<?php 
if ($resultat['status'] == 0) {
$req = $bdd->prepare('SELECT date_appointment, hour_appointment FROM appointment');
$req->execute(array(
	'date_appointment'=>$_GET['date_appointment'],
	'hour_appointment'=>$_GET['hour_appointment']
	))
?>

<p>Vous avez pris rendez vous pour le <?php echo $_GET['date_appointment']; ?> à <?php echo $_GET['hour_appointment']; ?>.</p>

<?php 
}
?>            
