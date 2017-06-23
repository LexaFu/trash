<?php
include 'connect.php';

$req = $bdd->prepare('INSERT INTO users( username, password, first_name, last_name, email, phone, address, status, date_create) VALUES (:username, :password, :first_name, :last_name, :email, :phone, :address, :status,NOW() )');


$req->execute(array(
	'username'	 => $_POST['username'],
	'password'	 => sha1($_POST['password']),
	'first_name' => $_POST['first_name'],
	'last_name'  => $_POST['last_name'],
	'email'		 => $_POST['email'],
	'phone'		 => $_POST['phone'],
	'address'	 => $_POST['address'],
	'status'	 => $_POST['status']
));
?>

