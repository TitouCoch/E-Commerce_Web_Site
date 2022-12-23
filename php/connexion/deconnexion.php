<?php
    session_start();
    session_destroy();
    print "<script>console.log('sessiondestroy')</script>";
    header('location:../accueil/accueil.php');
?>