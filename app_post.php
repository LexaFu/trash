<?php

// pour rester connecter
session_start();

 include 'connect.php';

// si $_FILES est défini, 
// $folder = le résultat que je trouve avec le chemin absolu 
// $file = (basename retourne le nom de la composante finale du chemin) de $_FILES['img']['name']
//if (isset($_FILES['img'])) {
        //$folder = realpath('res/img').'/';
        // $file = basename($_FILES['img']['name']);


	//Pour déplacer $_FILES du dossier temporaire vers le dossier img s'il est valide
	//Si il s'est déplacé, la fonction retourne "success", sinon, elle retourne "error"
// if (move_uploaded_file($_FILES['img']['tmp_name'], $folder . $file)) 
 // {
        // echo "success !";
// } else {
        // echo "error";
// }
// }

//prépare la requête à insérer dans la base de données
$req = $bdd->prepare('INSERT INTO appointment (first_name, last_name, phone, street_number, street, city, country, cp, latitude, longitude, description, type, size, date_appointment, hour_appointment, date_create) VALUES(:first_name, :last_name, :phone, :street_number, :street, :city, :country, :cp, :latitude, :longitude, :description, :type, :size, :date_appointment, hour_appointment, NOW() )');

//exécute la requête et les données sont enregistrées sous forme de tableau
$req->execute(array(
	'first_name'		=>$_GET['first_name'],
	'last_name'			=>$_GET['last_name'],
	'phone'				=>$_GET['phone'],
	'street_number'		=>$_GET['street_number'],
	'street'			=>$_GET['street'],
	'city'				=>$_GET['city'],
	'country'			=>$_GET['country'],
	'cp'				=>$_GET['cp'],
	'latitude'			=>$_GET['latitude'],
	'longitude'			=>$_GET['longitude'],
	'description'		=>$_GET['description'],
	// 'img'=>$_FILES['img']['name'],
	'type'				=>$_GET['type'],
	'size'				=>$_GET['size'],
	'date_appointment'	=>$_GET['date_appointment'],
	'hour_appointment'	=>$_GET['hour_appointment']
	));

//Celà envoie un message et redirige vers la page index
$msg = 'Rendez vous enregistré';
   header('Location: account.php?street_number='.$_GET['street_number'].'&street='.$_GET['street'].'&city='.$_GET['city'].'&country='.$_GET['country'].'&cp='.$_GET['cp'].'&description='.$_GET['description'].'&type='.$_GET['type'].'&size='.$_GET['size'].'&date_appointment='.$_GET['date_appointment'].'&hour_appointment='.$_GET['hour_appointment'].'');
?>


