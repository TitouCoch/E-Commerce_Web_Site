<?php

//Récupération des variables avec la méthode post
$number = $_POST['number'];
$expiry = $_POST['expiry'];

//Explosion de la chaine de caractère pour récupérer le mois et l'année
$date = explode("/", $expiry);

//Récupération de la date du jour
$currentDate = date("Y/m/d");
$dateLimite=date("Y/m/d",strtotime($currentDate.'+3 month')) ; // Ajouter 3 mois à la date actuelle
// Créer une date d'expiration à partir du mois et de l'année donnés
$expiryDate=$date[1].'/'.$date[0].'/01';

//Teste de la validité des dates
if (!empty($number) && strlen($number) == 16 && substr($number,0,1)==substr($number,15) && $expiryDate > $dateLimite) {
    //Affiche le paiement validé dans une fenêtre alert et retourne vers l'accueil en passant par vider le panier
    echo "<body onLoad=\"alert('Paiement validé !')\">";
    echo '<meta http-equiv="refresh" content="0;URL=viderPanier.php">';
} else {
    //Affiche l'erreur dans une fenêtre alert et retourne vers la page de paiement
    echo "<body onLoad=\"alert('Le numéro de la carte doit contenir 16 caractères et la date de validité de la carte doit être supérieur à la date du jour plus 3 mois et de la forme MM/YYYY')\">";
    echo '<meta http-equiv="refresh" content="0;URL=paiement.php">';
    exit;
}
?>