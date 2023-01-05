<?php
// Démarrage de la session
session_start();

// Code HTML du fichier panier.php
// Ce fichier affiche le panier de l'utilisateur et lui permet de payer ou de vider son panier
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
    <!-- En-tête de la page -->
    <div class="header">
        <a href="panier.php"><h1>Panier</h1></a>
        <a href="../accueil/accueil.php"><img src="../../img/iconeAccueil.png" alt="image accueil"></a>
    </div>
<!-- Grille d'articles dans le panier -->
<div class='article_grid'>
<?php 
// Si le panier de l'utilisateur n'est pas vide
if($_SESSION['panier']!=[]){
    // Pour chaque produit dans le panier
    foreach ($_SESSION['panier'] as $code => $produit) {
        // Si le code du produit est différent de null
        if($code=!null){
            // Affichage du produit dans le panier
            print "<div class='article_panier'>";
            print "<img src='../vignette.php?lien=".$produit['lienImage']."&width=200&height=200'>";
            print "<div id='genre'>".$produit['Genre'] ."   </div>";
            print "<div id='lienImage'>lienImage".$produit['lienImage']."</div>";
            print "<div id='titre'>".$produit['Titre'] ."</div>";
            print "<div id='auteur'>".$produit['Auteur'] ."</div>";
            print "<div id='prix'>".$produit['Quantite']*$produit['Prix']."€</div>";
            print "<div id='Quantité'>QUANTITE : ".$produit['Quantite']."</div>";

            // Options du produit dans le panier (suppression et ajout)
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
    <!--Bouton pour vider le panier -->
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
