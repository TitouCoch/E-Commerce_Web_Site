function ajouterAuPanier(code) {
    console.log(code)
    var genre = document.getElementById('genre_'+code).innerHTML;
    var titre = document.getElementById('titre_'+code).innerHTML;
    var auteur = document.getElementById('auteur_'+code).innerHTML;
    var prix = document.getElementById('prix_'+code).innerHTML;
    var lienImage = document.getElementById('lienImage_'+code).innerHTML;
    url = "ajouterAuPanierAjax.php?code="+code+"&genre="+genre+"&titre="+titre+"&auteur="+auteur+"&prix="+prix+"&lienImage="+lienImage;
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
function ajouterSelection(code) {
    var article = document.getElementById('article_'+code);
    article.style.border = "3px solid red";
    console.log(code);
    url = "ajouterSelection.php?code="+code;
    var xhr = new XMLHttpRequest();
    xhr.open( 'GET' , url , true);
    xhr.onreadystatechange = function(){
        if(xhr.readyaState===4 && xhr.status===200){
            console.log("ok");
        }
    }
    xhr.send()
    
}

function details(code){
    var img = document.getElementById('image_'+code);
    if (img.style.display === 'none') { return;}
    var elements = document.querySelectorAll(':not(#article_' + chapitre + ')');
    for (var i = 0; i < elements.length; i++) { elements[i].style.display = 'none';}

    var genre = document.getElementById('genre_'+code).innerHTML;
    var titre = document.getElementById('titre_'+code).innerHTML;
    var auteur = document.getElementById('auteur_'+code).innerHTML;
    var prix = document.getElementById('prix_'+code).innerHTML;
    var lienImage = document.getElementById('lienImage_'+code).innerHTML;
}
