<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- En-tête de la page -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Lien vers le fichier de style CSS -->
    <link rel="stylesheet" href="./../../css/styleAccueil.css">
    <!-- Titre de la page -->
    <title>Site de CD</title>
</head>
<body>
<!-- Lien vers le script JavaScript -->
<script src = "../../js/script.js">
        
</script>
<!-- En-tête du site -->
<div class="header">
  <!-- Lien vers la page d'accueil -->
  <a href="accueil.php"><h1>Accueil</h1></a>
  <!-- Lien vers la page du panier -->
  <a href="../panier/panier.php">
    <!-- Contenu à droite de l'en-tête -->
    <div class="headerRight">
    <!-- Image du panier -->
    <img src="../../img/iconePanier.png" alt="image panier">
  </a>

<!-- Début de la section PHP -->
<?php
// On démarre la session
// On initialise la variable $root à false
$root = false;
// On vérifie qu'une session est active
if(!isset($_SESSION['panier'])){ $_SESSION['panier']=[]; } // crée la variable de session panier si elle n'est pas déjà créée
if(!isset($_SESSION['selection'])){ $_SESSION['selection']=[]; } // crée la variable de session selection si elle n'est pas déjà créée
// Si l'utilisateur est connecté en tant qu'administrateur
if(isset($_SESSION['user'])){ 
  // On modifie la valeur de la variable $root à true
  $root = true; 
}
// on importe le script de connexion a la base de données
include '../connexionBD.php';
// on recupere la connexion à la base de données
$link = connexionBD();
// On sélectionne toutes les entrées de la table CD et on trie les résultats par code croissant
$query = "Select * From CD order by code ASC";
$result = mysqli_query($link,$query);

// Vérifie si l'utilisateur est connecté en tant qu'administrateur
if(!$root) {
    // Affiche un formulaire pour se connecter
    print "<form method='post' action='../connexion/connexion.php'>";
    print"<button class='connexion' name='deconnexion'> Connexion </button>";
    print"</form>";
} else {
    // Affiche un formulaire pour se déconnecter
    print "<form method='post' action='./../connexion/deconnexion.php'>";
    print"<button class='connect' name='deconnexion'> Deconnexion </button>";
    print"</form>";
}

?>    
</div>
</div>
<?php

// Affiche une grille d'articles
print "<div class='article_grid'>";

// Récupère les lignes du résultat de la requête SQL et les affiche dans des divs
while($ligne = mysqli_fetch_assoc($result)){
    
    // Récupère les champs de chaque ligne
    $chp1=$ligne["CODE"];
    $chp2=$ligne["genre"];
    $chp3=$ligne["titre"];
    $chp4=$ligne["auteur"];
    $chp5=$ligne["prix"];
    $chp6=$ligne["lienImage"];
    $chp7=$ligne["description"];
    
    // Affiche chaque article
    print "<div id='article_".$chp1."' class='article'>";
    print "<a id='cliquable' href='details.php?genre=".urlencode($chp2)."&titre=".urlencode($chp3)."&auteur=".urlencode($chp4)."&prix=".urlencode($chp5)."&lienImage=".urlencode($chp6)."&description=".urlencode($chp7)."'>";
    print "<img src='../vignette.php?lien=".$chp6."&width=200&height=200'>";
    print "<div style='display: none;' >Code : $chp1 <br></div>";
    print "<div style='display: none;' id='genre_".$chp1."' class='texteArticle'>$chp2</div>";
    print "<div id='titre_".$chp1."' class='texteArticle'>$chp3</div>";
    print "<div id='auteur_".$chp1."' class='texteArticle'>$chp4</div>";
    print "<div id='prix_".$chp1."' class='texteArticle'>$chp5 €</div>";
    print "<div style='display: none;' id='lienImage_".$chp1."'>$chp6</div>";
    print "</a>";
    if(!$root){
        // Si l'utilisateur n'est pas administrateur, affiche un bouton pour ajouter le CD au panier
        print "<button onClick='ajouterAuPanier($chp1)'>ADD<br></button>";
    }
    if($root){
        // Si l'utilisateur est administrateur, affiche un bouton pour ajouter le CD à une sélection
        print "<button class='connect' id='boutonSelection' onClick='ajouterSelection($chp1)'>Selectionner<br></button>"; 
    };
    // Ferme la div du CD en cours d'affichage
    print "</div>";
    }
    // Ferme la div qui contient tous les CDs
    print "</div>";
    // Ferme la connexion à la base de données
    $link->close();
    if($root){
        // Si l'utilisateur est administrateur, affiche un lien pour ajouter un nouveau CD et un lien pour supprimer la sélection
        print "<div class='article'>";
        print "<a href='../admin/formulaireAjout.php?code=".$chp1."'><img src='../../img/iconeAjouter.png' width='100' ></a>";
        print "</div>";
        print "<div class='article'>";
        print "<a href='../admin/supprimerSelection.php'><img src='../../img/delete.png' width='100' ></a>";
        print "</div>";
    };
    ?>
    
    </body>
    </html>
    