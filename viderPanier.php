<?php
session_start();
//On verifie qu'une session est active
$_SESSION['panier']= [];
header('Location: accueil.php?err=true');
?>