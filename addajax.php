<?php
session_start();
//On verifie qu'une session est active
$code = $_GET['code'];
$genre = $_GET['genre'];
$titre = $_GET['titre'];
$auteur = $_GET['auteur'];
$prix = $_GET['prix'];
if($_SESSION['panier'][$code]==null){
    $_SESSION['panier'][$code]['Genre']=$genre;
    $_SESSION['panier'][$code]['Titre']=$titre;
    $_SESSION['panier'][$code]['Auteur']=$auteur; 
    $_SESSION['panier'][$code]['Prix']=intval($prix);
}
else{
    $_SESSION['panier'][$code]['Prix']+=intval($prix);
}

?>