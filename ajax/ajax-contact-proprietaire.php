<?php

// Affichage des erreurs  -->
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Importation des différents fichiers  -->
include_once('../config/connexion.php');
include_once('../config/fonctions.php');
include_once('../config/public.php');

$final = '';

if (isset($_POST)) {

    $email_contact = $_POST['email_contact'];
    $location_id = ($_POST['location_id']);
    $location_type = ($_POST['location_type']);

    // Récupération des datas sans quot
    $req = $dbh->prepare('SELECT * FROM contact_location WHERE id_site = 1 AND email = :email AND id_location = :id_location AND type_location = :type_location');
    $req->execute(['email' => $email_contact, 'id_location' => $location_id, 'type_location' => $location_type]);
    $donnees = $req->fetch();

    if (empty($donnees)) {

        $insert = $dbh->prepare('INSERT INTO `contact_location` (
            `id_site`,
            `type_location`,
            `id_location`,
            `email`
        ) VALUES (
            1,
            :location_type,
            :location_id,
            :email
        )');

        $insert->bindValue(':location_type',$location_type,PDO::PARAM_STR);
        $insert->bindValue(':location_id',$location_id,PDO::PARAM_STR);
        $insert->bindValue(':email', $email_contact, PDO::PARAM_STR);
        $insert->execute();

        $final = ['create' => true];
    } else {
        $final = ['create' => false];
    }

    echo json_encode($final);
}
