<?php
session_start();
//On verifie qu'une session est active
$code = $_GET['code'];
if (!in_array($code, $_SESSION['selection'])) {
    $_SESSION['selection'][] = $code;
 }
?>