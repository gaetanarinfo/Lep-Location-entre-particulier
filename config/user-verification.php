<?php

// Affichage des erreurs  -->
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Importation des différents fichiers  -->
include_once('config/connexion.php');
include_once('config/fonctions.php');
include_once('config/public.php');

switch (basename($_SERVER['PHP_SELF'])) {

    case 'register.php':

        if (!empty($_SESSION['user_id'])) {
            header('Location: /mon-espace');
        }

        break;

    case 'login.php':

        if (!empty($_SESSION['user_id'])) {
            header('Location: /mon-espace');
        }

        break;

    case 'espace.php':

        if (empty($_SESSION['user_id'])) {
            header('Location: /login');
        }

        break;

    case 'cart.php':

        if (empty($_SESSION['user_id'])) {
            header('Location: /login');
        }

        if ($users['subscription'] == 1) {
            header('Location: /mon-espace');
        }

        break;

    case 'forgot-password.php':

        $req_user = $dbh->prepare('SELECT token FROM users WHERE token = :token');
        $req_user->execute(array('token' => $_GET['token']));
        $users_not_login = $req_user->fetch();

        if (isset($_SESSION['user_id'])) {
            header('Location: /');
        } else if (!isset($_SESSION['token'])) {
            header('Location: /');
        } else if (!isset($_GET['token'])) {
            header('Location: /');
        } else if (isset($_GET['token']) && $_GET['token'] != $users_not_login['token']) {
            header('Location: /');
        }

        break;
}
