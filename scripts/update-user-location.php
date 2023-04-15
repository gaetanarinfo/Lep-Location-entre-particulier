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
        $update = $dbh->query('UPDATE `contact_location_history` SET `status` = 5 WHERE token = "' . $value['token'] . '"');
        $update = $dbh->query('UPDATE `contact_location` SET `paiement_date` = NULL, `status` = 5, `transaction_id` = NULL, `token` = NULL WHERE email = "' . $value['email'] . '"');
    }
}

$req = $dbh->prepare('SELECT * FROM subscriptions WHERE status = :status');
$req->execute(['status' => 2]);
$donnees = $req->fetchAll();

foreach ($donnees as $value) {
    if (date('Y-m-d H:i:s', strtotime($value['paiement_date'])) >= date('Y-m-d H:i:s', strtotime('+1 month'))) {
        $update = $dbh->query('UPDATE `subscriptions` SET `status` = 5 WHERE token = "' . $value['token'] . '"');
        $update = $dbh->query('UPDATE `locations` SET `abonnement_expire` = 1 WHERE user_id = "' . $value['user_id'] . '"');
        $update = $dbh->query('UPDATE `users` SET `subscription` = 0 WHERE id = "' . $value['user_id'] . '"');
    }

    if (date('Y-m-d H:i:s', strtotime($value['paiement_date'])) >= date('Y-m-d H:i:s', strtotime('+1 month'))) {
        $req = $dbh->prepare('SELECT * FROM locations WHERE user_id = "' . $value['user_id'] . '"');
        $req->execute();
        $donnees2 = $req->fetchAll();

        foreach ($donnees2 as $value) {
            $update = $dbh->query('UPDATE `locations` SET `abonnement_expire` = 1 WHERE user_id = "' . $value['user_id'] . '"');
        }
    }
}
