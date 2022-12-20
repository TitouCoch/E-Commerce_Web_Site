<?php
session_start();
//On verifie qu'une session est active
$code = $_GET['code'];
$prix = $_GET['prix'];
unset($_SESSION['panier'][$code]);
header('location: panier.php');
?>