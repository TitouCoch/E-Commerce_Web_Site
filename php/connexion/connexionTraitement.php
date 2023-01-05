<?php 
session_start(); // Démarrage de la session

// Récupération des données de connexion envoyées via le formulaire
$login = sha1(htmlspecialchars($_POST['login']));
$password = sha1(htmlspecialchars($_POST['passwd']));

// Connexion à la base de données
// on importe le script de connexion a la base de données
include '../connexionBD.php';
// on recupere la connexion à la base de données
$link = connexionBD();

// Requête SQL pour récupérer les informations de l'utilisateur avec le login et le mot de passe fournis
$query = "SELECT * FROM utilisateur WHERE login = '$login' and mdp='$password'";
$result= mysqli_query($link,$query);

// Vérification de la connexion à la base de données
if (!$link) {
  // Gestion de l'erreur de connexion à la base de données
} else {
  // Si le login et le mot de passe sont corrects
  if (mysqli_num_rows($result) > 0) {
    // Enregistrement de l'utilisateur en tant qu'utilisateur connecté dans la session
    $_SESSION['user'] = 'root';
    // Redirection vers la page d'administration
    header('Location: ../admin/administrateur.php');
  } else {
    // Si le login et le mot de passe ne correspondent pas à un utilisateur de la base de données, on redirige vers la page de connexion avec un message d'erreur
    header('Location: connexion.php?err=true');
  }
}  

?>