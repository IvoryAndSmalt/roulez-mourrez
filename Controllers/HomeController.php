<?php

// Chargement de Twig
require "LoaderTwig.php";

// // Chargement du Model
require('Models/Home.php');






$caracteristiques_lumiere = getValues('caracteristiques', 'lumiere');
// var_dump($caracteristiques_lumiere);



// ======================================== SECTION USAGER ========================================

    $usagers_categorie_u = getValues('usagers', 'categorie_u');
    // var_dump($usagers_categorie_u);

    $usagers_gravite = getValues('usagers', 'gravite');
    // var_dump($usagers_gravite);

    $usagers_sexe = getValues('usagers', 'sexe');
    // var_dump($usagers_sexe);

    $usagers_trajet = getValues('usagers', 'trajet');
    // var_dump($usagers_trajet);

    $usagers_equipement_secu = getValues('usagers', 'equipement_secu');
    // var_dump($usagers_equipement_secu);





// ======================================== SECTION LIEUX ========================================
 
$lieux_categorie_r = getValues('lieux', 'categorie_r');

$lieux_voie = getValues('lieux', 'voie');

$lieux_regime_circ= getValues('lieux', 'regime_circ');

$lieux_nb_voies = getValues('lieux', 'nb_voies');

$lieux_declivite = getValues('lieux', 'declivite');

$lieux_courbe_r = getValues('lieux', 'courbe_r');

$lieux_etat_r = getValues('lieux', 'etat_r');

$lieux_infra_r = getValues('lieux', 'infra_r');

$lieux_situation_acc = getValues('lieux', 'situation_acc');

// On charge le fichier voulus du dossier Views 
$template = $twig->load('home.twig');

// On envoi les données a la vue avec Twig
echo $template->render(array(
    "usagers_categorie_u" => $usagers_categorie_u,
    "usagers_gravite" => $usagers_gravite,
    "usagers_sexe" => $usagers_sexe,
    "usagers_trajet" => $usagers_trajet,
    "usagers_equipement_secu" => $usagers_equipement_secu
));
