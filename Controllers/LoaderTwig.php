<?php

/***************************/
/*** initialisation Twig ***/
/***************************/

// Charge l'autoloader permettant de charger les classes de TWIG
require 'vendor/autoload.php';

// CHARGE LE LOADER = dossier contenant les templates

// Charge le loader = Et cherche des templates dans le dosier Views
$loader = new Twig_Loader_Filesystem('Views'); 


// INITIALISE TWIG = ($loader, tableau d'option environnement)
$twig = new Twig_Environment($loader, [

    // N'active pas le cache (mieux pour le développement)
    'cache'=>false

    // Active une mémoire cache dans le dossier actuel et il sera nommé tmp
    // 'cache'=> __DIR__ . '/tmp'

]);