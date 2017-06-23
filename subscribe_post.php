<?php
// ob_start();
include 'connect.php';


$req = $bdd->prepare('INSERT INTO users( username, password, first_name, last_name, email, phone, date_create) VALUES (:username, :password, :first_name, :last_name, :email, :phone, NOW() )');


$req->execute(array(
	'username'	 => $_GET['username'],
	'password'	 => sha1($_GET['password']),
	'first_name' => $_GET['first_name'],
	'last_name'  => $_GET['last_name'],
	'email'		 => $_GET['email'],
	'phone'		 => $_GET['phone']
));

$msg = 'Vous êtes maintenant inscrit';


header('Location: index.php?first_name='.$_GET['first_name'].'&last_name='.$_GET['last_name'].'&email='.$_GET['email'].'&phone='.$_GET['phone'].''.$msg);

include 'footer.php'; 

?>