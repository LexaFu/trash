<?php 
include "header.php"; 
ob_start();

// REQUETE SQL
$req = $bdd->query('SELECT username, first_name, last_name, email, phone, address, status FROM users ORDER BY id_user');

$req->execute(array(
	
));

$donnees = $req->fetch();
?>

	<div class="client-ticket">
		<p><?php echo $donnees['username']; ?></p>
		<p><?php echo $donnees['first_name']; ?></p>
		<p><?php echo $donnees['last_name']; ?></p>
		<p><?php echo $donnees['email']; ?></p>
		<p><?php echo $donnees['phone']; ?></p>
		<p><?php echo $donnees['address']; ?></p>
		<input type="integer" value="<?php echo $donnees['status']; ?>">


	</div>

<?php
include "footer.php"; 
?>

