<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/styleDetails.css">
    <title>Details CD</title>
</head>
<body>
<?php

$genre = urldecode($_GET['genre']);
$titre = urldecode($_GET['titre']);
$auteur = urldecode($_GET['auteur']);
$prix = urldecode($_GET['prix']);
$lienImage = urldecode($_GET['lienImage']);
$description = urldecode($_GET['description']);


print "<a id='boutonRetour' href='accueil.php'>Retour</a>";
print "<div class='album'>";
print "<img src='../../img/$lienImage' height='700' class='pochette'>";
print "<div class='album_info'>";
print "<h3 class='album_titre'>$titre</h3>";
print "<pclass='album_valeur'><span class='album_champ'>Titre :</span>";
print " $titre</p>";
print "<p class='album_valeur'><span class='album_champ'>Artiste :</span>";
print " $auteur</p>";
print "<p class='album_valeur'><span class='album_champ'>Description:</span>";
print " $description</p>";
print "<p class='album_valeur'><span class='album_champ'>Genre :</span>";
print " $genre</p>";
print "<p class='album_valeur'><span class='album_champ'>Prix :</span>";
print " $prix €</p>";
print "</div>";
print "</div>";
?>
</body>
</html>