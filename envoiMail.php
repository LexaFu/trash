<?php 
// création de ma fonction sendMail avec le destinataire, le sujet et le corps du message
function sendMail($to, $subject, $body){

//require_once inclut et exécute Mail.php, mais vérifie s'il a déjà été inclus. Si c'est le cas, il ne l'inclut pas une deuxième fois
require_once "Mail.php";

//éléments du mail : de la part de, pour, hébergeur, port, nom d'utilisateur de l'expéditeur, mot de passe expéditeur
require_once 'config_default.php';
include_once 'config.php';

//en tête avec données recueillies
$headers = array (
	'From' => $from,
   	'To' => $to,
    'Subject' => $subject);

//création du mail
$smtp = Mail::factory('smtp',
    array (
   		'host' => $host,
     	'port' => $port,
     	'auth' => true,
     	'username' => $username,
     	'password' => $password));

//Envoi si tout est ok, sinon, message d'erreur
$mail = $smtp->send($to, $headers, $body);
if (PEAR::isError($mail)) {
	throw new Exception($mail->getMessage(), 1);
	}
}
 ?>
