<?php 
// démarre une nouvelle session ou reprend une session existante
session_start();

// vérifie si la variable de session 'panier' est vide
if(empty($_SESSION['panier'])){
  // si la variable de session 'panier' est vide, redirige vers la page 'panier.php' avec le paramètre 'err' qui vaut 'true'
  header('Location: panier.php?err=true');
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Page de paiement</title>
  <link rel="stylesheet" href="./../../css/stylePayement.css">
</head>
<body>
  <!-- bouton pour retourner à la page 'panier.php' -->
  <a id='boutonRetour' href='panier.php'>Retour</a>
  <h1>Page de paiement</h1>
  <!-- instruction pour entrer les informations de paiement -->
  <p>Veuillez entrer les informations de paiement ci-dessous pour finaliser la comande</p>
  <!-- formulaire pour entrer le numéro de carte et la date d'expiration -->
  <form action="traitementPaiement.php" method="post">
    <label for="number">Numéro de la carte:</label><br>
    <input type="text" id="number" name="number"><br>
    <label for="expiry">Date d'expiration:</label><br>
    <input type="text" id="expiry" name="expiry"><br>
    <input type="submit" value="Payer">
  </form>
</body>
</html>