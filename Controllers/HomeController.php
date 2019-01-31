<?php

// Chargement de Twig
require "LoaderTwig.php";

// // Chargement du Model
require('Models/Home.php');

$test = testReq("VL seul");

echo "<pre>";
print_r($test);
echo "</pre>";

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
?></pre><?php
// On charge le fichier voulus du dossier Views 
$template = $twig->load('home.twig');

// On envoi les données a la vue avec Twig
echo $template->render(array(
    "colonnes_car" => $colonnes_car,
));
