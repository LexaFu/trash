<meta charset="utf-8">
<?php

// pour rester connecter
session_start();
include 'connect.php';

 //prépare la requête à insérer dans la base de données
$req = $bdd->prepare('INSERT INTO reporting (address, cp, latitude, longitude, description, type, size, date_create) VALUES( :address, :cp, :latitude, :longitude, :description, :type, :size, NOW() )');

//exécute la requête et les données sont enregistrées sous forme de tableau
$req->execute(array(
	'address'			=>$_POST['address'],
	'cp'				=>$_POST['cp'],
	'latitude'			=>$_POST['latitude'],
	'longitude'			=>$_POST['longitude'],
	'description'		=>$_POST['description'],
	// 'img'=>$_FILES['img']['name'],
	'type'				=>$_POST['type'],
	'size'				=>$_POST['size']
	));
	if(isset($_POST['latitude']) && isset($_POST['longitude'])){
/*
  $lat = addslashes($_POST['latitude']);
  $lng = addslashes($_POST['longitude']);
  $adr = addslashes($_POST['address']);
  $db = new PDO('mysql:host=localhost;dbname=trash;charset=latin1', 'root','');
  $select = new PDO(DATABASE, $db);
  mysql_query('INSERT INTO reporting (latitude,longitude,address)
               VALUES ("'.$lat.'","'.$lng.'","'.$adr.'")');
*/
  echo 'Vos coordonnées ont bien été insérées en base de données.';
 }else
   echo 'Problème rencontré dans les valeurs passées en paramètres';

?>

