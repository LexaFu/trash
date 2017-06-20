<meta charset="utf-8">
<?php

// pour rester connecter
session_start();
include 'connect.php';

 //prépare la requête à insérer dans la base de données
$req = $bdd->prepare('INSERT INTO reporting (address, cp, description, type, size, date_create) VALUES( :address, :cp, :description, :type, :size, NOW() )');

//exécute la requête et les données sont enregistrées sous forme de tableau
$req->execute(array(
	'address'			=>$_POST['address'],
	'cp'				=>$_POST['cp'],
	'description'		=>$_POST['description'],
	// 'img'=>$_FILES['img']['name'],
	'type'				=>$_POST['type'],
	'size'				=>$_POST['size']
	));

 
if (isset($_POST['preview'])) { ?>
 	<p>Vous avez noté un emcombrant de type <?php echo $_POST['type'];?>, de taille <?php echo $_POST['size'];?>, avec la description <?php echo $_POST['description'];?>, à l'adresse <?php echo $_POST['address'];?>
 	
 	<button type="submit" name="submit">Envoyer</button>
 	<?php header('Location: index.php');?>
<?php 
} elseif (isset($_POST['submit'])) { 

	header('Location: index.php');
 
 
} else {
 
    echo "";
 
}

?>

