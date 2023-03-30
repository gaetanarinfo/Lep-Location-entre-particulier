<?php

// Variables  -->

// Database
$dataBase = [
    'DB_USER' => 'gaetan',
    'DB_PASSWORD' => '@Zyfnnake7280',
    'DB_NAME' => 'lep'
];

// Connexion / Base de donnée Mysql -->

try {
    $dbh = new PDO('mysql:host=localhost; dbname=' . $dataBase['DB_NAME'], $dataBase['DB_USER'], $dataBase['DB_PASSWORD']);

} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die(); 
}

?>