<?php

// Importation des différents fichiers  -->
include_once('../config/connexion.php');
include_once('../config/fonctions.php');
include_once('../config/public.php');

require_once('../paiement/init.php');

date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fra_fra');

$final = '';

if (!empty($_POST)) {

    $refund_req = $dbh->prepare('SELECT * FROM contact_location_history WHERE status = 2 AND token = "' . $_POST['token'] . '"');
    $refund_req->execute();
    $refund = $refund_req->fetch();

    // Date de 14 jours expirée
    if (date('Y-m-d H:i:s', strtotime($refund['paiement_date'])) <= date('Y-m-d H:i:s', strtotime('+1 month'))) {

        if (!empty($refund)) {

            $stripe = new \Stripe\StripeClient('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');
            $stripe->refunds->create(['payment_intent' => $refund['transaction_id']]);

            // Envoi du mail
            $from = 'contact@location-entre-particulier.fr';
            $from_name = 'LEP - Location entre particulier';
            $to = $refund['email'];
            $to_name = '';
            $reply       = "no-reply@location-entre-particulier.fr";
            $reply_name     = 'LEP - Location entre particulier';

            $sujet = 'Votre remboursement n°' . str_replace('pi_', '', $refund['transaction_id']) . ' sur LEP - Location entre particulier';

            $content = 'Bonjour,<br/><br/>';

            $content .= 'Vous avez demandé le remboursement de votre abonnement qui a abouti.<br/><br/>';

            $content .= 'Vous recevrez votre remboursement sous 5 à 10 jours selon les modalités de votre banque.<br/><br/>';

            $content .= 'Passez ce délais merci de prendre contact avec nous en <b><a href="https://location-entre-particulier.fr/contact">cliquant ici</a></b><br/><br/>';

            $content .= 'Cet email sert de justificatif de remboursement, merci de le conserver sans limite de temps.<br/><br/>';

            $content .= 'Nous vous souhaitons une agréable expérience sur <a href="https://location-entre-particulier.fr">LEP</a>.<br/><br/>';

            $content .= '<img width="50" height="50" src="https://location-entre-particulier.fr/public/assets/images/favicon.png"><br/><br/>';

            $content .= 'A très bientôt.';

            sendMail($from, $from_name, $to, $to_name, $reply, $reply_name, $sujet, $content, $dbh, false);

            $update = $dbh->query('UPDATE `contact_location_history` SET `status` = 4, refund_at = "' . date('Y-m-d H:i:s') . '" WHERE token = "' . $refund['token'] . '"');
            $update = $dbh->query('UPDATE `contact_location` SET `paiement_date` = NULL, `status` = 4, `transaction_id` = NULL, `token` = NULL WHERE email = "' . $refund['email'] . '"');

            if (!empty($_COOKIE['location_email'])) {
                setcookie("location_email", "", time() - 3600);
            }

            $final = ['refund' => true, 'title' => 'Votre demande de remboursement !', 'message' => 'Votre demande a été effectuée avec succès, le délai bancaire est de 5 à 10 jours selon les modalités de votre banque.<br/><br/>Merci de vérifier votre compte pour confirmer le remboursement de votre abonnement.<br/><br/>Nous vous remercions pour votre confiance.<br/><br/><h4>A très bientôt.</h4>', 'icone' => $image_url . 'check.png'];
        } else {
            $final = ['refund' => false, 'title' => 'Problème de remboursement !', 'message' => 'Vous avez déjà demandé le remboursement de votre abonnement, il nous est donc impossible de procéder à celui çi.<br/><br/><h4>A très bientôt.</h4>', 'icone' => $image_url . 'error.png'];
        }
    } else {
        $final = ['refund' => false, 'title' => 'Problème de remboursement !', 'message' => 'Le délai de remboursement de 14 jours a été dépassé. Nous ne pouvons donner suite à celle çi.<br/><br/><h4>A très bientôt.</h4>', 'icone' => $image_url . 'error.png'];
    }
}

echo json_encode($final);
