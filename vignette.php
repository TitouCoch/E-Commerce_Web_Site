<?php
header('Content-type: image/jpeg');

// Récupération des paramètres de la génération de la vignette
$lienImage = $_GET['lien']; // Le code propre à chaque image de pochette de CD
$heightDEST = $_GET['height']; // La hauteur de la vignette générée
$widthDEST = $_GET['width']; // La largeur de la vignette générée

// Récupération de l'image source à partir du lien et création de l'image qui contiendra la vignette
$imageSRC = imagecreatefromstring(file_get_contents("img/$lienImage"));

// Récupération des dimensions de l'image source
$heightSRC = imagesy($imageSRC);
$widthSRC = imagesx($imageSRC);

$imageDEST = ImageCreateTrueColor($widthDEST, $heightDEST);

// Redimensionnement de l'image source pour créer la vignette
imagecopyresized($imageDEST, $imageSRC, 0, 0, 0, 0, $widthDEST, $heightDEST, $widthSRC, $heightSRC);
imagejpeg($imageDEST);

// suppression des images pour liberer de la mémoire
imageDestroy($imageDEST);
imageDestroy($imageSRC);
?>