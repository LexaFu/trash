<?php
/**
 * Created by PhpStorm.
 * User: axell
 * Date: 19/04/2017
 * Time: 11:05
 */
include 'header.php';
session_destroy();
header('Location: index.php');
?>