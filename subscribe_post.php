<?php
include 'connect.php';

$req = $bdd->prepare('INSERT INTO users (username, password, contents, type, date_created) VALUES(:title, :id_client, :contents, :type, NOW())');