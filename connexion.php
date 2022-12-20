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
    <title>connexion</title>
</head>
<body>
    <form action="connexionTraitement.php" method="POST">
        <label for="login">Login </label>
        <input name="login" placeholder="Login" type="text">
        <br>
        <label for="passwd">Password </label>
        <input name="passwd" placeholder="Mot de passe" type="password">
        <br>
        <input type="submit">
    </form>
</body>
</html>

