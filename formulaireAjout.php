<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location: connexion.php');
exit;};
$code = $_GET['code'];
print "<form method='POST' ENCTYPE='multipart/form-data' action='ajouterCD.php?code=".$code."' >";
print " <label for='genre'> genre :</label>";
print "<input type='text' name='genre' > <br>";
print " <label for='titre'> titre :</label>";
print "<input type='text' name='titre' ><br>";
print " <label for='auteur'> auteur :</label>";
print "<input type='text' name='auteur' ><br>";
print " <label for='prix'> prix :</label>";
print "<input type='text' name='prix'><br>";
print " <label for='description'> description :</label>";
print "<input type='text' name='description'><br>";
print "<input type='file' id='image' name='image'><br>";
print "<input type='submit' >";
print "</form>";
?>
