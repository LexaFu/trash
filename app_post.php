<?php
ob_start();
include "header.php";

//prépare la requête à insérer dans la base de données
$req = $bdd->prepare('INSERT INTO appointment (phone, street, city, cp, latitude, longitude, description, type, size, date_appointment, hour_appointment, date_create) VALUES(:phone, :street, :city, :cp, :latitude, :longitude, :description, :type, :size, :date_appointment, :hour_appointment, NOW() )');

//exécute la requête et les données sont enregistrées sous forme de tableau
$req->execute(array(
	'phone'				=>$_GET['phone'],
	'street'			=>$_GET['street'],
	'city'				=>$_GET['city'],
	'cp'				=>$_GET['cp'],
	'latitude'			=>$_GET['latitude'],
	'longitude'			=>$_GET['longitude'],
	'description'		=>$_GET['description'],
	'type'				=>$_GET['type'],
	'size'				=>$_GET['size'],
	'date_appointment'	=>$_GET['date_appointment'],
	'hour_appointment'	=>$_GET['hour_appointment']
	));

if(isset($_GET['latitude']) && isset($_GET['longitude'])){
	echo 'Vos coordonnées ont bien été insérées en base de données.';
 }else{
   echo 'Problème rencontré dans les valeurs passées en paramètres';
}

//Celà envoie un message et redirige vers la page index
$msg = 'Rendez vous enregistré';
   header('Location: account.php?street='.$_GET['street'].'&city='.$_GET['city'].'&cp='.$_GET['cp'].'&description='.$_GET['description'].'&type='.$_GET['type'].'&size='.$_GET['size'].'&date_appointment='.$_GET['date_appointment'].'&hour_appointment='.$_GET['hour_appointment'].'');
?>


