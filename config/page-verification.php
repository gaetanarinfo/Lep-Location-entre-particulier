<?php

// Affichage des erreurs  -->
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Importation des différents fichiers  -->
include_once('config/connexion.php');
include_once('config/fonctions.php');
include_once('config/public.php');

switch (basename($_SERVER['PHP_SELF'])) {

    case 'annonces.php':

        if (!empty($appartement_url) && empty($maison_url)) {
        } else {
            if (empty($appartement_url) && !empty($maison_url)) {
            } else {
                header('Location: /');
            }
        }

        break;

    case 'actualite.php':

        if (empty($actualite_url)) {
            header('Location: /');
        }

        break;

    default:
        # code...
        break;
}
