<?php

// Chargement de Twig
require "LoaderTwig.php";

// // Chargement du Model
require('Models/Home.php');

if(isset($_POST) && !empty($_POST)){
    $i = 1;
    foreach ($_POST as $key => $value) {
        if($value !== ""){
            $arg = "arg".$i;
            $$arg = $key. "@". $value;
            $i++;
        }
    }

    // appeler la fonction avec les arguments donnés
    if(isset($arg5)){
        $test = getRes($arg1, $arg2, $arg3, $arg4, $arg5);
        echo "il y a ".$test[0]['total']." résultats.";
    }
    elseif (isset($arg4)) {
        $test = getRes($arg1, $arg2, $arg3, $arg4);
        echo "il y a ".$test[0]['total']." résultats.";
    }
    elseif (isset($arg3)) {
        $test = getRes($arg1, $arg2, $arg3);
        echo "il y a ".$test[0]['total']." résultats.";
    }
    elseif (isset($arg2)) {
        $test = getRes($arg1, $arg2);
        echo "il y a ".$test[0]['total']." résultats.";
    }
    elseif (isset($arg1)){
        $test = getRes($arg1);
        echo "il y a ".$test[0]['total']." résultats.";
    }
    else{
        $test = getRes();
        echo "il y a ".$test[0]['total']." résultats.";
    }
}

// =============================== SECTION CARACTERISTIQUES===========================
    $caracteristiques_lumiere = getValues('caracteristiques', 'lumiere');
    $caracteristiques_agglo = getValues('caracteristiques', 'agglo');
    $caracteristiques_intersection = getValues('caracteristiques','intersection');
    $caracteristiques_atm = getValues('caracteristiques', 'atm');
    $caracteristiques_collision = getValues('caracteristiques', 'collision');

// ============================= SECTION USAGERS =============================
    $usagers_categorie_u = getValues('usagers', 'categorie_u');
    $usagers_gravite = getValues('usagers', 'gravite');
    $usagers_sexe = getValues('usagers', 'sexe');
    $usagers_trajet = getValues('usagers', 'trajet');
    $usagers_equipement_secu = getValues('usagers', 'equipement_secu');

// ======================= SECTION VEHICULES =======================
    $vehicules_categorie_v = getValues('vehicules', 'categorie_v');
    $vehicules_occupants_tc = getValues('vehicules', 'occupants_tc');
    $vehicules_obstacle_fixe = getValues('vehicules', 'obstacle_fixe');
    $vehicules_obstacle_mobile = getValues('vehicules', 'obstacle_mobile');
    $vehicules_point_choc = getValues('vehicules', 'point_choc');
    $vehicules_manoeuvre = getValues('vehicules', 'manoeuvre');

// ==================== SECTION LIEUX ====================================
    $lieux_categorie_r = getValues('lieux', 'categorie_r');
    $lieux_voie = getValues('lieux', 'voie');
    $lieux_regime_circ= getValues('lieux', 'regime_circ');
    $lieux_nb_voies = getValues('lieux', 'nb_voies');
    $lieux_declivite = getValues('lieux', 'declivite');
    $lieux_courbe_r = getValues('lieux', 'courbe_r');
    $lieux_etat_r = getValues('lieux', 'etat_r');
    $lieux_infra_r = getValues('lieux', 'infra_r');
    $lieux_situation_acc = getValues('lieux', 'situation_acc');

// ==================== SECTION RESULTAT & DEPARTEMENTS ==============================
    $resultat =  getRes("total");

    $caracteristiques_departement = getValues('caracteristiques', 'departement');


// On charge le fichier voulus du dossier Views 
$template = $twig->load('home.twig');

// On envoi les données a la vue avec Twig
echo $template->render(array(
    "caracteristiques_lumiere" => $caracteristiques_lumiere,
    "caracteristiques_agglo" => $caracteristiques_agglo,
    "caracteristiques_intersection" => $caracteristiques_intersection,
    "caracteristiques_atm" => $caracteristiques_atm,
    "caracteristiques_collision" => $caracteristiques_collision,

    "lieux_categorie_r" => $lieux_categorie_r,
    "lieux_regime_circ" => $lieux_regime_circ,
    "lieux_nb_voies" => $lieux_nb_voies,
    "lieux_declivite" => $lieux_declivite,
    "lieux_courbe_r" => $lieux_courbe_r,
    "lieux_etat_r" => $lieux_etat_r,
    "lieux_infra_r" => $lieux_infra_r,
    "lieux_situation_acc" => $lieux_situation_acc,

    "usagers_categorie_u" => $usagers_categorie_u,
    "usagers_gravite" => $usagers_gravite,
    "usagers_sexe" => $usagers_sexe,
    "usagers_trajet" => $usagers_trajet,
    "usagers_equipement_secu" => $usagers_equipement_secu,

    "vehicules_categorie_v" => $vehicules_categorie_v,  
    "vehicules_occupants_tc" => $vehicules_occupants_tc, 
    "vehicules_obstacle_fixe" => $vehicules_obstacle_fixe,
    "vehicules_obstacle_mobile" => $vehicules_obstacle_mobile,
    "vehicules_point_choc" => $vehicules_point_choc,
    "vehicules_manoeuvre" => $vehicules_manoeuvre,

    // "resultat" => $resultat
    "caracteristiques_departement" => $caracteristiques_departement,

));