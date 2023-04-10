<?php

// Affichage des erreurs  -->
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Importation des différents fichiers  -->
include_once(__DIR__ . '/../config/connexion.php');
include_once(__DIR__ . '/../config/fonctions.php');
include_once(__DIR__ . '/../config/public.php');

// Récupération des datas sans quot
$req = $dbh->prepare('SELECT * FROM contact_location WHERE status = :status');
$req->execute(['status' => 2]);
$donnees = $req->fetchAll();

foreach ($donnees as $value) {
    if (date('Y-m-d H:i:s', strtotime($value['paiement_date'])) >= date('Y-m-d H:i:s', strtotime('+1 month'))) {
        $update = $dbh->query('UPDATE `contact_location` SET `paiement_date` = NULL, `status` = 5, `transaction_id` = NULL, `token` = NULL WHERE email = "' . $value['email'] . '"');
    }
}
