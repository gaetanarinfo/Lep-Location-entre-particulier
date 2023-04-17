<?php

// Affichage des erreurs  -->
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Importation des différents fichiers  -->
include_once('../../config/connexion.php');
include_once('../../config/fonctions.php');
include_once('../../config/public.php');

$final = '';

if (isset($_POST)) {

    // Récupération des datas sans quot
    $req = $dbh->prepare('SELECT * FROM users WHERE id_site = 1 AND id = "' . $_SESSION['user_id'] . '"');
    $req->execute();
    $user = $req->fetch();

    if (!empty($user)) {

        // Update de l'utilisateur
        $update = $dbh->query('UPDATE `users` SET 
            `email` = "' . $_POST['email'] . '",
            `civilite` = "' . $_POST['genre'] . '",
            `nom` = "' . $_POST['nom'] . '",
            `prenom` = "' . $_POST['prenom'] . '",
            `tel` = "' . $_POST['tel'] . '",
            `cp` = "' . $_POST['cp'] . '",
            `pays` = "' . $_POST['pays'] . '",
            `ville` = "' . $_POST['ville'] . '",
            `adresse` = "' . $_POST['adresse'] . '",
            `updated_at` = "' . date('Y-m-d h:i:s') . '"
        WHERE id = "' . $_SESSION['user_id'] . '"');

        $final = ['update' => true, 'title' => 'Votre profil a été modifiée !', 'message' => 'Les modifications apportées à votre profil on été modifier<br><br>Merci de vérifier l\'éxactitude de vos informations.<br><br><h4>À très bientôt.</h4>', 'icone' => $image_url . 'check.png'];
    } else {
        // L'utilisateur a rencontré une erreur
        $final = ['update' => false, 'title' => 'Votre profil n\'a pas été modifié !', 'message' => 'Une erreur est survenue lors de la modification de votre profil.<br><br>Vous avez la possibilité de recommencer de nouveau.<br><br><h4>À très bientôt.</h4>', 'icone' => $image_url . 'error.png'];
    }
}

echo json_encode($final);
