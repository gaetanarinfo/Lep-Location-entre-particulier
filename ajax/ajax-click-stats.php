<?php

// Affichage des erreurs  -->
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Importation des différents fichiers  -->
include_once('../config/connexion.php');
include_once('../config/fonctions.php');
include_once('../config/public.php');

if (isset($_POST)) {
    if ($_POST['type'] == "mail") {
        $update = $dbh->query('UPDATE `locations` SET `mail_views` = `mail_views` + 1 WHERE id = "' . $_POST['location_id'] . '"');
    } else if ($_POST['type'] == "tel") {
        $update = $dbh->query('UPDATE `locations` SET `tel_views` = `tel_views` + 1 WHERE id = "' . $_POST['location_id'] . '"');
    }
}
