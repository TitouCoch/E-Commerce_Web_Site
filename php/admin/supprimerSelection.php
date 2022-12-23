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
$bdd = "sitePHP";
$host= "localhost";
$user = "root";
$pass = "root";
$nomTable = "CD";
$link= mysqli_connect($host,$user,$pass,$bdd);

// Si la connexion échoue, affiche un message d'erreur
if (!$link) {
    print "Erreur lors de la connexion à la base";
}

// Pour chaque CD sélectionné, on exécute une requête de suppression
foreach ($_SESSION['selection'] as $key => $code) {
    echo $code . "\n";
    $query = "DELETE FROM $nomTable WHERE CODE = '$code'";
    $result = mysqli_query($link,$query);

    // Si la requête réussit, on affiche un message de succès et on supprime le CD de la session
    if ($result) {
        print " CD '$code' supprimé avec succès ";
        unset($_SESSION['selection'][$key]);
        print " <br> ";
    } 
    // Sinon, on affiche un message d'erreur
    else {
        print "Erreur lors de la suppression du CD '$code'";
        print " <br> "; 
    }
 }

// Ferme la connexion à la base de données
mysqli_close($link);

// Redirige l'utilisateur vers la page d'accueil
header('location: ../accueil/accueil.php')
?>