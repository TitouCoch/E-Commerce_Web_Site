<?php
// Démarrage de la session
session_start();

// Récupération du code de l'article à retirer du panier via l'URL
$code = $_GET['code'];

// Vérification de la quantité de l'article dans le panier enregistré en session
if($_SESSION['panier'][$code]['Quantite']==1){
    // Si l'article n'est présent qu'une seule fois dans le panier, on le retire complètement
    unset($_SESSION['panier'][$code]);
}
else{
    // Si l'article est présent plusieurs fois dans le panier, on décrémente sa quantité de 1
    $_SESSION['panier'][$code]['Quantite']--;
}

// Redirection vers la page du panier
header('location: panier.php');
?>



