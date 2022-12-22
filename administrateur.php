<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location: connexion.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleAdministrateur.css">
    <title>Site de CD</title>
</head>
<body>
    <h1>Admin</h1>
    <div id="button-container">
    <form method="post" action="accueil.php">
        <button id="manage-cd-button" name="gererCD"> gerer les CDs </button>
    </form>
    <form method="post" action="deconnexion.php">
        <button id="logout-button" name="deconnexion"> Deconnexion </button>
    </form>
    </div>
</body>
</html>


