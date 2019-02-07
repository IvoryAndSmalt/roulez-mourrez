<?php

// header('Content-Type: application/json');

$host = "localhost";
$dbname = "roulez-mourrez;charset=utf8";
$user = "phpmyadmin";
$pass = "test";

$dbh = new PDO('mysql:host='. $host .';dbname='. $dbname, $user, $pass);
$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);

function getValues($table, $colonne){
    global $dbh;

    $valeur = $dbh->prepare('SELECT '.$colonne.' FROM '.$table.' GROUP BY '.$colonne);
    $valeur->execute();

    $valeur = $valeur->fetchAll(PDO::FETCH_ASSOC);

    return $valeur;
}

function getRes($arg1 = "vehicules_categorie_v@%", $arg2 = "vehicules_categorie_v@%", $arg3 = "vehicules_categorie_v@%", $arg4 = "vehicules_categorie_v@%", $arg5 = "vehicules_categorie_v@%"){
    global $dbh;

    $table1 = stristr($arg1, "_", true);
    $colonne1 = substr_replace(stristr(stristr($arg1, "_"), "@", true), "",0,1);
    $valeur1 = substr_replace(stristr($arg1, '@'), '', 0, 1);

    $table2 = stristr($arg2, "_", true);
    $colonne2 = substr_replace(stristr(stristr($arg2, "_"), "@", true), "",0,1);
    $valeur2 = str_replace("@", "", stristr(stristr($arg2, "_"), "@"));

    $table3 = stristr($arg3, "_", true);
    $colonne3 = substr_replace(stristr(stristr($arg3, "_"), "@", true), "",0,1);
    $valeur3 = str_replace("@", "", stristr(stristr($arg3, "_"), "@"));

    $table4 = stristr($arg4, "_", true);
    $colonne4 = substr_replace(stristr(stristr($arg4, "_"), "@", true), "",0,1);
    $valeur4 = str_replace("@", "", stristr(stristr($arg4, "_"), "@"));

    $table5 = stristr($arg5, "_", true);
    $colonne5 = substr_replace(stristr(stristr($arg5, "_"), "@", true), "",0,1);
    $valeur5 = str_replace("@", "", stristr(stristr($arg5, "_"), "@"));

    $sql = 'SELECT count(*) as total FROM 
    caracteristiques, lieux, usagers, vehicules WHERE
    caracteristiques.numa = lieux.numa AND 
    caracteristiques.numa = usagers.numa AND 
    caracteristiques.numa = vehicules.numa AND 
    lieux.numa = usagers.numa AND 
    lieux.numa = vehicules.numa AND 
    usagers.numa = vehicules.numa AND

    '.$table1.'.'.$colonne1.' LIKE ? AND
    '.$table2.'.'.$colonne2.' LIKE ? AND
    '.$table3.'.'.$colonne3.' LIKE ? AND
    '.$table4.'.'.$colonne4.' LIKE ? AND
    '.$table5.'.'.$colonne5.' LIKE ?;';

    // echo $sql."<br>";
    // echo "<br>Recherche avec :<br>";
    // echo $table1.".".$colonne1."=>".$valeur1."<br>";
    // echo $table2.".".$colonne2."=>".$valeur2."<br>";
    // echo $table3.".".$colonne3."=>".$valeur3."<br>";
    // echo $table4.".".$colonne4."=>".$valeur4."<br>";
    // echo $table5.".".$colonne5."=>".$valeur5."<br>";

    $valeur = $dbh->prepare($sql);

    $valeur->execute([$valeur1, $valeur2, $valeur3, $valeur4, $valeur5]);

    $valeur = $valeur->fetchAll(PDO::FETCH_ASSOC); 

    return $valeur;
}


function getDepartements($arg1 = "vehicules_categorie_v@%", $arg2 = "vehicules_categorie_v@%", $arg3 = "vehicules_categorie_v@%", $arg4 = "vehicules_categorie_v@%", $arg5 = "vehicules_categorie_v@%"){
    global $dbh;

    $table1 = stristr($arg1, "_", true);
    $colonne1 = substr_replace(stristr(stristr($arg1, "_"), "@", true), "",0,1);
    $valeur1 = substr_replace(stristr($arg1, '@'), '', 0, 1);

    $table2 = stristr($arg2, "_", true);
    $colonne2 = substr_replace(stristr(stristr($arg2, "_"), "@", true), "",0,1);
    $valeur2 = str_replace("@", "", stristr(stristr($arg2, "_"), "@"));

    $table3 = stristr($arg3, "_", true);
    $colonne3 = substr_replace(stristr(stristr($arg3, "_"), "@", true), "",0,1);
    $valeur3 = str_replace("@", "", stristr(stristr($arg3, "_"), "@"));

    $table4 = stristr($arg4, "_", true);
    $colonne4 = substr_replace(stristr(stristr($arg4, "_"), "@", true), "",0,1);
    $valeur4 = str_replace("@", "", stristr(stristr($arg4, "_"), "@"));

    $table5 = stristr($arg5, "_", true);
    $colonne5 = substr_replace(stristr(stristr($arg5, "_"), "@", true), "",0,1);
    $valeur5 = str_replace("@", "", stristr(stristr($arg5, "_"), "@"));
   
    $sql =  'SELECT caracteristiques.departement, count(caracteristiques.departement) as totalDepartement FROM 
    caracteristiques, lieux, usagers, vehicules WHERE
    caracteristiques.numa = lieux.numa AND 
    caracteristiques.numa = usagers.numa AND 
    caracteristiques.numa = vehicules.numa AND 
    lieux.numa = usagers.numa AND 
    lieux.numa = vehicules.numa AND 
    usagers.numa = vehicules.numa AND


    '.$table1.'.'.$colonne1.' LIKE ? AND
    '.$table2.'.'.$colonne2.' LIKE ? AND
    '.$table3.'.'.$colonne3.' LIKE ? AND
    '.$table4.'.'.$colonne4.' LIKE ? AND
    '.$table5.'.'.$colonne5.' LIKE ?
    
    GROUP BY caracteristiques.departement;';

    // echo $sql."<br>";
    // echo "<br>Recherche avec :<br>";
    // echo $table1.".".$colonne1."=>".$valeur1."<br>";
    // echo $table2.".".$colonne2."=>".$valeur2."<br>";
    // echo $table3.".".$colonne3."=>".$valeur3."<br>";
    // echo $table4.".".$colonne4."=>".$valeur4."<br>";
    // echo $table5.".".$colonne5."=>".$valeur5."<br>";

    $valeur = $dbh->prepare($sql);

    $valeur->execute([$valeur1, $valeur2, $valeur3, $valeur4, $valeur5]);

    $valeur = $valeur->fetchAll(PDO::FETCH_ASSOC); 

    return $valeur;
}



if(isset($_POST) && !empty($_POST)){
    $i = 1;
    // var_dump($_POST);

    foreach ($_POST as $key => $value) {
        if($value !== ""){
            $arg = "arg".$i;
            $$arg = $key. "@". $value;
            $i++;
        }
    }
    
    // appeler la fonction avec les arguments donnés
    if(isset($arg5)){
        $getres = getRes($arg1, $arg2, $arg3, $arg4, $arg5);
        $resultat = $getres[0]['total'];
    }
    elseif (isset($arg4)) {
        $getres = getRes($arg1, $arg2, $arg3, $arg4);
        $resultat = $getres[0]['total'];
    }
    elseif (isset($arg3)) {
        $getres = getRes($arg1, $arg2, $arg3);
        $resultat = $getres[0]['total'];
    }
    elseif (isset($arg2)) {
        $getres = getRes($arg1, $arg2);
        $resultat = $getres[0]['total'];
    }
    elseif (isset($arg1)){
        var_dump($arg1);
        $getres = getRes($arg1);
        $resultat = $getres[0]['total'];
    }
    else{
        $getres = getRes();
        $resultat = $getres[0]['total'];
        $caracteristiques_departement = getDepartements();
        $mesdepartements = $caracteristiques_departement[0]['totalDepartement'];
    }
}
else{
    $resultat = "noreq";
}

$response = [
    "total" => $resultat,
    "départements" => $mesdepartements,
];

echo $jsonresponse = json_encode($response);