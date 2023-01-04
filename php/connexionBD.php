<?php
// On définit les informations de connexion à la base de données
function connexionBD(){
    $bdd = "sitePHP";
    $host= "localhost";
    $user = "root";
    $pass = "root";
// On se connecte à la base de données
    $link=mysqli_connect($host,$user,$pass,$bdd) or  die ( "Impossible de se connecter à la BD");
// on retourne la connexion
return $link;
}
?>