<?php

// Importation des différents fichiers  -->
include_once('../../config/connexion.php');
include_once('../../config/fonctions.php');
include_once('../../config/public.php');

require_once('../../paiement/init.php');

date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fra_fra');

$final = '';

if (!empty($_POST)) {

    $refund_req = $dbh->prepare('SELECT * FROM subscriptions WHERE token = "' . $_POST['token'] . '"');
    $refund_req->execute();
    $refund = $refund_req->fetch();

    $user_req = $dbh->prepare('SELECT * FROM users WHERE id = "' . $refund['user_id'] . '"');
    $user_req->execute();
    $user_info = $user_req->fetch();


    // Date de 14 jours expirée
    if (date('Y-m-d H:i:s', strtotime($refund['paiement_date'])) <= date('Y-m-d H:i:s', strtotime('+1 month'))) {

        if (!empty($refund)) {

            $stripe = new \Stripe\StripeClient('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');
            $stripe->refunds->create(['payment_intent' => $refund['transaction_id']]);

            // Envoi du mail
            $from = 'contact@location-entre-particulier.fr';
            $from_name = 'LEP - Location entre particulier';
            $to = $user_info['email'];
            $to_name = $user_info['prenom'] . ' ' . $user_info['nom'];
            $reply       = "no-reply@location-entre-particulier.fr";
            $reply_name     = 'LEP - Location entre particulier';

            $sujet = 'Votre remboursement n°' . str_replace('pi_', '', $refund['transaction_id']) . ' sur LEP PRO - Location entre particulier';

            $content = 'Bonjour,<br/><br/>';

            $content .= 'Vous avez demandé le remboursement de votre abonnement qui a abouti.<br/><br/>';

            $content .= 'Vous recevrez votre remboursement sous 5 à 10 jours selon les modalités de votre banque.<br/><br/>';

            $content .= 'Passez ce délais merci de prendre contact avec nous en <b><a href="https://location-entre-particulier.fr/contact">cliquant ici</a></b><br/><br/>';

            $content .= 'Cet email sert de justificatif de remboursement, merci de le conserver sans limite de temps.<br/><br/>';

            $content .= 'Nous vous souhaitons une agréable expérience sur <a href="https://location-entre-particulier.fr">LEP</a>.<br/><br/>';

            $content .= '<img width="50" height="50" src="https://location-entre-particulier.fr/public/assets/images/favicon.png"><br/><br/>';

            $content .= 'A très bientôt.';

            sendMail($from, $from_name, $to, $to_name, $reply, $reply_name, $sujet, $content, $dbh, false);

            $update = $dbh->query('UPDATE `users` SET `subscription` = 0 WHERE id = "' . $refund['user_id'] . '"');

            $update = $dbh->query('UPDATE `subscriptions` SET `status` = 4, refund_at = "' . date('Y-m-d H:i:s') . '" WHERE token = "' . $_POST['token'] . '"');

            $final = ['refund' => true, 'title' => 'Votre demande de remboursement !', 'message' => 'Votre demande a été effectuée avec succès, le délai bancaire est de 5 à 10 jours selon les modalités de votre banque.<br/><br/>Merci de vérifier votre compte pour confirmer le remboursement de votre abonnement.<br/><br/>Nous vous remercions pour votre confiance.<br/><br/><h4>A très bientôt.</h4>', 'icone' => $image_url . 'check.png'];
        } else {
            $final = ['refund' => false, 'title' => 'Problème de remboursement !', 'message' => 'Vous avez déjà demandé le remboursement de votre abonnement, il nous est donc impossible de procéder à celui çi.<br/><br/><h4>A très bientôt.</h4>', 'icone' => $image_url . 'error.png'];
        }
    } else {
        $final = ['refund' => false, 'title' => 'Problème de remboursement !', 'message' => 'Le délai de remboursement de 14 jours a été dépassé. Nous ne pouvons donner suite à celle çi.<br/><br/><h4>A très bientôt.</h4>', 'icone' => $image_url . 'error.png'];
    }
}

echo json_encode($final);
