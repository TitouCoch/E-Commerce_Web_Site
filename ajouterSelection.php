<?php
session_start();
//On verifie qu'une session est active
$code = $_GET['code'];
if($_SESSION['selection'][$code]==null){
    $_SESSION['selection'][$code]['Code']=$code;
}

?>