<?php
// inclu le connect qui fait la liaison avec la base de données
include 'connect.php';

$pass_hache = sha1($_POST['password']); //crypte le password
$login = $_POST['username'];
//prépare la base de données
$req = $bdd->prepare('SELECT id_user FROM users WHERE username = :usernameREQ AND password = :passwordREQ');
// execute l'envoi à la base de données
$req->execute(array(
    'usernameREQ'   => $login,
    'passwordREQ'=> $pass_hache
));

$resultat = $req-> fetch();

// condition si les identifiants sont mauvais un message d'erreur s'affiche
if (!$resultat) {
    header('Location: login.php?msg=mauvais identifiants');
}else{
    session_start();
    $_SESSION['id_user'] = $resultat['username'];
    $_SESSION['pseudo'] = $login;
    header('Location: index.php');
}
?>