<?php

// Variables  -->

// Database
$dataBase = [
    'DB_USER' => 'gaetan',
    'DB_PASSWORD' => '@Zyfnnake72',
    'DB_NAME' => 'lep'
];

// Connexion / Base de donnée Mysql -->

try {
    $dbh = new PDO('mysql:host=31.33.145.219; dbname=' . $dataBase['DB_NAME'], $dataBase['DB_USER'], $dataBase['DB_PASSWORD']);
    $dbh->exec("SET CHARACTER SET utf8");

} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die(); 
}

?>