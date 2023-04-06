<?php

// Affichage des erreurs  -->
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Importation des différents fichiers  -->
include_once('config/connexion.php');
include_once('config/fonctions.php');
include_once('config/public.php');

unset($_SESSION['user_id']);
session_destroy();

header('Location: /');