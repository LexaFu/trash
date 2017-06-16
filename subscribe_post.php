<?php
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


header('Location: header.php?first_name='.$_GET['first_name'].'&last_name='.$_GET['last_name'].'&email='.$_GET['email'].'&phone='.$_GET['phone'].'');

include 'footer.php'; 

?>