<?php

// Démarrage de la session  -->
session_start();

// Heure et Date Française
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fra_fra');

// Affichage des erreurs  -->
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Importation des différents fichiers  -->
include_once('config/connexion.php');
include_once('config/fonctions.php');
include_once('config/public.php');

?>