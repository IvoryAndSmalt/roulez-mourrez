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