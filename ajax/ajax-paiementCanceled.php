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
    $email = $_POST['email'];

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

    // Envoi du mail
    $from = 'contact@location-entre-particulier.fr';
    $from_name = 'LEP - Location entre particulier';
    $to = $email;
    $to_name = '';
    $reply       = "no-reply@location-entre-particulier.fr";
    $reply_name     = 'LEP - Location entre particulier';

    $sujet = 'Votre paiement n°' . str_replace('pi_', '', $_POST['transaction_id']) . ' sur LEP - Location entre particulier';

    $content = 'Bonjour,<br/><br/>';

    $content .= 'Une erreur est survenue lors de votre paiement, aucune transaction n\'a été effectué.<br/><br/>';

    $content .= 'Pour plus d\'information merci de nous contacter, et aussi de vous rapprocher de votre banque.<br/><br/>';

    $content .= 'Voici le récapitulatif de votre commande : <br/><br/>';

    $content .= 'Abonnement : <b>1 mois LEP</b><br/>';
    $content .= 'Paiement : <b>carte bancaire (STRIPE)</b><br/><br/>';

    $content .= 'Votre adresse email : <b>' . $email . '</b><br/>';
    $content .= 'Votre adresse ip : <b>' . $_SERVER['REMOTE_ADDR'] . '</b><br/><br/>';
    $content .= 'Date de la commande : <b>' . date('d/m/Y') . ' ' . date('H:i') . '</b  ><br/><br/>';

    $content .= 'Cet email sert de justificatif de refus de paiement, merci de le conserver sans limite de temps.<br/><br/>';

    $content .= 'Nous vous souhaitons une agréable expérience sur <a href="https://location-entre-particulier.fr">LEP</a>.<br/><br/>';

    $content .= '<img width="50" height="50" src="https://location-entre-particulier.fr/public/assets/images/favicon.png"><br/><br/>';

    $content .= 'A très bientôt.';

    sendMail($from, $from_name, $to, $to_name, $reply, $reply_name, $sujet, $content, $dbh, false);
}
