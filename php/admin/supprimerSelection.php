<?php
// Démarre une session
session_start();

// Si l'utilisateur n'est pas connecté, on le redirige vers la page de connexion
if(!isset($_SESSION['user'])){
    header('location: ../connexion/connexion.php');
    exit;
}

// Si aucun CD n'a été sélectionné, on redirige l'utilisateur vers la page de connexion
if(!isset($_SESSION['selection'])){
    header('location: ../connexion/connexion.php');
    exit;
}

// Connexion à la base de données
// on importe le script de connexion a la base de données
include '../connexionBD.php';
// on recupere la connexion à la base de données
$link = connexionBD();

// Si la connexion échoue, affiche un message d'erreur

// Pour chaque CD sélectionné, on exécute une requête de suppression
foreach ($_SESSION['selection'] as $key => $code) {
    $query = "DELETE FROM CD WHERE CODE = '$code'";
    $result = mysqli_query($link,$query);

    // Si la requête réussit, on affiche un message de succès et on supprime le CD de la session
    if ($result) {
      unset($_SESSION['selection'][$key]);
    } 
    // Sinon, on affiche un message d'erreur
 }
// Ferme la connexion à la base de données
mysqli_close($link);

// Redirige l'utilisateur vers la page d'accueil
header('location: ../accueil/accueil.php')
?>