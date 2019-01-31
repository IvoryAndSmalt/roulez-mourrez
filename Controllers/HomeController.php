<?php

// Chargement de Twig
require "LoaderTwig.php";

// // Chargement du Model
require('Models/Home.php');

$caracteristiques_lumiere = getValues('caracteristiques', 'lumiere');
$caracteristiques_agglo = getValues('caracteristiques', 'agglo');
$caracteristiques_intersection = getValues('caracteristiques', 'intersection');
$caracteristiques_atm = getValues('caracteristiques', 'atm');
$caracteristiques_collision = getValues('caracteristiques', 'collision');

$vehicules_categorie_v = getValues('vehicules', 'categorie_v');


// On charge le fichier voulus du dossier Views 
$template = $twig->load('home.twig');

// On envoi les données a la vue avec Twig
echo $template->render(array(
    "caracteristiques_lumiere" => $caracteristiques_lumiere,
    "caracteristiques_agglo" => $caracteristiques_agglo,
    "caracteristiques_intersection" => $caracteristiques_intersection,
    "caracteristiques_atm" => $caracteristiques_atm,
    "caracteristiques_collision" => $caracteristiques_collision,
));