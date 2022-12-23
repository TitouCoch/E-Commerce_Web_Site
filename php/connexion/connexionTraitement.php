<?php 
session_start();

$login = htmlspecialchars($_POST['login']);
$password = htmlspecialchars($_POST['passwd']);

// Requête à la base de données pour vérifier si le numéro de licence existe

$bdd= "sitePHP"; // Base de données
$host= "localhost";
$user= "root"; // Utilisateur
$pass= "root"; // mp
$nomtable= "utilisateur"; /* Connection bdd */
$link=mysqli_connect($host,$user,$pass,$bdd);
$query = "SELECT * FROM $nomtable WHERE login = '$login' and mdp='$password'";
$result= mysqli_query($link,$query);
// Vérification si le numéro de licence existe
if (!$link) {}
else
{
  if (mysqli_num_rows($result) > 0) {
    // Si le login et l'identifiant sont corrects, on affiche un message de bienvenue
    $_SESSION['user'] = 'root';
    header('Location: ../admin/administrateur.php');
  } else {
        // Si le login et l'identifiant ne correspondent pas à un utilisateur de la base de données, on affiche un message d'erreur
        header('Location: connexion.php?err=true');
  }
}  

?>

