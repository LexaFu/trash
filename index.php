<?php
    include 'header.php';
?>

<!--si la session est active, selectionne par l'id les nom, prénom -->
<?php
if(isset($_SESSION['id_user'])) {
$req = $bdd->prepare('SELECT first_name, last_name FROM users WHERE id_user=:id_user');
$req->execute(array(
	'id_user'=>$_SESSION['id_user'])); 
$resultat = $req-> fetch();

?>

<!-- affiche le message avec données contenues -->
<p>Bonjour, <?php echo $resultat['first_name']?> <?php echo $resultat['last_name'];?></p>

<?php
}
?>

	<div class="map-container">
	    <div class="map" id="map">
	    </div>
    </div>

<?php
    include 'footer.php';
?>





