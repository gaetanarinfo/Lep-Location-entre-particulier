<?php

switch (basename($_SERVER['PHP_SELF'])) {
    case 'login.php':
        $title = $site_config['meta_title'] . ' - Connexion';
        break;

    case 'register.php':
        $title = $site_config['meta_title'] . ' - Ajouter une annonce';
        break;

    default:
        $title = $site_config['meta_title'];
        break;
}
