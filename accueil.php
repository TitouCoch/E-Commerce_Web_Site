<?php
//On démarre la session
session_start();
$root = false;
//On verifie qu'une session est active
if(!isset($_SESSION['panier'])){ $_SESSION['panier']=[]; } // creer la variable de session panier si elle n'est pas deja créee
if(!isset($_SESSION['selection'])){ $_SESSION['selection']=[]; } // creer la variable de session selection si elle n'est pas deja créee
if(isset($_SESSION['user'])){ $root = true; }    // affiche la page du point de vu administrateur si on est connecté en temps qu'administrateur 


$bdd = "sitePHP";
$host= "localhost";
$user = "root";
$pass = "root";
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
    <link rel="stylesheet" href="styleAccueil.css">
    <title>Site de CD</title>
</head>
<body>
<script src = "script.js">
        
    </script>
    <div class="header">
  <a href="accueil.php"><h1>Accueil</h1></a>
  <a href="panier.php">
    <div class="headerRight">
    <img src="img/iconePanier.png" alt="image panier">
  </a>

<?php
if(!$root)
{
    print "<form method='post' action='connexion.php'>";
    print"<button class='connexion' name='deconnexion'> Connexion </button>";
    print"</form>";
}
else
{
    print "<form method='post' action='deconnexion.php'>";
    print"<button class='connect' name='deconnexion'> Deconnexion </button>";
    print"</form>";
};
?>    
</div>
</div>
<?php

print "<div class='article_grid'>";
while($ligne = mysqli_fetch_assoc($result)){
    
    $chp1=$ligne["CODE"];
    $chp2=$ligne["genre"];
    $chp3=$ligne["titre"];
    $chp4=$ligne["auteur"];
    $chp5=$ligne["prix"];
    $chp6=$ligne["lienImage"];
    print "<div id='article_".$chp1."' class='article'>";
    print "<div class='Cliquable_article' onclick='maFonction($chp1)'>"; // changer fonction
    print "<img src='vignette.php?lien=".$chp6."&width=200&height=200'>";
    print "<div style='display: none;' >Code : $chp1 <br></div>";
    print "<div id='genre_".$chp1."'>$chp2</div>";
    print "<div id='titre_".$chp1."'>$chp3</div>";
    print "<div id='auteur_".$chp1."'>$chp4</div>";
    print "<div id='prix_".$chp1."'>$chp5 €</div>";
    print "<div style='display: none;' id='lienImage_".$chp1."'>$chp6</div>";
    print "</div>";
    if(!$root){
    print "<button onClick='ajouterAuPanier($chp1)'>ADD<br></button>";
    }
    if($root){
        print "<button class='connect' id='boutonSelection' onClick='ajouterSelection($chp1)'>Selectionner<br></button>"; // bouton qui ajoute le cd a une selection pour pouvoir le supprimer
    };
    print "</div>";
}
print "</div>";
$link->close();
if($root){
    print "<div class='article'>";
    print "<a href='formulaireAjout.php?code=".$chp1."'><img src='img/iconeAjouter.png' width='100' ></a>";
    print "</div>";
    print "<div class='article'>";
    print "<a href='supprimerSelection.php'><img src='img/delete.png' width='100' ></a>";
    print "</div>";
};
?>

</body>

</html>