<?php

// Chargement de Twig
require "LoaderTwig.php";

// // Chargement du Model
require('Models/Home.php');






$caracteristiques_lumiere = getValues('caracteristiques', 'lumiere');
var_dump($caracteristiques_lumiere);




//Lieux 
$lieux_categorie_r = getValues('lieux', 'categorie_r');
var_dump($lieux_categorie_r);

$lieux_voie = getValues('lieux', 'voie');
var_dump($lieux_voie);

$lieux_regime_circ= getValues('lieux', 'regime_circ');
var_dump($lieux_regime_circ);

$lieux_nb_voies = getValues('lieux', 'nb_voies');
var_dump($lieux_nb_voies);

$lieux_declivite = getValues('lieux', 'declivite');
var_dump($lieux_declivite);

$lieux_courbe_r = getValues('lieux', 'courbe_r');
var_dump($lieux_courbe_r);

// $lieux_largeur_r = getValues('lieux', 'largeur_r');
// var_dump($lieux_largeur_r);

$lieux_etat_r = getValues('lieux', 'etat_r');
var_dump($lieux_etat_r);

$lieux_infra_r = getValues('lieux', 'infra_r');
var_dump($lieux_infra_r);

$lieux_situation_acc = getValues('lieux', 'situation_acc');
var_dump($lieux_situation_acc);

// On charge le fichier voulus du dossier Views 
$template = $twig->load('home.twig');

// On envoi les données a la vue avec Twig
echo $template->render(array(
    "lieux_categorie_r" => $lieux_categorie_r,
    "lieux_voie" => $lieux_voie,
    "lieux_regime_circ" => $lieux_regime_circ,
    "lieux_nb_voies" => $lieux_nb_voies,
    "lieux_declivite" => $lieux_declivite,
    "lieux_courbe_r" => $lieux_courbe_r,
    // "lieux_largeur_r" => $lieux_largeur_r,
    "lieux_etat_r" => $lieux_etat_r,
    "lieux_infra_r" => $lieux_infra_r,
    "lieux_situation_acc" => $lieux_situation_acc
));