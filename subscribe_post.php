<?php
include 'connect.php';
// ob_start();

// $pass_hache = sha1($_POST['password']);
// $username = strip_tags ($_POST['username']);
// $first_name = strip_tags ($_POST['first_name']);
// $last_name = strip_tags ($_POST['last_name']);
// $email = strip_tags ($_POST['email']);
// $address = strip_tags ($_POST['address']);
// $phone = strip_tags ($_POST['phone']);



$req = $bdd->prepare('INSERT INTO users( username, password, first_name, last_name, email, phone, date_create) VALUES (:username, :password, :first_name, :last_name, :email, :phone, NOW() )');


$req->execute(array(
	'username'	 => $_GET['username'],
	'password'	 => sha1($_GET['password']),
	'first_name' => $_GET['first_name'],
	'last_name'  => $_GET['last_name'],
	'email'		 => $_GET['email'],
	'phone'		 => $_GET['phone']
	// 'username'   => $username,
	// 'password'	 => $pass_hache,
	// 'first_name' => $first_name,
	// 'last_name'  => $last_name,
	// 'email'		 => $email,
	// 'address'	 => $address,
	// 'phone'		 => $phone
));


// $msg = 'Vous êtes maintenant inscrit';

header('Location: index.php?first_name='.$_GET['first_name'].'&last_name='.$_GET['last_name'].'');

// header('Location: index.php?msg=' . $msg);

include 'footer.php'; 

?>