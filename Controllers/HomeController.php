<?php

// Chargement de Twig
require "LoaderTwig.php";

// // Chargement du Model
require('Models/Home.php');

$test = testReq("VL seul");

// echo "<pre>";
// print_r($test);
// echo "</pre>";

//Charge toutes les options d'intersection

//caracteristiques
$caracteristiques = getColumns('caracteristiques');
$colonnes_car = [];
foreach ($caracteristiques as $key => $value) {
    array_push($colonnes_car, $value['COLUMN_NAME']);
}


?><pre><?php
for ($i=0; $i < count($colonnes_car); $i++) {
    if($i >10 || $i <6){
        continue;
    }
    else{
        var_dump(getValues('caracteristiques', $colonnes_car[$i]));
    }
}

//lieux
$lieux = getColumns('lieux');
$colonnes_lieux = [];
foreach ($lieux as $key => $value) {
    array_push($colonnes_lieux, $value['COLUMN_NAME']);
}

for ($i=0; $i < count($colonnes_lieux); $i++) {
    if($i >10 || $i <6){
        continue;
    }
    else{
        var_dump(getValues('lieux', $colonnes_lieux[$i]));
    }
}

//usagers
$usagers = getColumns('usagers');
$colonnes_usagers = [];
foreach ($usagers as $key => $value) {
    array_push($colonnes_usagers, $value['COLUMN_NAME']);
}

for ($i=0; $i < count($colonnes_usagers); $i++) {
    if($i >10 || $i <6){
        continue;
    }
    else{
        var_dump(getValues('usagers', $colonnes_usagers[$i]));
    }
}

//vehicules
$vehicules = getColumns('vehicules');
$colonnes_vehicules = [];
foreach ($vehicules as $key => $value) {
    array_push($colonnes_vehicules, $value['COLUMN_NAME']);
}

for ($i=0; $i < count($colonnes_vehicules); $i++) {
    if($i >10 || $i <6){
        continue;
    }
    else{
        var_dump(getValues('vehicules', $colonnes_vehicules[$i]));
    }
}
?></pre><?php
// On charge le fichier voulus du dossier Views 
$template = $twig->load('home.twig');

// On envoi les données a la vue avec Twig
echo $template->render(array(
    "colonnes_car" => $colonnes_car,
    "colonnes_lieux" => $colonnes_lieux,
    "colonnes_usagers" => $colonnes_usagers,
    "colonnes_vehicules" => $colonnes_vehicules,
));
