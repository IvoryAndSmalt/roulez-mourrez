<?php

// Chargement de Twig
// require "LoaderTwig.php";

// // Chargement du Model
// require('Models/Home.php');
$host = 'promo-24.codeur.online';
$dbname = 'lucasv_roulez-mourrez;charset=utf8';
$user = 'lucasv';
$pass = 'vEzn061G+Tzu3A==';

$dbh = new PDO('mysql:host='. $host .';dbname='. $dbname, $user, $pass);
$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);

$test = $dbh->query('SELECT * FROM test');
$test->fetchAll();
var_dump($test);

// On charge le fichier voulus du dossier Views 
// $template = $twig->load('home.twig');


// On envoi les données a la vue avec Twig
echo $template->render(array(""));