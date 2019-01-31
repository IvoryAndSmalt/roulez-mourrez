<?php

// require 'Models/Home.php';

require('env.php');

//Uncomment the section below to connect to database, once env.php has been filled.
// $dbh = new PDO('mysql:host='. $host .';dbname='. $dbname, $user, $pass);
// $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);

// $handle = fopen('assets/usagers-2017.csv', 'r+') or die("Couldn't get handle");
// $array = [];

// if ($handle) {
//     for ($i = 0; $i < 136050; $i++) {
//         $buffer = fgets($handle, 4096);
//         array_push($array, explode(',', $buffer));
//     }
//     fclose($handle);
// }

// var_dump($array);
// $all_repos = $dbh->prepare('INSERT INTO usagers (numa, place, catu, grav, sexe, trajet, secu, locp, actp, an_nais) VALUES (?,?,?,?,?,?,?,?,?,?)');

// foreach ($array as $line) {
//     $all_repos->execute([$line[0],$line[1],$line[2],$line[3],$line[4],$line[5],$line[6],$line[7],$line[8],$line[10]]);
// }