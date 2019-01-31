<?php

// Chargement de Twig
require "LoaderTwig.php";

// // Chargement du Model
require('Models/Home.php');






$caracteristiques_lumiere = getValues('caracteristiques', 'lumiere');
var_dump($caracteristiques_lumiere);







// On charge le fichier voulus du dossier Views 
$template = $twig->load('home.twig');

// On envoi les données a la vue avec Twig
echo $template->render(array(
    "colonnes_car" => $colonnes_car
));
