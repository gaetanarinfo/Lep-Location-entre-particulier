<?php

// Affichage des erreurs  -->
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Importation des différents fichiers  -->
include_once('config/connexion.php');
include_once('config/fonctions.php');
include_once('config/public.php');

switch (basename($_SERVER['PHP_SELF'])) {

    case 'location.php':

        if (!empty($location_req)) {
            // On vérifie que l'annonce a été validée
            if ($location_req['verification'] == 0) {
                header('Location: /');
            }
        } else {
            header('Location: /');
        }

        break;

    case 'actualite.php':

        if (empty($actualite_url)) {
            header('Location: /');
        }

        break;

    case 'locations-populaires.php':

        if (empty($villes_france)) {
            header('Location: /');
        }

        break;

    case 'refund.php':

        if (empty($refund)) {
            header('Location: /');
        }

        break;

    case 'refund-pro.php':

        if (empty($refund)) {
            header('Location: /');
        }

        break;

    case 'location-statistiques.php':

        if (empty($location_user)) {
            header('Location: /mon-espace');
        }

        break;

    case 'modification-location.php':

        if (empty($location_user)) {
            header('Location: /mon-espace');
        }

        break;

    case 'creation-location.php':

        if (count($locations_user) >= 2 && $users['subscription'] == 0) {
            header('Location: /mon-espace');
        }

        break;

    default:
        # code...
        break;
}
