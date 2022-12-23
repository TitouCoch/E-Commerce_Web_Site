<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location: ../connexion/connexion.php');
exit;}

if(!is_uploaded_file($_FILES['image']['tmp_name'])){
    header('location: ../connexion/formulaireAjout.php?code='.$code);
};

$nomImage = $_FILES['image']['name'];
$destination = "img/$nomImage";
move_uploaded_file($_FILES['image']['tmp_name'] ,$destination);
$code = $_GET['code'];

if (!empty($_POST['genre']) && strlen($_POST['genre']) < 25) {$genre = addslashes($_POST['genre']);}
else {header('location: ../connexion/formulaireAjout.php?code=' . $code);}

if (!empty($_POST['titre']) && strlen($_POST['titre']) < 25) {$titre = addslashes($_POST['titre']);}
else {header('location: ../connexion/formulaireAjout.php?code=' . $code);}

if (!empty($_POST['auteur']) && strlen($_POST['auteur']) < 25) {$auteur = addslashes($_POST['auteur']);}
else {header('location: ../connexion/formulaireAjout.php?code=' . $code);}

if (!empty($_POST['prix']) && is_numeric($_POST['prix'])) {$prix = addslashes($_POST['prix']);}
else {header('location: ../connexion/formulaireAjout.php?code=' . $code);}

if (!empty($_POST['description']) && strlen($_POST['description']) <= 300) {$description = addslashes($_POST['description']);}
else {header('location: ../connexion/formulaireAjout.php?code=' . $code);}

$code++;

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

$bdd = "sitePHP";
$host= "localhost";
$user = "root";
$pass = "root";
$nomTable = "CD";
$link= mysqli_connect($host,$user,$pass,$bdd);
if (!$link) {
    print "Erreur lors de la connexion a la base";
}
$query = "INSERT INTO $nomTable VALUES ('$code', '$genre', '$titre', '$auteur', '$prix', '$description', '$nomImage')";
$result = mysqli_query($link,$query);
if ($result) {
    print "Requête d'insertion réussie !";
    header('location: ../accueil/accueil.php');
} else {
    print "Erreur lors de l'insertion des données";
}
mysqli_close($link);
?>