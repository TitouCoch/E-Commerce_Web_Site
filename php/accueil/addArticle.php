<?php
// Démarre la session
session_start();
// Récupère les données du CD à ajouter au panier
$code = $_GET['code'];
$genre = $_GET['genre'];
$titre = $_GET['titre'];
$auteur = $_GET['auteur'];
$prix = $_GET['prix'];
$lienImage= $_GET['lienImage'];

// Vérifie que le CD n'est pas déjà dans le panier
if($_SESSION['panier'][$code]==null){
    // Si le CD n'est pas dans le panier, l'ajoute au panier avec une quantité de 1
    $_SESSION['panier'][$code]['Code']=$code;
    $_SESSION['panier'][$code]['Genre']=$genre;
    $_SESSION['panier'][$code]['Titre']=$titre;
    $_SESSION['panier'][$code]['Auteur']=$auteur; 
    $_SESSION['panier'][$code]['Prix']=floatval($prix);
    $_SESSION['panier'][$code]['lienImage']=$lienImage;
    $_SESSION['panier'][$code]['Quantite']=1;
}
else{
    // Si le CD est déjà dans le panier, incrémente la quantité de 1
    $_SESSION['panier'][$code]['Quantite']++;
}

?>
