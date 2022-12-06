<?php
//On démarre la session
session_start();
//On verifie qu'une session est active
if(!isset($_SESSION['user'])){
    header('location: connexion.php');
    exit;
}
$bdd = "tcocheril001_bd";
$host= "lakartxela.iutbayonne.univ-pau.fr";
$user = "tcocheril001_bd";
$pass = "tcocheril001_bd";
$nomTable = "CD";
$link=mysqli_connect($host,$user,$pass,$bdd) or  die ( "Impossible de se connecter à la BD");
$query = "Select * From $nomTable order by code ASC";
$result = mysqli_query($link,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de CD</title>
</head>
<body>
    <h1>Accueil</h1>
    <a href="panier.php"><img src="img/panier.png" alt="image panier"></a>


<?php
while($ligne = mysqli_fetch_assoc($result)){
    $chp1=$ligne["code"];
    $chp2=$ligne["genre"];
    $chp3=$ligne["titre"];
    $chp4=$ligne["auteur"];
    $chp5=$ligne["prix"];
    print "<a href='panier.php?action=ajout&amp;l=$chp3&amp;q=1&amp;p=$chp5');>Ajouter au panier</a>";
    print "<button><div><ul><li>Code : $chp1 <br></li>";
    print "<li>Genre : $chp2 <br></li>";
    print "<li>Titre : $chp3 <br></li>";
    print "<li>Auteur : $chp4 <br></li>";
    print "<li>Prix : $chp5 euros<br></li></ul>";
    print '<img class=\'vignette\'src=img/vignette.jpg><br></button>';
}
$link->close();
print '<style>.vignette{width:10%;height:10%;}</style>';
?>
    <form method="post" action="deconnexion.php">
    <button name="OK"> Deconnexion </button>
    </form>
</body>
</html>