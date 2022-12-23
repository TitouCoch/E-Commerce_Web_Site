<?php
// Démarre la session
session_start();
// Si l'utilisateur n'est pas connecté, redirige vers la page de connexion
if(!isset($_SESSION['user'])){
    header('location: ../connexion/connexion.php');
    exit;
}

// Vérifie qu'une image a été uploadée
if(!is_uploaded_file($_FILES['image']['tmp_name'])){
    // Si aucune image n'a été uploadée, redirige vers le formulaire d'ajout avec le code du CD précédemment saisi
    header('location: ../connexion/formulaireAjout.php?code='.$code);
}

// Récupère les données du formulaire
$nomImage = $_FILES['image']['name'];
$destination = "img/$nomImage";
// Déplace l'image uploadée dans le dossier "img"
move_uploaded_file($_FILES['image']['tmp_name'] ,$destination);
$code = $_GET['code'];

// Valide les données du formulaire
if (!empty($_POST['genre']) && strlen($_POST['genre']) < 25) {
    // Vérifie si le genre est renseigné et a une longueur inférieure à 25 caractères
    $genre = addslashes($_POST['genre']);
} else {
    // Sinon, redirige vers le formulaire d'ajout avec un code d'erreur
    header('location: ../connexion/formulaireAjout.php?code=' . $code);
}

if (!empty($_POST['titre']) && strlen($_POST['titre']) < 25) {
    // Vérifie si le titre est renseigné et a une longueur inférieure à 25 caractères
    $titre = addslashes($_POST['titre']);
} else {
    // Sinon, redirige vers le formulaire d'ajout avec un code d'erreur
    header('location: ../connexion/formulaireAjout.php?code=' . $code);
}

if (!empty($_POST['auteur']) && strlen($_POST['auteur']) < 25) {
    // Vérifie si l'auteur est renseigné et a une longueur inférieure à 25 caractères
    $auteur = addslashes($_POST['auteur']);
} else {
    // Sinon, redirige vers le formulaire d'ajout avec un code d'erreur
    header('location: ../connexion/formulaireAjout.php?code=' . $code);
}

if (!empty($_POST['prix']) && is_numeric($_POST['prix'])) {
    // Vérifie si le prix est renseigné et est un nombre
    $prix = addslashes($_POST['prix']);
} else {
    // Sinon, redirige vers le formulaire d'ajout avec un code d'erreur
    header('location: ../connexion/formulaireAjout.php?code=' . $code);
}

if (!empty($_POST['description']) && strlen($_POST['description']) <= 300) {
    // Vérifie si la description est renseignée et a une longueur inférieure ou égale à 300 caractères
    $description = addslashes($_POST['description']);
} else {
    // Sinon, redirige vers le formulaire d'ajout avec un code d'erreur
    header('location: ../connexion/formulaireAjout.php?code=' . $code);
}

// Incrémente le code du CD
$code++;

// Affiche les valeurs pour vérification
print $code;
print "<br>";
print $genre;
print "<br>";
print $titre;
print "<br>";
print $auteur;
print "<br>";
print $prix;
print "<br>";
print $description;
print "<br>";
print $nomImage;
print "<br>";

# Connexion à la base de données
$bdd = "sitePHP";
$host= "localhost";
$user = "root";
$pass = "root";
$nomTable = "CD";
$link= mysqli_connect($host,$user,$pass,$bdd);

# Vérification de la connexion
if (!$link) {
    print "Erreur lors de la connexion a la base";
}

# Préparation de la requête d'insertion
$query = "INSERT INTO $nomTable VALUES ('$code', '$genre', '$titre', '$auteur', '$prix', '$description', '$nomImage')";

# Exécution de la requête
$result = mysqli_query($link,$query);

# Vérification du résultat de la requête
if ($result) {
    print "Requête d'insertion réussie !";
    header('location: ../accueil/accueil.php');
} else {
    print "Erreur lors de l'insertion des données";
}

# Fermeture de la connexion à la base de données
mysqli_close($link);
?>