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

    $email = $_POST['email_login'];
    $password = $_POST['password_login'];

    // Récupération des datas sans quot
    $req = $dbh->prepare('SELECT email, password, id FROM users WHERE id_site = 1 AND email = :email');
    $req->execute(array('email' => $email));
    $donnees = $req->fetch();

    if (empty($donnees['email'])) {
        // L'utilisateur ne possède pas de compte
        $final = ['login' => false, 'title' => 'Problème de connexion !', 'message' => 'Aucun compte n\'a été trouvé avec vos identifiants, vous pouvez vous inscrire gratuitement en cliquant sur le bouton ci-dessous.', 'icone' => $image_url . 'error.png'];
    } else {

        $options = [
            'cost' => 12,
        ];

        if (password_verify($password, $donnees['password'])) {
            // L'utilisateur possède un compte
            $final = ['login' => true, 'title' => 'Connexion réussi !', 'message' => 'Merci de patienter, vous allez être redirigé dans quelques instants.', 'icone' => $image_url . 'check.png'];

            $update = $dbh->query('UPDATE `users` SET `last_online` = "' . date('Y-m-d H:i:s') . '", `ip` = "' . $_SERVER['REMOTE_ADDR'] . '" WHERE email = "' . $email . '"');

            $_SESSION['user_id'] = $donnees['id'];
        } else {
            // L'utilisateur ne possède pas de compte
            $final = ['login' => false, 'title' => 'Problème de connexion !', 'message' => 'Aucun compte n\'a été trouvé avec vos identifiants, vous pouvez vous inscrire gratuitement en cliquant sur le bouton ci-dessous.', 'icone' => $image_url . 'error.png'];
        }
    }
} else {
    // L'utilisateur a rencontré une erreur
}

echo json_encode($final);
