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

    if (empty($_POST['ticket_contact'])) {
        $ticket = genererChaineAleatoire(25);
    } else {
        $ticket = $_POST['ticket_contact'];
    }

    $attachement = [];
    $attachements = [];

    // File images //
    if (!empty($_FILES['file_0'])) {

        $message = '';
        $extension = [];
        $success = true;
        $valid_extensions = array('png', 'jpg', 'jpeg', 'webp', 'pdf', 'doc', 'gif');
        $fichier = $_FILES;
        $file_name;

        $img = $fichier['file_0']['name'];
        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

        // Upload
        if (!in_array($ext, $valid_extensions)) {
            array_push($extension, $ext);
        } else {
            $file_name = 'document_' . time() . '.' . $ext;
            array_push($attachement, $_SERVER['DOCUMENT_ROOT'] . '/public/assets/documents/' . $file_name);
            array_push($attachements, '/public/assets/documents/' . $file_name);
            move_uploaded_file($fichier['file_0']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/public/assets/documents/' . $file_name);
        }

        if (!empty($extension)) {
            if (count($extension) > 1) {
                $message = 'Les extensions suivantes : ' . implode(', ', $extension) . ' ne sont pas prise en charge';
            } else {
                $message = 'L\'extension suivante : ' . implode('', $extension) . ' n\'est pas prise en charge';
            }
        } else {
            $message = 'Votre fichiers a bien été uploadé.';
        }
    }

    $attachemens = implode(";", $attachements);
    $attachemens = str_replace('/public/assets/documents/', '', $attachemens);

    // Création du contact //
    $insert_annonce = $dbh->query('INSERT INTO `contacts_history` (
        `id_site`, 
        `civilite`, 
        `email`, 
        `tel`, 
        `nom`, 
        `penom`, 
        `sujet`, 
        `ticket`, 
        `message`,
        `file`
    ) VALUES (
        1,
        "' . $_POST['genre_contact'] . '",
        "' . $_POST['email_contact'] . '",
        "' . $_POST['tel_contact'] . '",
        "' . $_POST['nom_contact'] . '",
        "' . $_POST['prenom_contact'] . '",
        "' . $_POST['sujet_contact'] . '",
        "' . $ticket . '",
        "' . $_POST['content_contact'] . '",
        "' . $attachemens . '"
    )');

    $attachemens_mail = ['url' => 'https://location-entre-particulier.fr/public/assets/documents/' . $attachemens, 'name' => $attachemens];

    // Envoi du mail
    $from = 'contact@location-entre-particulier.fr';
    $from_name = 'LEP - Location entre particulier';
    $to = $_POST['email_contact'];
    $to_name = ucfirst($_POST['prenom_contact']) . ' ' . ucfirst($_POST['nom_contact']);
    $reply       = "no-reply@location-entre-particulier.fr";
    $reply_name     = 'LEP - Location entre particulier';

    $sujet = 'Demande de contact LEP - Ticket n°' . $ticket .  '.';

    $content = 'Bonjour ' . $_POST['prenom_contact'] . ',<br/><br/>';

    $content .= 'Merci de nous avoir contacté.<br/><br/>';

    $content .= 'Notre équipe va examiner votre demande, nous nous engageons à vous répondre dans les 24/48h jours ouvrés maximum.<br/><br/>';

    $content .= 'Rappel de votre demande : <br/><br/>';

    $content .= 'Adresse email : ' . $_POST['email_contact'] . '<br/>';
    $content .= 'Téléphone : ' . $_POST['tel_contact'] . '<br/><br/>';

    $content .= 'Sujet : ' . $_POST['sujet_contact'] . '<br/><br/>';

    $content .= 'Votre demande :<br/>' . $_POST['content_contact'] . '<br/><br/>';

    $content .= 'Vous pouvez répondre à ce ticket directement, celà vous évitera de créer une demande de contact.<br/><br/>';

    $content .= 'Nous vous souhaitons une agréable expérience sur <a href="https://location-entre-particulier.fr">LEP</a>.<br/><br/>';

    $content .= '<img width="50" height="50" src="https://location-entre-particulier.fr/public/assets/images/favicon.png"><br/><br/>';

    $content .= 'A très bientôt.';

    sendMail($from, $from_name, $to, $to_name, $reply, $reply_name, $sujet, $content, $dbh, $attachemens_mail);

    sendMail($from, $from_name, 'contact@location-entre-particulier.fr', $to_name, $reply, $reply_name, $sujet, $content, $dbh, $attachemens_mail);

    $final = ['contact' => true, 'title' => 'Votre demande de contact !', 'message' => 'Merci de l\'intéret que vous porter pour LEP, notre équipe s\'enguage à vous répondre dans les plus brefs délais.<br><br><h4>À très bientôt.</h4>', 'icone' => $image_url . 'check.png'];
} else {
    // L'utilisateur a rencontré une erreur
    $final = ['contact' => false, 'title' => 'Une erreur est survenue !', 'message' => 'Un problème est survenue lors de l\'envoi de votre demande.<br><br>Vous avez la possibilité de nous contacter par email, nous vous répondrons sous 24/48 h.<br><br><h4>À très bientôt.</h4>', 'icone' => $image_url . 'error.png'];
}

echo json_encode($final);
