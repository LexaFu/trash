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
        <header>
            <div class="logo">
                <a href="index.php"></a>
            </div>
            <div class="main-title">
                <h1>Eco City</h1>
            </div>
            <?php
            if (!isset($_SESSION['id_user'])) {?>
                <div class="login_area">
                    <a href="login.php" id="login" class="login">Connexion</a> 
                    <a href="subscribe.php" id="subscribe" class="subscribe">Pas encore inscrit ?</a>
                </div>
            <?php }else{?>
                <a href="logout.php" id="login" class="login">déconnexion</a>
            <?php }?>
        </header>

<?php include "connect.php"; ?>

        
        
       