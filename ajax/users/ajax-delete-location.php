<?php

// Affichage des erreurs  -->
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Importation des différents fichiers  -->
include_once('../../config/connexion.php');
include_once('../../config/fonctions.php');
include_once('../../config/public.php');

date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fra_fra');

$final = '';

$location_req_user = $dbh->prepare('SELECT * FROM locations WHERE user_id = "' . $_SESSION['user_id'] . '" AND id = "' . $_POST['location_id'] . '" ORDER BY created_at DESC');
$location_req_user->execute();
$location_user = $location_req_user->fetch();

if (!empty($_POST) && isset($_SESSION['user_id']) && !empty($location_user)) {

    $delete = $dbh->prepare('DELETE FROM locations WHERE id = "' . $_POST['location_id'] . '"');
    $delete->execute();

}
