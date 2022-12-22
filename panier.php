<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylePanier.css">
    <title>Panier</title>
</head>
<body>
    <div class="header">
    <a href="panier.php"><h1>Panier</h1></a>
    <a href="accueil.php"><img src="img/iconeAccueil.png" alt="image accueil"></a>
</div>
    <?php 
    if($_SESSION['panier']!=[]){
        foreach ($_SESSION['panier'] as $code => $produit) {
            if($code=!null){

                print "<div class='article_panier'>";
                print "<img src='vignette.php?lien=".$produit['lienImage']."&width=100&height=100'>";
                print "<div id='genre'>".$produit['Genre'] ."   </div>";
                print "<div id='leinImage'>lienImage".$produit['lienImage']."</div>";
                print "<div id='titre'>".$produit['Titre'] ."</div>";
                print "<div id='auteur'>".$produit['Auteur'] ."</div>";
                print "<div id='prix'>".$produit['Prix']."€</div>";
                print "<form method='get' action='suppArticle.php'>";
                print "<input type='hidden' name='code' value='".$produit['Code']."'>";
                print "<button>Supprimer article</button>";
                print "</form>";
                print "</div>";
                /*
                print "Code du produit : " . $produit['Code'] . "<br>";
                print "Genre : " . $produit['Genre'] . "<br>";
                print "Titre : " . $produit['Titre'] . "<br>";
                print "Auteur : " . $produit['Auteur'] . "<br>";
                print "Prix : " . $produit['Prix'] . "<br>";
                print "<form method='get' action='suppArticle.php'>";
                print "<input type='hidden' name='code' value='".$produit['Code']."'>";
                print "<button>Supprimer article</button>";
                print "</form>";
                */
            }
        }
    }
     
    ?>
    <form method="get" action="viderPanier.php">
    <button> Vider Panier </button>
    </form>
    <form method="post" action="paiement.php">
    <button>Payer</button>
    </form>
</body>
</html>
