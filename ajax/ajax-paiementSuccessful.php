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

if ($_POST['statut_transaction'] == "succeeded") {

    $status;

    //Generate a random string.
    $token = openssl_random_pseudo_bytes(16);

    //Convert the binary data into hexadecimal representation.
    $token = bin2hex($token);

    switch ($_POST['statut_transaction']) {
        case 'succeeded':
            $status = 2;
            break;

        case 'CANCELED':
            $status = 3;
            break;
    }

    $email = $_POST['email'];

    $update = $dbh->query('UPDATE `contact_location` SET `paiement_date` = "' . date('Y-m-d H:i:s') . '", `status` = "' . $status . '", `transaction_id` = "' . $_POST['transaction_id'] . '", `token` = "' . $token . '" WHERE email = "' . $email . '"');
}
