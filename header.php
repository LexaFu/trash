<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
    	<meta charset="UTF-8">
        <link rel="stylesheet" href="res/stylesheets/style.css">
        <link rel="stylesheet" href="res/stylesheets/screen.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="styleMe.css">
    	<title>trash</title>
    </head>
    <body>
        <header class="head">
            <div class="logo">
            </div>
            <?php
            if (!isset($_SESSION['id_user'])) {?>
                <a href="login.php" id="login" class="login">Connexion</a>
            <?php }else{?>
                <a href="logout.php" id="login" class="login">déconnexion</a>
            <?php }?>
        </header>
        
        
       