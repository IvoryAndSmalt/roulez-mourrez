<?php

<<<<<<< HEAD
// require 'Models/Home.php';

require('env.php');

//Uncomment the section below to connect to database, once env.php has been filled.
=======
// Chargement de Twig
require "LoaderTwig.php";

// Chargement du Model
require('Models/Home.php');

// On charge le fichier voulus du dossier Views 
$template = $twig->load('home.twig');





// On envoi les données a la vue avec Twig
echo $template->render(array(""));
>>>>>>> c320dc5e05e92ff086e80f0f0c37e98e6954e887
