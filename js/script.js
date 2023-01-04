// Fonction qui ajoute un article au panier
function ajouterAuPanier(code) {
    // Affiche le code de l'article dans la console
    console.log(code)
    // Récupère le genre de l'article et le stocke dans une variable
    var genre = document.getElementById('genre_' + code).innerHTML;
    // Récupère le titre de l'article et le stocke dans une variable
    var titre = document.getElementById('titre_' + code).innerHTML;
    // Récupère l'auteur de l'article et le stocke dans une variable
    var auteur = document.getElementById('auteur_' + code).innerHTML;
    // Récupère le prix de l'article et le stocke dans une variable
    var prix = document.getElementById('prix_' + code).innerHTML;
    // Récupère le lien de l'image de l'article et le stocke dans une variable
    var lienImage = document.getElementById('lienImage_' + code).innerHTML;
    // Crée une URL avec les informations de l'article
    url = "addArticle.php?code=" + code + "&genre=" + genre + "&titre=" + titre + "&auteur=" + auteur + "&prix=" + prix + "&lienImage=" + lienImage;
    // Affiche l'URL dans la console
    console.log(url);
    // Crée une nouvelle requête HTTP
    var xhr = new XMLHttpRequest();
    // Ouvre la requête avec la méthode GET, l'URL et l'option de requête asynchrone
    xhr.open('GET', url, true);
    // Définit une fonction à exécuter lorsque la réponse est prête
    xhr.onreadystatechange = function () {
        // Si la requête est terminée et que le statut de réponse est OK
        if (xhr.readyaState === 4 && xhr.status === 200) {
            // Affiche "ok" dans la console
            console.log("ok");
        }
    }
    // Envoie la requête
    xhr.send()
}

// Fonction qui ajoute un article à la sélection
function ajouterSelection(code) {
    console.log("selection");
    // Récupère l'élément HTML de l'article
    var article = document.getElementById('article_' + code);
    // Modifie le style de l'article en lui ajoutant une bordure rouge
    article.style.border = "3px solid red";
    // Affiche le code de l'article dans la console
    console.log(code);
    // Crée une URL avec le code de l'article
    url = "../admin/ajouterSelection.php?code=" + code;
    // Crée une nouvelle requête HTTP
    var xhr = new XMLHttpRequest();
    // Ouvre la requête avec la méthode GET, l'URL et l'option de requête asynchrone
    xhr.open('GET', url, true);
    // Définit une fonction à exécuter lorsque la réponse est prête
    xhr.onreadystatechange = function () {
        // Si la requête est terminée et que le statut de réponse est OK
        if (xhr.readyaState === 4 && xhr.status === 200) {
            // Affiche "ok" dans la console
            console.log("ok");
        }
    }
    // Envoie la requête
    xhr.send()
}

// Fonction qui affiche les détails d'un article
function details(code) {
    // Récupère l'élément HTML de l'image de l'article
    var img = document.getElementById('image_' + code);
    // Si l'image est cachée, arrête la fonction
    if (img.style.display === 'none') { return; }
    // Récupère tous les éléments HTML qui ne sont pas l'article spécifié
    var elements = document.querySelectorAll(':not(#article_' + chapitre + ')');
    // Cache tous les éléments récupérés
    for (var i = 0; i < elements.length; i++) { elements[i].style.display = 'none'; }
    // Récupère le genre de l'article et le stocke dans une variable
    var genre = document.getElementById('genre_' + code).innerHTML;
    // Récupère le titre de l'article et le stocke dans une variable
    var titre = document.getElementById('titre_' + code).innerHTML;
    // Récupère l'auteur de l'article et le stocke dans une variable
    var auteur = document.getElementById('auteur_' + code).innerHTML;
    // Récupère le prix de l'article et le stocke dans une variable
    var prix = document.getElementById('prix_' + code).innerHTML;
    // Récupère le lien de l'image de l'article et le stocke dans une variable
    var lienImage = document.getElementById('lienImage_' + code).innerHTML;
}
