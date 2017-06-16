<?php 
include "header.php";
?>

<!-- récupère nom, prénom, email et téléphone par id_user et le stocke dans $resultat -->
<?php  
$req = $bdd->prepare('SELECT first_name, last_name, email, phone FROM users WHERE id_user=:id_user');
$req->execute(array(
	'id_user'=>$_SESSION['id_user'])); 
$resultat = $req-> fetch();
?>

<!-- affiche le message avec données contenues dans $resultat -->
<p>Bonjour, <?php echo $resultat['first_name']?> <?php echo $resultat['last_name'];?>, votre email est <?php echo $resultat['email']?> et votre numéro de téléphone est le <?php echo $resultat['phone']; ?>.</p>

<?php 
$req = $bdd->prepare('SELECT date_appointment, hour_appointment FROM appointment');
$req->execute(array(
	'date_appointment'=>$_GET['date_appointment'],
	'hour_appointment'=>$_GET['hour_appointment']
	))
?>

<p>Vous avez pris rendez vous le <?php echo $_GET['date_appointment']; ?> à <?php echo $_GET['hour_appointment']; ?>.</p>

            
