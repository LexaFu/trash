<?php 

include "header.php";
ob_start();

$status = $_POST['status'];
$id_reporting = $_GET['id_url'];

$req = $bdd->prepare ('UPDATE reporting SET status = :status WHERE id_reporting = :id_reporting');

$req->execute(array(

	'status'	 	  	=>$status,
	'id_reporting'		=>$id_reporting
));

?>
