<?php
session_start();
$code = $_GET['code'];
$_SESSION['panier'][$code]['Quantite']++;
header('location: panier.php');
?>