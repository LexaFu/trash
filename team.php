<?php include "header.php"; 

	$req = $bdd->prepare ('SELECT id_user, first_name, last_name, phone, address, cp, latitude, longitude, type, size, description, img, date_create, date_appointment, status FROM appointment WHERE id_appointment = ?');
	$req->execute(array($_GET['id_url']));
	$donnees = $req->fetch();
?>

<div class="appointment_ticket">
	<input type="text" value="<?php echo $donnees['first_name']; ?>">
	<input type="text" value="<?php echo $donnees['last_name']; ?>">
	<input type="text" value="<?php echo $donnees['phone']; ?>">
	<input type="text" value="<?php echo $donnees['address']; ?>">
	<input type="text" value="<?php echo $donnees['cp']; ?>">
	<input type="textarea" value="<?php echo $donnees['description']; ?>">
	
</div>