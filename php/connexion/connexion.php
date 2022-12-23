<?php
// On vérifie si le paramètre "erreur" de l'URL est défini et égal à "true"
if (isset($_GET['err']) && $_GET['err'] == "true") { 
    // Si oui, on définit la variable $error sur "true"
    $error = true;
}
else { 
    // Sinon, on définit la variable $error sur "false"
    $error = false;
}

// Si la variable $error vaut "true", on affiche une boîte de dialogue indiquant que les identifiants sont incorrects
if($error){
    echo "<script > alert('ERREUR: Identifiants incorrects') ;  </script>";
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/styleConnexion.css">
    <title>Connexion</title>
</head>
<body>
    <!-- Bouton permettant de retourner à la page d'accueil -->
    <a id='boutonRetour' href='../accueil/accueil.php'>Retour</a>
<!-- Formulaire de connexion -->
<div>
    <form id="login-form" action="connexionTraitement.php" method="POST">
        <label class="form-label" for="login">Login </label>
        <input id="login-input" name="login" placeholder="Login" type="text">
        <br>
        <label class="form-label" for="passwd">Password </label>
        <input id="password-input" name="passwd" placeholder="Mot de passe" type="password">
        <br>
        <input id="submit-button" type="submit">
    </form>
</div>
</body>
</html>