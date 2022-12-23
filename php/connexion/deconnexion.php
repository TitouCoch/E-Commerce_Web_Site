<?php
    // Démarrage de la session
    session_start();
    // Destruction de la session
    session_destroy();
    // Affichage d'un message de debug dans la console du navigateur
    print "<script>console.log('sessiondestroy')</script>";
    // Redirection vers la page d'accueil
    header('location:../accueil/accueil.php');
?>