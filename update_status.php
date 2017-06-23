<?php
session_start();
include "connect.php";

if (isset($_GET['reserve'])){
	$id_reporting = $_GET['reserve'];
	$status = 'reserved';
} elseif (isset($_GET['done'])) {
	$id_reporting = $_GET['done'];
	$status = 'collected';
} else {
	echo 'Pas pris en charge pour le moment';
}

//prépare la requête à insérer dans la base de données
$req = $bdd->prepare('UPDATE reporting SET status=:status, who_do_it=:who, handle_date=NOW() WHERE id_reporting=:id');


//exécute la requête et les données sont enregistrées sous forme de tableau
$req->execute(array(
	'id'			=>$id_reporting,
	'status'		=>$status,
	'who'			=>$_SESSION['id_user']
	
	));
