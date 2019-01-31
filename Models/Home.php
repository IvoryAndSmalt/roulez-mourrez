<?php

require('env.php');

//Uncomment the section below to connect to database, once env.php has been filled.
$dbh = new PDO('mysql:host='. $host .';dbname='. $dbname, $user, $pass);
$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);

function getValues($table, $colonne){
    global $dbh;

    $valeur = $dbh->prepare('SELECT '.$colonne.' FROM '.$table.' GROUP BY '.$colonne);
    $valeur->execute();

    $valeur = $valeur->fetchAll(PDO::FETCH_ASSOC);

    return $valeur;
}

// function getResultat($arg1 = "*", $arg2 = "*", $arg3 = "*", $arg4 = "*", $arg5 = "*"){
//     global $dbh;

//     $valeur = $dbh->prepare('SELECT *, count(*) FROM caracteristiques, lieux, usagers, vehicules WHERE
//     caracteristiques.numa = lieux.numa AND 
//     caracteristiques.numa = usagers.numa AND 
//     caracteristiques.numa = vehicules.numa AND 
//     lieux.numa = usagers.numa AND 
//     lieux.numa = vehicules.numa AND 
//     usagers.numa = vehicules.numa AND
//     '.$arg1.' = ?

//     ;');
//     $valeur->execute([$arg1, $arg2, $arg3, $arg4, $arg5]);

//     $valeur = $valeur->fetchAll(PDO::FETCH_ASSOC);

//     return $valeur;
// }

function getRes($arg1, $arg2){
global $dbh;

        $valeur = $dbh->prepare('SELECT count(*) FROM caracteristiques, lieux, usagers, vehicules WHERE
        caracteristiques.numa = lieux.numa AND 
        caracteristiques.numa = usagers.numa AND 
        caracteristiques.numa = vehicules.numa AND 
        lieux.numa = usagers.numa AND 
        lieux.numa = vehicules.numa AND 
        usagers.numa = vehicules.numa AND
        lieux.infra_r = ?
    ;');
    $valeur->execute([$arg1, $arg2]);

    $valeur = $valeur->fetchAll(PDO::FETCH_ASSOC);

    return $valeur;
}