<?php
// Démarre la session
session_start();
// Si l'utilisateur n'est pas connecté, redirige vers la page de connexion
if(!isset($_SESSION['user'])){
    header('location: ../connexion/connexion.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/styleAdministrateur.css">
    <title>Site de CD</title>
</head>
<body>
    <h1>Admin</h1>
    <div id="button-container">
    // Formulaire pour accéder à la gestion des CDs
    <form method="post" action="../accueil/accueil.php">
        <button id="manage-cd-button" name="gererCD"> Gérer CDs </button>
    </form>
    // Formulaire pour se déconnecter
    <form method="post" action="../connexion/deconnexion.php">
        <button id="logout-button" name="deconnexion"> Deconnexion </button>
    </form>
    </div>
</body>
</html>
