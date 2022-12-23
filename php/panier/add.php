<?php
// Démarrage de la session
session_start();

// Récupération du code de l'article à ajouter au panier via l'URL
$code = $_GET['code'];

// Incrémentation de la quantité de l'article dans le panier enregistré en session
$_SESSION['panier'][$code]['Quantite']++;

// Redirection vers la page du panier
header('location: panier.php');
?>