<?php
session_start();
include "connect.php";
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
    	<meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="res/stylesheets/screen.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="image/png" href="res/images/favicon-32x32.png" sizes="32x32" />
        <link rel="stylesheet" href="res/stylesheets/style.css">
    	<title>trash</title>
    </head>
    <body>
        <header>
            
            <a href="index.php" class="logo">
            </a>
     
            <div class="main-title">

                <h1>Eco City</h1>
            
            <!--si la session est active, selectionne par l'id les nom, prénom -->
            <?php
            if(isset($_SESSION['id_user'])) {
            $req = $bdd->prepare('SELECT username FROM users WHERE id_user=:id_user');
            $req->execute(array(
            'id_user'=>$_SESSION['id_user'])); 
            $resultat = $req-> fetch();
            ?>

            <!-- affiche le message avec données contenues -->
            <p>Bonjour <?php echo $resultat['username']?></p>

            <?php
            }
            ?>

            </div>
        
            <?php
            if (!isset($_SESSION['id_user'])) {?>

                <a href="login.php" id="login" class="login"></a>

            <?php }else{?>

                <a href="logout.php" id="logout" class="logout"></a>
                
            <?php }?>

        </header>



        
        
       