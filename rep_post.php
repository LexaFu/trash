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

    header('Location: index.php');
?>

