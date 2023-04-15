<?php

// Affichage des erreurs  -->
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Importation des différents fichiers  -->
include_once('../../config/connexion.php');
include_once('../../config/fonctions.php');
include_once('../../config/public.php');

$final = '';

if (count($locations_user) >= 2 && $users['subscription'] == 0) {
    $final = ['create' => false, 'title' => 'Votre location n\'a pas été publié !', 'message' => 'Une erreur est survenue pendant la création de votre location.<br><br>Vous avez la possibilité de nous contacter si vous ne parvenez pas à créer une location.<br><br><h4>À très bientôt.</h4>', 'icone' => $image_url . 'error.png'];
} else {

    if (isset($_POST)) {

        // Récupération des datas sans quot
        $req = $dbh->prepare('SELECT email FROM users WHERE id_site = 1 AND id = "' . $_SESSION['user_id'] . '"');
        $req->execute();
        $donnees = $req->fetch();

        if (!empty($donnees)) {

            // Insertion des différentes images //

            $attachement = [];
            $attachements = [];

            $attachement2 = [];
            $attachements2 = [];

            $attachement3 = [];
            $attachements3 = [];

            $attachement4 = [];
            $attachements4 = [];

            // File images //
            if (!empty($_FILES['file_0'])) {

                $message = '';
                $extension = [];
                $success = true;
                $valid_extensions = array('png', 'jpg', 'jpeg', 'webp');
                $fichier = $_FILES;
                $file_name;

                $img = $fichier['file_0']['name'];
                $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

                // Upload
                if (!in_array($ext, $valid_extensions)) {
                    array_push($extension, $ext);
                } else {
                    $file_name = 'image_1_' . time() . '.' . $ext;
                    array_push($attachement, $_SERVER['DOCUMENT_ROOT'] . '/public/assets/images/annonces/' . $file_name);
                    array_push($attachements, 'assets/images/annonces/' . $file_name);
                    move_uploaded_file($fichier['file_0']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/public/assets/images/annonces/' . $file_name);
                }

                if (!empty($extension)) {
                    if (count($extension) > 1) {
                        $message = 'Les extensions suivantes : ' . implode(', ', $extension) . ' ne sont pas prise en charge';
                        $message = 'L\'extension suivante : ' . implode('', $extension) . ' n\'est pas prise en charge';
                    }
                } else {
                    $message = 'Votre fichiers a bien été uploadé.';
                }
            }

            // File images //
            if (!empty($_FILES['file_20'])) {

                $message = '';
                $extension = [];
                $success = true;
                $valid_extensions = array('png', 'jpg', 'jpeg', 'webp');
                $fichier = $_FILES;
                $file_name;

                $img = $fichier['file_20']['name'];
                $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

                // Upload
                if (!in_array($ext, $valid_extensions)) {

                    array_push($extension, $ext);
                } else {
                    $file_name = $fichier['file_20']['name'];
                    $file_name = 'image_2_' . time() . '.' . $ext;
                    array_push($attachement2, $_SERVER['DOCUMENT_ROOT'] . '/public/assets/images/annonces/' . $file_name);
                    array_push($attachements2, 'assets/images/annonces/' . $file_name);

                    move_uploaded_file($fichier['file_20']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/public/assets/images/annonces/' . $file_name);
                }

                if (!empty($extension)) {

                    if (count($extension) > 1) {

                        $message = 'Les extensions suivantes : ' . implode(', ', $extension) . ' ne sont pas prise en charge';
                    } else {

                        $message = 'L\'extension suivante : ' . implode('', $extension) . ' n\'est pas prise en charge';
                    }
                } else {
                    $message = 'Votre fichiers a bien été uploadé.';
                }
            }

            // File images //
            if (!empty($_FILES['file_30'])) {

                $message = '';
                $extension = [];
                $success = true;
                $valid_extensions = array('png', 'jpg', 'jpeg', 'webp');
                $fichier = $_FILES;
                $file_name;

                $img = $fichier['file_30']['name'];
                $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

                // Upload
                if (!in_array($ext, $valid_extensions)) {

                    array_push($extension, $ext);
                } else {

                    $file_name = $fichier['file_30']['name'];
                    $file_name = 'image_3_' . time() . '.' . $ext;
                    array_push($attachement3, $_SERVER['DOCUMENT_ROOT'] . '/public/assets/images/annonces/' . $file_name);
                    array_push($attachements3, 'assets/images/annonces/' . $file_name);

                    move_uploaded_file($fichier['file_30']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/public/assets/images/annonces/' . $file_name);
                }

                if (!empty($extension)) {

                    if (count($extension) > 1) {

                        $message = 'Les extensions suivantes : ' . implode(', ', $extension) . ' ne sont pas prise en charge';
                    } else {

                        $message = 'L\'extension suivante : ' . implode('', $extension) . ' n\'est pas prise en charge';
                    }
                } else {
                    $message = 'Votre fichiers a bien été uploadé.';
                }
            }

            // File images //
            if (!empty($_FILES['file_40'])) {

                $message = '';
                $extension = [];
                $success = true;
                $valid_extensions = array('png', 'jpg', 'jpeg', 'webp');
                $fichier = $_FILES;
                $file_name;

                $img = $fichier['file_40']['name'];
                $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

                // Upload
                if (!in_array($ext, $valid_extensions)) {

                    array_push($extension, $ext);
                } else {

                    $file_name = $fichier['file_40']['name'];
                    $file_name = 'image_4_' . time() . '.' . $ext;
                    array_push($attachement4, $_SERVER['DOCUMENT_ROOT'] . '/public/assets/images/annonces/' . $file_name);
                    array_push($attachements4, 'assets/images/annonces/' . $file_name);

                    move_uploaded_file($fichier['file_40']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/public/assets/images/annonces/' . $file_name);
                }

                if (!empty($extension)) {

                    if (count($extension) > 1) {

                        $message = 'Les extensions suivantes : ' . implode(', ', $extension) . ' ne sont pas prise en charge';
                    } else {

                        $message = 'L\'extension suivante : ' . implode('', $extension) . ' n\'est pas prise en charge';
                    }
                } else {
                    $message = 'Votre fichiers a bien été uploadé.';
                }
            }

            // ------------------------------ //

            if ($_POST['meuble'] == "false") $meuble = 0;
            else $meuble = 1;

            if ($_POST['animeaux_acceptes'] == "false") $animeaux_acceptes = 0;
            else $animeaux_acceptes = 1;

            if ($_POST['sous_location'] == "false") $sous_location = 0;
            else $sous_location = 1;

            if (!empty($attachement)) $image1 = str_replace('/var/www/lpe/public/assets/images/annonces/', '', $attachement[0]);

            if (empty($image1)) {
                $image1 = "appartement_vide.jpg";
            }

            if (!empty($attachement2)) $image2 = str_replace('/var/www/lpe/public/assets/images/annonces/', '', $attachement2[0]);
            else $image2 = "";
            if (!empty($attachement3)) $image3 = str_replace('/var/www/lpe/public/assets/images/annonces/', '', $attachement3[0]);
            else $image3 = "";
            if (!empty($attachement4)) $image4 = str_replace('/var/www/lpe/public/assets/images/annonces/', '', $attachement4[0]);
            else $image4 = "";

            $user_last_id = $_SESSION['user_id'];

            // Update de l'utilisateur
            $update = $dbh->query('UPDATE `users` SET 
                `email_contact` = "' . $_POST['email_contact'] . '",
                `civilite` = "' . $_POST['genre'] . '",
                `nom` = "' . $_POST['nom_contact'] . '",
                `prenom` = "' . $_POST['prenom_contact'] . '",
                `tel` = "' . $_POST['tel_contact'] . '",
                `updated_at` = "' . date('Y-m-d h:i:s') . '"
            WHERE id = "' . $_SESSION['user_id'] . '"');

            // Pour les maisons uniquement
            if ($_POST['type_propriete'] == "7") {

                $req_id2 = $dbh->query('SELECT id FROM locations WHERE id_site = 1 AND type >= 7 ORDER BY id DESC');
                $last_id2 = $req_id2->fetch(PDO::FETCH_ASSOC);

                if (empty($last_id2)) $last_id2 = 1;
                else $last_id2 = ($last_id2['id']) + 1;

                $url_maison = makeUrl('Maison ' . $_POST['location'] . ' ' . $last_id2);
                $url_valide = $url_maison;

                // Création de l'annonce //
                $insert_annonce = $dbh->query('INSERT INTO `locations` (
                    `user_id`,
                    `id_site`,
                    `title`,
                    `description`,
                    `url`,
                    `location`,
                    `region`,
                    `rue`,
                    `code_postal`,
                    `surface`,
                    `pieces`,
                    `chambres`,
                    `type`,
                    `prix`,
                    `image`,
                    `image_2`,
                    `image_3`,
                    `image_4`,
                    `disponible`,
                    `disponibilite`,
                    `duree`,
                    `garantie`,
                    `frais`,
                    `meuble`,
                    `animeaux_acceptes`,
                    `sous_location`
                ) VALUES (
                    ' . $user_last_id . ',
                    1,
                    "' . $_POST['title_annonce'] . '",
                    "' . $_POST['content_annonce'] . '",
                    "' . $url_maison . '",
                    "' . $_POST['location'] . '",
                    "' . $_POST['region'] . '",
                    "' . $_POST['address'] . '",
                    "' . $_POST['cp'] . '",
                    "' . $_POST['surface'] . '",
                    "' . $_POST['pieces'] . '",
                    "' . $_POST['chambre'] . '",
                    "' . $_POST['type_propriete'] . '",
                    "' . $_POST['loyer'] . '",
                    "' . $image1 . '",
                    "' . $image2 . '",
                    "' . $image3 . '",
                    "' . $image4 . '",
                    "' . $_POST['disponible'] . '",
                    "' . $_POST['disponibilite'] . '",
                    "' . $_POST['duree_location'] . '",
                    "' . $_POST['garantie'] . '",
                    "' . $_POST['frais_supp'] . '",
                    "' . $meuble . '",
                    "' . $animeaux_acceptes . '",
                    "' . $sous_location  . '"
                )');
            } else {

                $req_id = $dbh->query('SELECT id FROM locations WHERE id_site = 1 AND type <= 6 ORDER BY id DESC');
                $last_id = $req_id->fetch(PDO::FETCH_ASSOC);

                if (empty($last_id)) $last_id = 1;
                else $last_id = ($last_id['id']) + 1;

                $url_appartement = makeUrl('Appartement ' . $_POST['location'] . ' ' . $last_id);

                $url_valide = $url_appartement;

                // Création de l'annonce //
                $insert_annonce = $dbh->query('INSERT INTO `locations` (
                    `user_id`,
                    `id_site`,
                    `title`,
                    `description`,
                    `url`,
                    `location`,
                    `region`,
                    `rue`,
                    `code_postal`,
                    `surface`,
                    `pieces`,
                    `chambres`,
                    `type`,
                    `prix`,
                    `image`,
                    `image_2`,
                    `image_3`,
                    `image_4`,
                    `disponible`,
                    `duree`,
                    `garantie`,
                    `frais`,
                    `meuble`,
                    `animeaux_acceptes`,
                    `sous_location`
                ) VALUES (
                    ' . $user_last_id . ',
                    1,
                    "' . $_POST['title_annonce'] . '",
                    "' . $_POST['content_annonce'] . '",
                    "' . $url_appartement . '",
                    "' . $_POST['location'] . '",
                    "' . $_POST['region'] . '",
                    "' . $_POST['address'] . '",
                    "' . $_POST['cp'] . '",
                    "' . $_POST['surface'] . '",
                    "' . $_POST['pieces'] . '",
                    "' . $_POST['chambre'] . '",
                    "' . $_POST['type_propriete'] . '",
                    "' . $_POST['loyer'] . '",
                    "' . $image1 . '",
                    "' . $image2 . '",
                    "' . $image3 . '",
                    "' . $image4 . '",
                    "' . $_POST['disponible'] . '",
                    "' . $_POST['duree_location'] . '",
                    "' . $_POST['garantie'] . '",
                    "' . $_POST['frais_supp'] . '",
                    "' . $meuble . '",
                    "' . $animeaux_acceptes . '",
                    "' . $sous_location  . '"
            )');
            }

            // ---------------------------- //

            // L'utilisateur ne possède pas de compte
            $final = ['create' => true, 'title' => 'Votre location a bien été créée !', 'message' => 'Merci de patienter le temps que notre équipe analyse votre location, celà peut prendre entre 24/48h jour ouvrée, merci de votre confiance.<br><br><h4>À très bientôt.</h4>', 'icone' => $image_url . 'check.png'];
        } else {
            // L'utilisateur possède un compte
            $final = ['create' => false, 'title' => 'Votre location n\'a pas été publié !', 'message' => 'Vous possédez déjà un compte, merci de vous connecter avec vos identifiants. Vous pouvez aussi réinitialiser votre mot de passe, si vous avez perdu votre mot de passe.<br><br>Vous avez la possibilité de nous contacter si vous ne retrouvez pas vos identifiant de connexion.<br><br><h4>À très bientôt.</h4>', 'icone' => $image_url . 'error.png'];
        }
    } else {
        // L'utilisateur a rencontré une erreur
        $final = ['create' => false, 'title' => 'Votre location n\'a pas été publié !', 'message' => 'Vous possédez déjà un compte, merci de vous connecter avec vos identifiants. Vous pouvez aussi réinitialiser votre mot de passe, si vous avez perdu votre mot de passe.<br><br>Vous avez la possibilité de nous contacter si vous ne retrouvez pas vos identifiant de connexion.<br><br><h4>À très bientôt.</h4>', 'icone' => $image_url . 'error.png'];
    }
}

echo json_encode($final);
