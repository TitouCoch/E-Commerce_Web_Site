<?php
session_start();
//$panier = $_SESSION['panier'];
//print_r ($panier);
//On verifie qu'une session est active
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
</head>
<body>
    <script>
    </script>
<h1>Accueil</h1>
    <a href="accueil.php"><img src="img/iconeAccueil.png" alt="image accueil"></a>
    <?php 
    if($_SESSION['panier']!=[]){
        foreach ($_SESSION['panier'] as $code => $produit) {
            if($code=!null){
                print "Code du produit : " . $code . "<br>";
                print "Genre : " . $produit['Genre'] . "<br>";
                print "Titre : " . $produit['Titre'] . "<br>";
                print "Auteur : " . $produit['Auteur'] . "<br>";
                print "Prix : " . $produit['Prix'] . "<br>";
                print "<form method='get' action='suppArticle.php'>";
                print "<input type='hidden' name='code' value='".$code."'>";
                print "<input type='hidden' name='prix' value='".$produit['Prix']."'>";
                print "<button>Supprimer article</button>";
                print "</form>";
            }
        }
    }
     
    ?>
    <form method="post" action="viderPanier.php">
    <button> Vider Panier </button>
    </form>
</body>
</html>
