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
    <title>Site de CD</title>
</head>
<body>
    <h1>Admin</h1>
    <form method="post" action="deconnexion.php">
    <button name="OK"> Deconnexion </button>
    </form>
</body>
</html>


