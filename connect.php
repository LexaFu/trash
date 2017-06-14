<?php

try{
    $bdd = new PDO('mysql:host=localhost;dbname=trash;charset=latin1', 'root','root');
}
catch(Exeption $e)
{
    die('Erreur : '.$e->getMessage());
}

?>