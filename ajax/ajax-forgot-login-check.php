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

    $token = $_SESSION['token'];

    // Récupération des datas sans quot
    $req = $dbh->prepare('SELECT token, email, password FROM users WHERE id_site = 1 AND token = :token');
    $req->execute(array('token' => $token));
    $donnees = $req->fetch();

    if (empty($donnees['token'])) {
        // L'utilisateur ne possède pas de compte
        $final = ['login' => false, 'title' => 'Problème de token !', 'message' => 'Aucun token de mot de passe lié avec vos identifiants, vous pouvez vous en générer un en cliquant sur le bouton ci-dessous.', 'icone' => $image_url . 'error.png'];
    } else {

        // L'utilisateur possède un compte
        $final = ['login' => true, 'title' => 'Mot de passe modifié !', 'message' => 'Votre mot de passe a été modifié avec succès. Vous pouvez maintenant accéder à votre compte.<br><br>Vous allez être redirigé dans quelques instants.', 'icone' => $image_url . 'check.png'];

        $options = [
            'cost' => 12,
        ];

        $password = password_hash($_POST['password_forgot_check'], PASSWORD_BCRYPT, $options);

        // Mise à jour du token
        $update = $dbh->query('UPDATE `users` SET `token` = "", `password` = "' . $password . '" WHERE email = "' . $donnees['email'] . '"');

    }
} else {
    // L'utilisateur a rencontré une erreur
    //$final = ['register' => false, 'message' => constant('MESSAGE_REGISTER_2'), 'back' => '<a role="button" class="back">' . constant('BACK') .  '</a>', 'icone' => '<i class="fa-solid fa-triangle-exclamation" style="font-size: 40px;"></i>'];
}

echo json_encode($final);
