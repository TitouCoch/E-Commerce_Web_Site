<?php
session_start();
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
    <div class="header">
    <a href="panier.php"><h1>Panier</h1></a>
    <a href="accueil.php"><img src="img/iconeAccueil.png" alt="image accueil"></a>
</div>
    <?php 
    if($_SESSION['panier']!=[]){
        foreach ($_SESSION['panier'] as $code => $produit) {
            if($code=!null){
                print "Code du produit : " . $produit['Code'] . "<br>";
                print "Genre : " . $produit['Genre'] . "<br>";
                print "Titre : " . $produit['Titre'] . "<br>";
                print "Auteur : " . $produit['Auteur'] . "<br>";
                print "Prix : " . $produit['Prix'] . "<br>";
                print "<form method='get' action='suppArticle.php'>";
                print "<input type='hidden' name='code' value='".$produit['Code']."'>";
                print "<button>Supprimer article</button>";
                print "</form>";
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
    <style>  
    .header {
        display: flex;
        background-color: #333;  /* Couleur de fond du bandeau */
        padding: 20px;  /* Espacement interne du bandeau */
        justify-content: space-between;
        align-items:center;
      }
      .header a{

        color: #fff;  /* Couleur du texte */
        font-size: 36px;  /* Taille de la police */
        text-decoration:none; 
      }
      .header img {
        width: 50;
        height: 50px;
        margin-bottom:10px;
        }
</style>
</body>
</html>
