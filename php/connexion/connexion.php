<?php
// on verifie si le parametre erreur de l'url est sur true
if (isset($_GET['err'])) { $error = true;}
else { $error = false;}

// si l'erreur vaut true alors on affiche une pop up qui indique que les identifiants sont incorrects
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
    <title>connexion</title>
</head>
<body>
    <a id='boutonRetour' href='../accueil/accueil.php'>Retour</a>
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

