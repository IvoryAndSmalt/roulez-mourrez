<?php

require('env.php');

//Uncomment the section below to connect to database, once env.php has been filled.
$dbh = new PDO('mysql:host='. $host .';dbname='. $dbname, $user, $pass);
$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);

//Function returning one column from a given ID.
function testReq($VL){
    global $dbh;

    $one_col = $dbh->prepare('SELECT COUNT(*) as co FROM vehicules WHERE categorie_v=?');
    $one_col->execute([$VL]);

    $one_col = $one_col->fetchAll();

    return $one_col;
};

//cas quand il sélectionne 2 trucs
function retourne2($choix1, $choix2){
    $one_col = $dbh->prepare('SELECT $table.choix2.value, $choix2 FROM $table1, $table2 WHERE ofzkof=? AND ozeezfoz=?');
    $one_col->execute([$choix1, $choix2]);

    $one_col = $one_col->fetchAll();
    $array = [];
    foreach ($onecol as $key => $value) {
        array_push($array, $value['numa']);
        $min = min($array);
        $max = max($array);
    }
    return $table = [$min, $max];
}

// function retourne3($table){
//     $one_col = $dbh->prepare('SELECT $table.choix2.value, $choix2 FROM $table1, $table2 WHERE numa <= $table[0] AND numa >= $table[1]');
// }

function getColumns($table){
    global $dbh;

    $colonnes = $dbh->prepare('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = ?');

    $colonnes->execute([$table]);

    return $colonnes->fetchAll();

}

function getValues($table, $colonne){
    global $dbh;

    $one_col = $dbh->prepare('SELECT '.$colonne.' FROM '.$table.' GROUP BY '.$colonne);
    $one_col->execute();

    $one_col = $one_col->fetchAll();

    return $one_col;
}

