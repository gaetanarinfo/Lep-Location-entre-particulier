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

     // Création de l'historique du paiement //
     $insert = $dbh->query('INSERT INTO `contact_location_history` (
       `id_site`, 
       `email`, 
       `status`, 
       `prix`, 
       `paiement_date`, 
       `paiement_methode`, 
       `transaction_id`, 
       `token`
    ) VALUES (
        1,
        "' . $email  . '",
        "' . $status . '",
        "21.98",
        "' . date('Y-m-d H:i:s') . '",
        "Stripe",
        "' . $_POST['transaction_id'] . '",
        "' . $token . '"
    )');

    // Envoi du mail
    $from = 'contact@location-entre-particulier.fr';
    $from_name = 'LEP - Location entre particulier';
    $to = $email;
    $to_name = '';
    $reply       = "no-reply@location-entre-particulier.fr";
    $reply_name     = 'LEP - Location entre particulier';

    $sujet = 'Votre paiement n°' . str_replace('pi_', '', $_POST['transaction_id']) . ' sur LEP - Location entre particulier';

    $content = 'Bonjour,<br/><br/>';

    $content .= 'Merci pour votre paiement sur notre site internet.<br/><br/>';

    $content .= 'Votre paiement est actif pour 1 mois, vous pouvez désormais contacter les propriétaires sans limite.<br/><br/>';

    $content .= 'Voici le récapitulatif de votre commande : <br/><br/>';    

    $content .= 'Abonnement : <b>1 mois LEP</b><br/>';
    $content .= 'Paiement : <b>carte bancaire (STRIPE)</b><br/><br/>';

    $content .= 'Votre adresse email : <b>' . $email . '</b><br/>';
    $content .= 'Votre adresse ip : <b>' . $_SERVER['REMOTE_ADDR'] . '</b><br/><br/>';

    $content .= 'Montant de la transaction : <b>21.98 €</b><br/>';
    $content .= 'Date de la commande : <b>' . date('d/m/Y') . ' ' . date('H:i') . '</b  ><br/><br/>';

    $content .= 'Pour demander un remboursement merci de <a href="https://location-entre-particulier.fr/refund/' . $token . '">cliquez-ici</a>.<br/><br/>';

    $content .= 'Selon nos conditions de remboursement, vous avez 14 jours pour le demander.<br/><br/>';

    $content .= 'Cet email sert de justificatif de paiement, merci de le conserver sans limite de temps.<br/><br/>';

    $content .= 'Nous vous souhaitons une agréable expérience sur <a href="https://location-entre-particulier.fr">LEP</a>.<br/><br/>';

    $content .= '<img width="50" height="50" src="https://location-entre-particulier.fr/public/assets/images/favicon.png"><br/><br/>';

    $content .= 'A très bientôt.';

    // PDF
    include_once('../modules/paiements/facture-2.php');

    // PDF
    $attachments = array();

    array_push($attachments, array('name' => str_replace('pdf/paiements/', '', $filename), 'url' => 'https://location-entre-particulier.fr/pdf/paiements/' .  str_replace('pdf/paiements/', '', $filename)));

    sendMail($from, $from_name, $to, $to_name, $reply, $reply_name, $sujet, $content, $dbh, $attachments);

}
