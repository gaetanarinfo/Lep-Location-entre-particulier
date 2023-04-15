<?php

// Affichage des erreurs  -->
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Importation des différents fichiers  -->
include_once('../../config/connexion.php');
include_once('../../config/fonctions.php');
include_once('../../config/public.php');

if (isset($_POST)) {

    // Récupération des datas sans quot
    $req = $dbh->prepare('SELECT * FROM locations WHERE id_site = 1 AND user_id = "' . $_SESSION['user_id'] . '"');
    $req->execute();
    $location = $req->fetch();

    if (!empty($location)) {

        switch ($_POST['image']) {

            case '1':
                $update = $dbh->query('UPDATE `locations` SET `image` = "appartement_vide.jpg" WHERE id = "' . $location['id'] . '"');
                break;

            case '2':
                $update = $dbh->query('UPDATE `locations` SET `image_2` = "" WHERE id = "' . $location['id'] . '"');
                break;

            case '3':
                $update = $dbh->query('UPDATE `locations` SET `image_3` = "" WHERE id = "' . $location['id'] . '"');
                break;

            case '4':
                $update = $dbh->query('UPDATE `locations` SET `image_4` = "" WHERE id = "' . $location['id'] . '"');
                break;

        }
    }
}
