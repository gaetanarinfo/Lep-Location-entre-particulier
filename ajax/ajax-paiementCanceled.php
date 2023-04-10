<?php

// Affichage des erreurs  -->
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Importation des différents fichiers  -->
include_once('../config/connexion.php');
include_once('../config/fonctions.php');
include_once('../config/public.php');

date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fra_fra');

if ($_POST['statut_transaction'] == "card_declined" || $_POST['statut_transaction'] == "CANCELED" || $_POST['statut_transaction'] == "ERROR") {


    $status;

    switch ($_POST['statut_transaction']) {
        case 'succeeded':
            $status = 2;
            break;

        case 'COMPLETED':
            $status = 2;
            break;

        case 'CANCELED':
            $status = 3;
            break;

        case 'ERROR':
            $status = 3;
            break;
    }

    $update = $dbh->query('UPDATE `contact_location` SET `paiement_date` = "' . date('Y-m-d H:i:s') . '", `status` = "' . $status . '" WHERE email = "' . $email . '"');

}
