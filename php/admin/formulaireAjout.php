<?php

// Démarrage de la session
session_start();

// Vérification de l'existence de la variable de session "user"
if(!isset($_SESSION['user'])){
    // Redirection vers la page de connexion si la variable de session "user" n'existe pas
    header('location: ../connexion/connexion.php');
    exit;
}

// Récupération du code du produit à ajouter
$code = $_GET['code'];

// Affichage du lien de retour à la page d'accueil
print "<a id='boutonRetour' href='../accueil/accueil.php'>Retour</a>";

// Chargement du style CSS pour la page de formulaire d'ajout
print"<head> <link rel='stylesheet' href='../../css/styleFormAjout.css'> </head>";

// Début du formulaire d'ajout
print"<body>";
print "<form method='POST' ENCTYPE='multipart/form-data' action='ajouterCD.php?code=".$code."' >";

// Champ de saisie pour le genre
print " <label for='genre-input'> Genre :</label>";
print "<input type='text' id='genre-input' name='genre' > <br>";

// Champ de saisie pour le titre
print " <label for='titre-input'> Titre :</label>";
print "<input type='text' id='titre-input' name='titre' ><br>";

// Champ de saisie pour l'auteur
print " <label for='auteur-input'> Auteur :</label>";
print "<input type='text' id='auteur-input' name='auteur' ><br>";

// Champ de saisie pour le prix
print " <label for='prix-input'> Prix :</label>";
print "<input type='text' id='prix-input' name='prix'><br>";

// Champ de saisie pour la description
print " <label for='description-input'> Description :</label>";
print "<input type='text' id='description-input' name='description'><br>";

// Champ de sélection d'image
print "<input type='file' id='image' name='image'><br>";

// Bouton de soumission du formulaire
print "<input type='Submit' >";

// Fin du formulaire d'ajout
print "</form>";

// Fin de la page HTML
print"</body>";

?>
