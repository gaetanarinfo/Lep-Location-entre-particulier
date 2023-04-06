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

$final = '';

if (isset($_POST)) {

    $email = $_POST['email_forgot_login'];
    $_SESSION['token'] = uniqid();

    $token = $_SESSION['token'];

    // Récupération des datas sans quot
    $req = $dbh->prepare('SELECT email, id, nom, prenom FROM users WHERE id_site = 1 AND email = :email');
    $req->execute(array('email' => $email));
    $donnees = $req->fetch();

    if (empty($donnees['email'])) {
        // L'utilisateur ne possède pas de compte
        $final = ['login' => false, 'title' => 'Problème de connexion !', 'message' => 'Aucun compte n\'a été trouvé avec vos identifiants, vous pouvez vous inscrire gratuitement en cliquant sur le bouton ci-dessous.', 'icone' => $image_url . 'error.png'];
    } else {

        // L'utilisateur possède un compte
        $final = ['login' => true, 'title' => 'Un email vous a été envoyé !', 'message' => 'Merci de patienter, quelques instants,<br/>vous allez recevoir un email pour réinitialiser votre mot de passe.', 'icone' => $image_url . 'check.png'];

        // Mise à jour du token
        $update = $dbh->query('UPDATE `users` SET `token` = "' . $token . '" WHERE email = "' . $donnees['email'] . '"');

        // Envoi du mail
        $from = 'contact@location-entre-particulier.fr';
        $from_name = 'LEP - Location entre particulier';
        $to = $donnees['email'];
        $to_name = ucfirst($donnees['prenom']) . ' ' . ucfirst($donnees['nom']);
        $reply       = "no-reply@location-entre-particulier.fr";
        $reply_name     = 'LEP - Location entre particulier';

        $sujet = 'Modification de votre mot de passe.';

        $content = 'Bonjour ' . $donnees['prenom'] . ',<br/><br/>';

        $content .= 'Vous avez demander une réinitialisation de mot de passe le ' . date('d/m/Y') . ' à ' . date('H:i') . ',<br/><br/>';

        $content .= 'Avec l\'adresse ip : ' . $_SERVER['REMOTE_ADDR'] . ',<br/><br/>';
 
        $content .= 'Si ce n\'est pas vous merci de nous prévenir à l\'adresse suivante <a href="mailto:contact@location-entre-particulier.fr">contact@location-entre-particulier.fr</a><br/><br/>';

        $content .= 'Pour modifier votre mot de passe <a href="https://location-entre-particulier.fr/forgot-password?token=' . $token . '">cliquez-ici</a><br/><br/>';

        $content .= 'Nous vous souhaitons une agréable expérience sur <a href="https://location-entre-particulier.fr">LEP</a>.<br/><br/>';

        $content .= '<img width="50" height="50" src="https://location-entre-particulier.fr/public/assets/images/favicon.png"><br/><br/>';

        $content .= 'A très bientôt.';

        sendMail($from, $from_name, $to, $to_name, $reply, $reply_name, $sujet, $content, $dbh, false);
    }
} else {
    // L'utilisateur a rencontré une erreur
    //$final = ['register' => false, 'message' => constant('MESSAGE_REGISTER_2'), 'back' => '<a role="button" class="back">' . constant('BACK') .  '</a>', 'icone' => '<i class="fa-solid fa-triangle-exclamation" style="font-size: 40px;"></i>'];
}

echo json_encode($final);
