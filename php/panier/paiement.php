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
  <form onsubmit="return validateForm()" action="viderPanier.php">
    <label for="number">Numéro de la carte:</label><br>
    <input type="text" id="number" name="number"><br>
    <label for="expiry">Date d'expiration:</label><br>
    <input type="text" id="expiry" name="expiry"><br>
    <input type="submit" value="Payer">
  </form>
  <!-- fonction qui valide le formulaire avant de le soumettre -->
  <script>
     function validateForm() {
    // récupère la valeur du champ "Numéro de la carte"
    var cardNumber = document.getElementById("number").value;

    // vérifie si la valeur du champ "Numéro de la carte" est une chaîne de 16 chiffres et si le dernier chiffre est identique au premier
    var regex = /^\d{16}$/;
    if (!regex.test(cardNumber) || cardNumber[0] !== cardNumber[15]) {
      alert("Le numéro de la carte doit être une chaîne de 16 chiffres et le dernier chiffre doit être identique au premier.");
      return false;
    }

    // récupère la valeur du champ "Date d'expiration"
    var expiry = document.getElementById("expiry").value;

    // vérifie si la valeur du champ "Date d'expiration" est au bon format (MM/YYYY)
    regex = /^\d{4}\-\d{2}$/;
    if (!regex.test(expiry)) {
      alert("La date d'expiration doit être au format YYYY-MM.");
      return false;
    }
    // Sépare le mois et l'année

    expiry = expiry+"-01";
    // Convertit la valeur du champ "Date d'expiration" en un objet Date
    var expiryDate = new Date(expiry);
    // Ajoute 3 mois à la date d'expiration

    // Vérifie si la date d'expiration est supérieure à la date du jour
    var today = new Date();
    today.setMonth(today.getMonth() + 3);
    if (expiryDate.getTime() < today.getTime()) {
      alert("La date d'expiration doit être supérieure à la date du jour + 3 mois.");
      return false;
    }

    // Si la valeur du champ "Numéro de la carte" et du champ "Date d'expiration" sont valides, soumet le formulaire
    alert("Payement accepté !")
    return true;
  }
  </script>
</body>
</html>