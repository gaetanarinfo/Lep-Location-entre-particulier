<?php

// Affichage des erreurs  -->
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Importation des différents fichiers  -->
include_once('../config/connexion.php');
include_once('../config/fonctions.php');
include_once('../config/public.php');

date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fra_fra');

$final = '';

if (!empty($_POST)) {

    $ip = $_SERVER['REMOTE_ADDR'];
    $note = $_POST['note'];
    $blog_id = $_POST['blog_id'];

    // Récupération des datas sans quot
    $req = $dbh->prepare('SELECT * FROM blog_avis WHERE id_site = 1 AND ip = :ip AND blog_id = :blog_id');
    $req->execute(['ip' => $ip, 'blog_id' => $blog_id]);
    $donnees = $req->fetch();

    if (empty($donnees)) {
        $create_note = $dbh->query('INSERT INTO `blog_avis` (blog_id, ip, note) VALUES ("' . $blog_id . '", "' . $ip . '", "' . $note . '")');
        $final = ['note' => true, 'message' => '<b>Merci pour votre note !</b>', 'icone' => '<i class="fa-solid fa-circle-check me-1 text-success></i>'];
    } else {
        $final = ['note' => false, 'message' => '<b>Vous avez déjà noté cet article !</b>', 'icone' => '<i class="fa-solid fa-triangle-exclamation me-1 text-danger"></i>'];
    }
} else {
    $final = ['note' => false, 'message' => '<b>Vous avez déjà noté cet article !</b>', 'icone' => '<i class="fa-solid fa-triangle-exclamation me-1 text-danger"></i>'];
}

echo json_encode($final);
