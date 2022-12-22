<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location: connexion.php');
exit;};
$code = $_GET['code'];
print"<head> <link rel='stylesheet' href='styleFormAjout.css'> </head>";
print"<body>";
print "<form method='POST' ENCTYPE='multipart/form-data' action='ajouterCD.php?code=".$code."' >";
print " <label for='genre-input'> genre :</label>";
print "<input type='text' id='genre-input' name='genre' > <br>";
print " <label for='titre-input'> titre :</label>";
print "<input type='text' id='titre-input' name='titre' ><br>";
print " <label for='auteur-input'> auteur :</label>";
print "<input type='text' id='auteur-input' name='auteur' ><br>";
print " <label for='prix-input'> prix :</label>";
print "<input type='text' id='prix-input' name='prix'><br>";
print " <label for='description-input'> description :</label>";
print "<input type='text' id='description-input' name='description'><br>";
print "<input type='file' id='image-input' name='image'><br>";
print "<input type='submit' >";
print "</form>";
print"</body>";
?>
