<?php
//On démarre la session
session_start();
//On verifie qu'une session est active
if(!isset($_SESSION['user'])){
    header('location: connexion.php');
    exit;
}
if(!isset($_SESSION['panier'])){
    $_SESSION['panier']=[];
}


$bdd = "sitePHP";
$host= "localhost";
$user = "root";
$pass = "root";
$nomTable = "CD";
$link=mysqli_connect($host,$user,$pass,$bdd) or  die ( "Impossible de se connecter à la BD");
$query = "Select * From $nomTable order by code ASC";
$result = mysqli_query($link,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de CD</title>
</head>
<body>
<script>
        function add(code) {
            var genre = document.getElementById('genre_'+code).innerHTML;
            var titre = document.getElementById('titre_'+code).innerHTML;
            var auteur = document.getElementById('auteur_'+code).innerHTML;
            var prix = document.getElementById('prix_'+code).innerHTML;
            url = "addajax.php?code="+code+"&genre="+genre+"&titre="+titre+"&auteur="+auteur+"&prix="+prix;
            console.log(url);
            var xhr = new XMLHttpRequest();
            xhr.open( 'GET' , url , true);
            xhr.onreadystatechange = function(){
                if(xhr.readyaState===4 && xhr.status===200){
                    console.log("ok");
                }
            }
            xhr.send()
        }
    </script>
    <h1>Accueil</h1>
    <a href="panier.php"><img src="img/panier.png" alt="image panier"></a>


<?php
print "<div class='article'>";
while($ligne = mysqli_fetch_assoc($result)){
    $chp1=$ligne["CODE"];
    $chp2=$ligne["genre"];
    $chp3=$ligne["titre"];
    $chp4=$ligne["auteur"];
    $chp5=$ligne["prix"];
    $chp6=$ligne["lienImage"];
    $chp7=$ligne["description"];
        print "<img src='vignette.php?lien=".$chp6."&width=200&height=200' >";
        print "<div>Code : $chp1 <br></div>";
        print "<div id='genre_".$chp1."'>$chp2<br></div>";
        print "<div id='titre_".$chp1."'>$chp3<br></div>";
        print "<div id='auteur_".$chp1."'>$chp4<br></div>";
        print "<div id='prix_".$chp1."'>$chp5</div>";print "<p>euros <br></p>";
        print "<button onClick='add($chp1)'>ADD<br></button>";
        
}
print "</div>";
$link->close();
print "<style>
  .article {
    display: flex;
    flex-direction : column;
    align-items: center;
  }
</style>";
?>
    <form method="post" action="deconnexion.php">
    <button name="OK"> Deconnexion </button>
    </form>
</body>
</html>