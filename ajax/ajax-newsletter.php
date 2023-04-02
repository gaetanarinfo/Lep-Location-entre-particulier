<?php

// Affichage des erreurs  -->
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Importation des différents fichiers  -->
include_once('../config/connexion.php');
include_once('../config/fonctions.php');

if (!empty($_POST) && !empty($_POST['email'])) {

    // Récupération des datas sans quot
    $req = $dbh->prepare('SELECT email FROM newsletter WHERE id_site = 1 AND email = :email');
    $req->execute(array('email' => $_POST['email']));
    $donnees = $req->fetch();

    if (empty($donnees['email'])) {

        $insert = $dbh->query('INSERT INTO `newsletter`(
        `id_site`,
        `email`) VALUES (
        1,    
        "' . trim($_POST['email']) . '")
        ');

        $final = ['success' => true, 'title' => 'Inscription à notre newsletter réussi !', 'message' => 'Merci de vous avoir inscrit à notre newsletter, vous recevrez prochainement toutes les nouveautés de ' . $site_config['title'] . '.', 'icone' => '<i class="fa-solid fa-circle-check" style="font-size: 1.5rem;"></i>'];
    } else {
        $final = ['success' => false, 'title' => 'Une erreur est survenue !', 'message' => 'Vous êtes déjà inscrit à notre newsletter.', 'icone' => '<i class="fa-solid fa-circle-check" style="font-size: 1.5rem;"></i>'];
    }
} else {
    $final = ['success' => false, 'title' => 'Une erreur est survenue !', 'message' => 'Nous sommes désolés, mais votre inscription n\'a pas pu être validée, merci de recommencer votre inscription.', 'icone' => '<i class="fa-solid fa-circle-check" style="font-size: 1.5rem;"></i>'];
}

echo json_encode($final);
