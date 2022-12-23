<?php
session_start();
//On verifie qu'une session est active
$code = $_GET['code'];
if($_SESSION['panier'][$code]['Quantite']==1){
    unset($_SESSION['panier'][$code]);
}
else{
    $_SESSION['panier'][$code]['Quantite']--;
}
header('location: panier.php');
?>