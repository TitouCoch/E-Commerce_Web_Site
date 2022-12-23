<?php
// Démarrage de la session
session_start();

// Réinitialisation du panier en session
$_SESSION['panier']= [];

// Redirection vers la page d'accueil avec un message d'erreur
header('Location: ../accueil/accueil.php?err=true');
?>