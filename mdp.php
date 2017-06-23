<meta charset="utf-8">
<!-- pour envoyer un mail si mot de passe oublié -->
<?php

include 'connect.php';
include 'envoiMail.php';

$newPass = chaine_aleatoire(14);
// envoi du mail . Sélectionne email dans la table de la bdd users. LIMIT ordonne que le mail soit envoyé à un seul user. Exécute la fonction et envoie le mail avec les détails de la demande de mot de passe.
$req = $bdd->prepare('SELECT email FROM users WHERE email = :givenEmail');
$req->execute(array(
	'givenEmail'	=> $_GET['email']
	));
$resultat=$req->fetch();
sendMail($resultat['email'],'Eco City : mot de passe oublié',"Eco City,\n Une demande de nouveau mot de passe a été faite pour l'email ".$resultat['email']."\n Un nouveau mot de passe temporaire vous a donc été attribué : ".$newPass."\n Ce mot de passe remplacera l'actuel uniquement si vous l'utilisez.");

function chaine_aleatoire($nb_car, $chaine = 'azertyuiopqsdfghjklmwxcvbn123456789')
{
    $nb_lettres = strlen($chaine) - 1;
    $generation = '';
    for($i=0; $i < $nb_car; $i++)
    {
        $pos = mt_rand(0, $nb_lettres);
        $car = $chaine[$pos];
        $generation .= $car;
    }
    return $generation;
}
//prépare la requête à insérer dans la base de données
$req = $bdd->prepare('UPDATE users SET recovery_password=:password WHERE email=:email');
$req->execute(array(
	'password'	 => sha1($newPass),
	'email'		=>$_GET['email']
));

if(!empty('email')) {
	echo "Votre demande a été prise en compte. Nous vous avons envoyé un email avec votre nouveau mot de passe.";
} else {
	echo "L'email que vous avez saisi ne correspond à aucun utilisateur.";
}




