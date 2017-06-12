<?php
include 'connect.php';
ob_start();

$pass_hache = sha1($_POST['password']);
$username = strip_tags ($_POST['username']);
$first_name = strip_tags ($_POST['first_name']);
$last_name = strip_tags ($_POST['last_name']);
$email = strip_tags ($_POST['email']);
$address = strip_tags ($_POST['address']);
$phone = strip_tags ($_POST['phone']);



$newUser = $bdd->prepare('INSERT INTO users( username, password, first_name, last_name, email, address, phone, date_inscription) VALUES (:username, :password, :first_name, :last_name, :email, :address, :phone, NOW() )');


$newUser->execute(array(
	'username'   => $username,
	'password'	 => $pass_hache,
	'first_name' => $first_name,
	'last_name'  => $last_name,
	'email'		 => $email,
	'address'	 => $address,
	'phone'		 => $phone
));


$msg = 'Vous êtes maintenant inscrit';

header('Location: index.php?msg=' . $msg);

include 'footer.php'; 

?>