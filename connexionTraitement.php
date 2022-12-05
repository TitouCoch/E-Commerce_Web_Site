<?php 
session_start();
$login = htmlspecialchars($_POST['login']);
$passwd = htmlspecialchars($_POST['passwd']);

if($login == 'root' && $passwd == 'root'){
    $_SESSION['user'] = 'root';
    header('Location: accueil.php');
}
else{
    header('Location: connexion.php?err=true');
}
?>