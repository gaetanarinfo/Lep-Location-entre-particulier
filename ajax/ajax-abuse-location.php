<?php

// Affichage des erreurs  -->
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Importation des différents fichiers  -->
include_once('../config/connexion.php');
include_once('../config/fonctions.php');
include_once('../config/public.php');

$final = '';

if (isset($_POST)) {

    $reason = '';

    switch ($_POST['abuse_reason']) {
        case 'not_vacant':
            $reason = "Logement non disponible";
            break;

        case 'error_info':
            $reason = "Erreur dans les données";
            break;

        case 'scam':
            $reason = "Risque de fraude";
            break;
    }

    // Création du contact //
    $insert_annonce = $dbh->query('INSERT INTO `abuses_location` (
        `id_site`, 
        `id_location`,
        `sujet`
    ) VALUES (
        1,
        "' . $_POST['location_id'] . '",
        "' . $_POST['abuse_reason'] . '"
    )');

    // Récupération des datas sans quot
    $req = $dbh->prepare('SELECT * FROM locations WHERE id_site = 1 AND id = "' . $_POST['location_id'] . '"');
    $req->execute();
    $location = $req->fetch();

    $req = $dbh->prepare('SELECT * FROM users WHERE id_site = 1 AND id = "' . $location['user_id'] . '"');
    $req->execute();
    $user_location = $req->fetch();

    // Envoi du mail
    $from = 'contact@location-entre-particulier.fr';
    $from_name = 'LEP - Location entre particulier';
    $to = $user_location['email_contact'];
    $to_name = $user_location['prenom'] . ' ' . $user_location['nom'];
    $reply       = "no-reply@location-entre-particulier.fr";
    $reply_name     = 'LEP - Location entre particulier';

    $sujet = 'Signalement d\'une erreur sur votre location ' . $location['title'] . ' n°' . $location['id'];

    $content = 'Bonjour ' . $user_location['prenom'] . ',<br/><br/>';

    $content .= 'Une erreur a été signalé sur votre location la raison est <b>' . $reason . '</b>.<br/><br/>';

    $content .= 'Lien vers votre location <b><a href="https://location-entre-particulier.fr/locations/' . $location['url'] . '">cliquer-ici</a></b>.<br/><br/>';

    $content .= 'Merci de faire le changement dès que possible.<br/><br/>';

    $content .= 'Nous vous souhaitons une agréable expérience sur <a href="https://location-entre-particulier.fr">LEP</a>.<br/><br/>';

    $content .= '<img width="50" height="50" src="https://location-entre-particulier.fr/public/assets/images/favicon.png"><br/><br/>';

    $content .= 'A très bientôt.';

    sendMail($from, $from_name, $to, $to_name, $reply, $reply_name, $sujet, $content, $dbh, false);

    sendMail($from, $from_name, 'contact@location-entre-particulier.fr', 'Gaëtan Seigneur', $reply, $reply_name, $sujet, $content, $dbh, false);

    $final = ['abuse' => true];
} else {
    // L'utilisateur a rencontré une erreur
    $final = ['abuse' => false];
}

echo json_encode($final);
