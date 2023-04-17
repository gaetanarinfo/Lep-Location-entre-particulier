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

    case 'location.php':

        if (basename($_SERVER['PHP_SELF']) == 'location.php' && !empty($location_req)) {
            $title = $location_req['pieces'] . ' pièces ' . $location_req['title_type'] . ' de ' . $location_req['surface'] . ' m² à ' . $location_req['location'];
            $description = substr($location_req['description'], 0, 155);
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

    case 'locations.php':
        $title = $site_config['meta_title'] . ' - Maisons ou appartement en location en France';
        $description = $site_config['meta_description'];
        break;

    case 'locations-appartements.php':
        $title = $site_config['meta_title'] . ' - Appartements en location en France';
        $description = $site_config['meta_description'];
        break;

    case 'locations-maisons.php':
        $title = $site_config['meta_title'] . ' - Maisons en location en France';
        $description = $site_config['meta_description'];
        break;

    case 'locations-populaires.php':

        if (basename($_SERVER['PHP_SELF']) == 'locations-populaires.php') {
            $title = 'Trouvez un logement dans la ville populaire de ' . $villes_france['ville_nom_reel'];
            $description = $site_config['meta_description'];
        }

        break;

    case 'contact.php':
        $title = $site_config['meta_title'] . ' - Contactez-nous';
        $description = $site_config['meta_description'];
        break;

    case 'faq.php':
        $title = $site_config['meta_title'] . ' - Foire aux questions (FAQ)';
        $description = 'Besoin d&#39;aide pour créer un compte, ou autre ? C&#39;est ici que ça se passe !';
        break;

    case 'mon-espace.php':
        $title = $site_config['meta_title'] . ' - Mon espace';
        $description = $site_config['meta_description'];
        break;

    case 'mes-locations.php':
        $title = $site_config['meta_title'] . ' - Toutes mes locations';
        $description = $site_config['meta_description'];
        break;

    case 'abonnements.php':
        $title = $site_config['meta_title'] . ' - Tous mes abonnements';
        $description = $site_config['meta_description'];
        break;

    case 'cart.php':
        $title = $site_config['meta_title'] . ' - Mon panier';
        $description = $site_config['meta_description'];
        break;

    case 'location-statistiques.php':
        $title = 'Statistiques de ' . $location_user['title'];
        $description = substr($location_user['description'], 0, 155);
        break;

    case 'modification-location.php':
        $title = 'Modification de ' . $location_user['title'];
        $description = substr($location_user['description'], 0, 155);
        break;

    case 'creation-location.php':
        $title = 'Création d\'une location';
        $description = $site_config['meta_description'];
        break;

    case 'coordonees.php':
        $title = 'Mes informations personnelles';
        $description = $site_config['meta_description'];
        break;

    default:
        $title = $site_config['meta_title'];
        $description = $site_config['meta_description'];
        break;
}
