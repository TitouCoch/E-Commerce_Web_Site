<?php
session_start();
//On verifie qu'une session est active
$code = $_GET['code'];
$genre = $_GET['genre'];
$titre = $_GET['titre'];
$auteur = $_GET['auteur'];
$prix = $_GET['prix'];
$lienImage= $_GET['lienImage'];
if($_SESSION['panier'][$code]==null){
    $_SESSION['panier'][$code]['Code']=$code;
    $_SESSION['panier'][$code]['Genre']=$genre;
    $_SESSION['panier'][$code]['Titre']=$titre;
    $_SESSION['panier'][$code]['Auteur']=$auteur; 
    $_SESSION['panier'][$code]['Prix']=intval($prix);
    $_SESSION['panier'][$code]['lienImage']=$lienImage;
    $_SESSION['panier'][$code]['Quantite']=1;
}
else{
    $_SESSION['panier'][$code]['Prix']+=intval($prix);
    $_SESSION['panier'][$code]['Quantite']++;
}

?>