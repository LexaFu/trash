<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
    	<meta charset="UTF-8">
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="res/stylesheets/style.css">
        <link rel="stylesheet" href="res/stylesheets/screen.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="styleMe.css">
    	<title>trash</title>
    </head>
    <body>
        <header>
            
            <a href="index.php" class="logo">
            </a>
     
            <div class="main-title">
                <h1>Eco City</h1>
            </div>
        
            <?php
            if (!isset($_SESSION['id_user'])) {?>

                <a href="login.php" id="login" class="login"></a>

            <?php }else{?>

                <a href="logout.php" id="logout" class="logout"></a>
                
            <?php }?>
        </header>

<?php include "connect.php"; ?>

        
        
       