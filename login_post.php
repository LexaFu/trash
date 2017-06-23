<?php
// inclue le connect qui fait la liaison avec la base de données
include 'connect.php';

$pass_hache = sha1($_POST['password']); //crypte le password
$login = $_POST['username'];

//prépare la base de données
$req = $bdd->prepare('SELECT id_user, status, password, recovery_password FROM users WHERE username = :usernameREQ AND (password = :passwordREQ OR recovery_password = :passwordREQ)');

// execute l'envoi à la base de données
$req->execute(array(
    'usernameREQ'   => $login,
    'passwordREQ'   => $pass_hache
));

$resultat = $req-> fetch();

// condition si les identifiants sont mauvais un message d'erreur s'affiche
if (!$resultat) {
    header('Location: login.php?msg=mauvais identifiants');
    die();

}else{

	session_start();
    $_SESSION['id_user'] = $resultat['id_user'];
    $_SESSION['pseudo'] = $login;
    $_SESSION['status'] = $resultat['status'];
    $_SESSION['authentified'] = true;

    // si le mot de passe crypté est égal à recovery password contenu dans $resultat, et est différent du mot de passe,
    if ($pass_hache === $resultat['recovery_password'] && $resultat['recovery_password'] !== $resultat['password']){
        //prépare le remplacement dans table users du mot de passe 
        $req = $bdd->prepare('UPDATE users SET password=:password WHERE recovery_password=:password');
        // l'enregistre en crypté
        $req->execute(array(
            'password' => $pass_hache
        )); 
    }

    if($_SESSION['status'] == 1) {  
        header('Location: team_page.php');
        die();

    } elseif($_SESSION['status'] == 2) {
        header('Location: super_admin.php');
    
    } else {
	   header('Location: index.php');
        die();
    }
}   
