<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/stylePanier.css">
    <title>Panier</title>
</head>
<body>
    <div class="header">
        <a href="panier.php"><h1>Panier</h1></a>
        <a href="../accueil/accueil.php"><img src="../../img/iconeAccueil.png" alt="image accueil"></a>
    </div>
    <div class='article_grid'>
    <?php 
    if($_SESSION['panier']!=[]){
        foreach ($_SESSION['panier'] as $code => $produit) {
            if($code=!null){
                print "<div class='article_panier'>";
                print "<img src='../vignette.php?lien=".$produit['lienImage']."&width=100&height=100'>";
                print "<div id='genre'>".$produit['Genre'] ."   </div>";
                print "<div id='lienImage'>lienImage".$produit['lienImage']."</div>";
                print "<div id='titre'>".$produit['Titre'] ."</div>";
                print "<div id='auteur'>".$produit['Auteur'] ."</div>";
                print "<div id='prix'>".$produit['Prix']."€</div>";
                print "<div id='Quantité'>QUANTITE : ".$produit['Quantite']."</div>";


                print "<div class='optionPanier'><form method='get' action='suppArticle.php'>";
                print "<input type='hidden' name='code' value='".$produit['Code']."'>";
                print "<button>-</button></form>";

                print "<form method='get' action='add.php'>";
                print "<input type='hidden' name='code' value='".$produit['Code']."'>";
                print "<button>+</button></form>";

                print "</div>";
                print "</div>";
            }
        }
    }
    ?>
    </div>

    <div class="footerPanier">
    <form class="boutonPanier" method="get" action="viderPanier.php">
    <button id='boutonViderPanier'> Vider Panier </button>
    </form>
    <form class="boutonPanier" method="post" action="paiement.php">
    <button id='boutonPayer'>Payer</button>
    </form>
    </div>
    <script src="../../js/script.js"></script>
</body>
</html>
