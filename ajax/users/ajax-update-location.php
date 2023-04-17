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
    $req = $dbh->prepare('SELECT * FROM locations WHERE id_site = 1 AND user_id = "' . $_SESSION['user_id'] . '"');
    $req->execute();
    $location = $req->fetch();

    if (!empty($location)) {

        if ($_POST['meuble'] == "false") $meuble = 0;
        else $meuble = 1;

        if ($_POST['animeaux_acceptes'] == "false") $animeaux_acceptes = 0;
        else $animeaux_acceptes = 1;

        if ($_POST['sous_location'] == "false") $sous_location = 0;
        else $sous_location = 1;

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
                } else {
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

        if (!empty($attachement)) $image1 = str_replace('/var/www/lpe/public/assets/images/annonces/', '', $attachement[0]);

        if (empty($image1)) {
            $image1 = $location['image'];
        }

        if (!empty($attachement2)) $image2 = str_replace('/var/www/lpe/public/assets/images/annonces/', '', $attachement2[0]);
        else $image2 = $location['image_2'];
        if (!empty($attachement3)) $image3 = str_replace('/var/www/lpe/public/assets/images/annonces/', '', $attachement3[0]);
        else $image3 = $location['image_3'];
        if (!empty($attachement4)) $image4 = str_replace('/var/www/lpe/public/assets/images/annonces/', '', $attachement4[0]);
        else $image4 = $location['image_4'];

        // Update de l'utilisateur
        $update = $dbh->query('UPDATE `users` SET 
            `email_contact` = "' . $_POST['email_contact'] . '",
            `civilite` = "' . $_POST['genre'] . '",
            `nom` = "' . $_POST['nom_contact'] . '",
            `prenom` = "' . $_POST['prenom_contact'] . '",
            `tel` = "' . $_POST['tel_contact'] . '",
            `updated_at` = "' . date('Y-m-d h:i:s') . '"
        WHERE id = "' . $_SESSION['user_id'] . '"');

        if ($_POST['type_propriete'] == "7") {

            $url_maison = makeUrl('Maison ' . $_POST['location'] . ' ' . $location['id']);
            $url_valide = $url_maison;

            // Mise à jour de l'annonce
            $update = $dbh->query('UPDATE `locations` SET 
                `title` = "' . $_POST['title_annonce'] . '",
                `description` = "' . $_POST['content_annonce'] . '",
                `url` = "' . $url_maison . '",
                `location` = "' . $_POST['location'] . '",
                `region` = "' . $_POST['region'] . '",
                `rue` = "' . $_POST['address'] . '",
                `code_postal` = "' . $_POST['cp'] . '",
                `surface` = "' . $_POST['surface'] . '",
                `pieces` = "' . $_POST['pieces'] . '",
                `chambres` = "' . $_POST['chambre'] . '",
                `type` = "' . $_POST['type_propriete'] . '",
                `prix` = "' . $_POST['loyer'] . '",
                `image` = "' . $image1 . '",
                `image_2` = "' . $image2 . '",
                `image_3` = "' . $image3 . '",
                `image_4` = "' . $image4 . '",
                `disponible` = "' . $_POST['disponible'] . '",
                `disponibilite` = "' . $_POST['disponibilite'] . '",
                `duree` = "' . $_POST['duree_location'] . '",
                `garantie` = "' . $_POST['garantie'] . '",
                `frais` = "' . $_POST['frais_supp'] . '",
                `meuble` = "' . $meuble . '",
                `animeaux_acceptes` = "' . $animeaux_acceptes . '",
                `sous_location` = "' . $sous_location . '",
                `updated_at` = "' . date('Y-m-d h:i:s') . '"
            WHERE id = "' . $location['id'] . '"');
        } else {

            $url_appartement = makeUrl('Appartement ' . $_POST['location'] . ' ' . $location['id']);
            $url_valide = $url_appartement;

            // Mise à jour de l'annonce
            $update = $dbh->query('UPDATE `locations` SET 
                `title` = "' . $_POST['title_annonce'] . '",
                `description` = "' . $_POST['content_annonce'] . '",
                `url` = "' . $url_appartement . '",
                `location` = "' . $_POST['location'] . '",
                `region` = "' . $_POST['region'] . '",
                `rue` = "' . $_POST['address'] . '",
                `code_postal` = "' . $_POST['cp'] . '",
                `surface` = "' . $_POST['surface'] . '",
                `pieces` = "' . $_POST['pieces'] . '",
                `image` = "' . $image1 . '",
                `image_2` = "' . $image2 . '",
                `image_3` = "' . $image3 . '",
                `image_4` = "' . $image4 . '",
                `chambres` = "' . $_POST['chambre'] . '",
                `type` = "' . $_POST['type_propriete'] . '",
                `prix` = "' . $_POST['loyer'] . '",
                `disponible` = "' . $_POST['disponible'] . '",
                `disponibilite` = "' . $_POST['disponibilite'] . '",
                `duree` = "' . $_POST['duree_location'] . '",
                `garantie` = "' . $_POST['garantie'] . '",
                `frais` = "' . $_POST['frais_supp'] . '",
                `meuble` = "' . $meuble . '",
                `animeaux_acceptes` = "' . $animeaux_acceptes . '",
                `sous_location` = "' . $sous_location . '",
                `updated_at` = "' . date('Y-m-d h:i:s') . '"
            WHERE id = "' . $location['id'] . '"');
        }

        $final = ['update' => true, 'title' => 'Votre location a été modifiée !', 'message' => 'Les modifications apportées à votre location on été modifier<br><br>Merci de vous rendre sur celle-ci et de vérifier l\'éxactitude de vos informations.<br><br><h4>À très bientôt.</h4>', 'icone' => $image_url . 'check.png'];
    } else {
        // L'utilisateur a rencontré une erreur
        $final = ['update' => false, 'title' => 'Votre location n\'a pas été modifié !', 'message' => 'Une erreur est survenue lors de la modification de votre location.<br><br>Vous avez la possibilité de recommencer de nouveau.<br><br><h4>À très bientôt.</h4>', 'icone' => $image_url . 'error.png'];
    }
}

echo json_encode($final);
