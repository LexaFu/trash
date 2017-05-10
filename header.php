<?php
session_start();
?>
<!-- **
 * Created by PhpStorm.
 * User: axel
 * Date: 28/03/2017
 * Time: 11:27
 * -->
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
<script src="https://www.gstatic.com/firebasejs/3.7.4/firebase.js"></script>
<script>
    // Initialize Firebase
    var config = {
        apiKey: "AIzaSyAHOt1qxJqwBEVFk9g3rk3BmB2kdhUBl7o",
        authDomain: "trash-8dd6d.firebaseapp.com",
        databaseURL: "https://trash-8dd6d.firebaseio.com",
        storageBucket: "trash-8dd6d.appspot.com",
        messagingSenderId: "1070605843017"
    };
    firebase.initializeApp(config);
</script>
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
        
        
       