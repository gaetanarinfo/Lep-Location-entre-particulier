<?php

switch (basename($_SERVER['PHP_SELF'])) {
    case 'login.php':
        $title = $site_config['meta_title'] . ' - Connexion';
        $description = $site_config['meta_description'];
        break;

    case 'register.php':
        $title = $site_config['meta_title'] . ' - Ajouter une annonce';
        $description = $site_config['meta_description'];
        break;

    case 'annonces.php':

        if (basename($_SERVER['PHP_SELF']) == 'annonces.php' && !empty($appartement_url) && empty($maison_url)) {
            $title = $appartement['pieces'] . ' pièces ' . $appartement['title_type'] . ' de ' . $appartement['surface'] . ' m² à ' . $appartement['location'];
            $description = substr($appartement['description'], 0, 155);
            break;
        }

        if (basename($_SERVER['PHP_SELF']) == 'annonces.php' && empty($appartement_url) && !empty($maison_url)) {
            $title = $maison['pieces'] . ' pièces ' . $maison['title_type'] . ' de ' . $maison['surface'] . ' m² à ' . $maison['location'];
            $description = substr($maison['description'], 0, 155);
            break;
        }

    case 'cgv.php':
        $title = $site_config['meta_title'] . ' - Conditions générales de vente';
        $description = $site_config['meta_description'];
        break;

    case 'cgu.php':
        $title = $site_config['meta_title'] . ' - Conditions générales d\'utilisation';
        $description = $site_config['meta_description'];
        break;

    case 'blog.php':
        $title = $site_config['meta_title'] . ' - Blog';
        $description = $site_config['meta_description'];
        break;

    case 'actualite.php':

        if (basename($_SERVER['PHP_SELF']) == 'actualite.php' && !empty($actualite_url)) {
            $title = $actualite['title'];
            $description = substr($actualite['small_description'], 0, 155);
        }

        break;

    default:
        $title = $site_config['meta_title'];
        $description = $site_config['meta_description'];
        break;
}
