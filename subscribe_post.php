<?php
include 'connect.php';
ob_start();

$req = $bdd->prepare('INSERT INTO users( username, password, first_name, last_name, email, address, phone) VALUES (:username, :password, :first_name, :last_name, :email, :address, :phone)');

$req->execute(array(

	'username'	 	   	=>strip_tags ($_POST['username']),
	'password'	   	   	=>strip_tags ($_POST['password']),
	'first_name'	    =>strip_tags ($_POST['first_name']),
	'last_name'	        =>strip_tags ($_POST['last_name']),
	'email'	        	=>strip_tags ($_POST['email']),
	'address'    		=>strip_tags ($_POST['address']),
	'phone'     		=>strip_tags ($_POST['phone'])
	
));

$msg = 'Vous êtes maintenant inscrit';

header('Location: index.php?msg=' . $msg);

include 'footer.php'; 

?>