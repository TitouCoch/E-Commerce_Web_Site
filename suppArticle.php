<?php
session_start();
//On verifie qu'une session est active
$code = $_GET['code'];
unset($_SESSION['panier'][$code]);
header('location: panier.php');
?>