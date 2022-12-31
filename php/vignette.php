<?php
// Définition du type de contenu de la page à afficher
header('Content-type: image/jpeg');

// Récupération des paramètres de la génération de la vignette
// Le code propre à chaque image de pochette de CD
$lienImage = $_GET['lien'];
// La hauteur de la vignette générée
$heightDEST = $_GET['height'];
// La largeur de la vignette générée
$widthDEST = $_GET['width'];

// Récupération de l'image source à partir du lien et création de l'image qui contiendra la vignette
$imageSRC = imagecreatefromstring(file_get_contents("../img/$lienImage"));

// Récupération des dimensions de l'image source
$heightSRC = imagesy($imageSRC);
$widthSRC = imagesx($imageSRC);

// Création de l'image de destination avec les dimensions de la vignette souhaitées
$imageDEST = ImageCreateTrueColor($widthDEST, $heightDEST);

// Redimensionnement de l'image source pour créer la vignette
imagecopyresampled($imageDEST, $imageSRC, 0, 0, 0, 0, $widthDEST, $heightDEST, $widthSRC, $heightSRC);

// Envoi de l'image de vignette au navigateur
imagejpeg($imageDEST);

// suppression des images pour libérer de la mémoire
imageDestroy($imageDEST);
imageDestroy($imageSRC);
?>