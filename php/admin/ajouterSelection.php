<?php

// Démarrage de la session
session_start();

// Récupération du code du produit à ajouter à la sélection
$code = $_GET['code'];

// Vérification que le produit n'est pas déjà dans la sélection
if (!in_array($code, $_SESSION['selection'])) {
    // Ajout du produit à la sélection
    $_SESSION['selection'][] = $code;
 }

?>
