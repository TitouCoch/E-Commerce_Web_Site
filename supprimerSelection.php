<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location: connexion.php');
    exit;
}
if(!isset($_SESSION['selection'])){
    header('location: connexion.php');
    exit;
}

$bdd = "sitePHP";
$host= "localhost";
$user = "root";
$pass = "root";
$nomTable = "CD";
$link= mysqli_connect($host,$user,$pass,$bdd);
if (!$link) {
    print "Erreur lors de la connexion a la base";
}
foreach ($_SESSION['selection'] as $key => $code) {
    echo $code . "\n";
    $query = "DELETE FROM $nomTable WHERE CODE = '$code'";
    $result = mysqli_query($link,$query);
    if ($result) {
        print " CD '$code' supprimé avec succes ";
        unset($_SESSION['selection'][$key]);
        print " <br> ";
    } else {
        print "Erreur lors de la suppresion du CD '$code'";
        print " <br> "; 
    }
 }
 mysqli_close($link);
 header('location: accueil.php')


?>