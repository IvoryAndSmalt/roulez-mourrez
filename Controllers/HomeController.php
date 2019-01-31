<?php

// Chargement de Twig
require "LoaderTwig.php";

// // Chargement du Model
require('Models/Home.php');






$caracteristiques_lumiere = getValues('caracteristiques', 'lumiere');
// var_dump($caracteristiques_lumiere);



// ======================================== SECTION USAGER ========================================

    $usages_categorie_u = getValues('usagers', 'categorie_u');
    // var_dump($usages_categorie_u);

    $usages_gravite = getValues('usagers', 'gravite');
    // var_dump($usages_gravite);

    $usages_sexe = getValues('usagers', 'sexe');
    // var_dump($usages_sexe);

    $usages_trajet = getValues('usagers', 'trajet');
    // var_dump($usages_trajet);

    $usages_equipement_secu = getValues('usagers', 'equipement_secu');
    // var_dump($usages_equipement_secu);








// On charge le fichier voulus du dossier Views 
$template = $twig->load('home.twig');

// On envoi les données a la vue avec Twig
echo $template->render(array(
    "usages_categorie_u" => $usages_categorie_u
));
