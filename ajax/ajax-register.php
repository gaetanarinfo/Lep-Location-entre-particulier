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

    // Récupération des datas sans quot
    $req = $dbh->prepare('SELECT email FROM users WHERE id_site = 1 AND email = :email');
    $req->execute(array('email' => $_POST['email_login']));
    $donnees = $req->fetch();

    if (empty($donnees['email'])) {

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

        if ($_POST['meuble'] == "false") $meuble = 0;
        else $meuble = 1;

        if ($_POST['animeaux_acceptes'] == "false") $animeaux_acceptes = 0;
        else $animeaux_acceptes = 1;

        if ($_POST['sous_location'] == "false") $sous_location = 0;
        else $sous_location = 1;

        if (!empty($attachement)) $image1 = str_replace('/var/www/lpe/public/assets/images/annonces/', '', $attachement[0]);
        else $image1 = "";
        if (!empty($attachement2)) $image2 = str_replace('/var/www/lpe/public/assets/images/annonces/', '', $attachement2[0]);
        else $image2 = "";
        if (!empty($attachement3)) $image3 = str_replace('/var/www/lpe/public/assets/images/annonces/', '', $attachement3[0]);
        else $image3 = "";
        if (!empty($attachement4)) $image4 = str_replace('/var/www/lpe/public/assets/images/annonces/', '', $attachement4[0]);
        else $image4 = "";

        // Pour les maisons uniquement
        if ($_POST['type_propriete'] == "7") {

            // Création de l'annonce //
            $insert_annonce = $dbh->query('INSERT INTO `maisons` (
                `id_site`,
                `title`,
                `description`,
                `location`,
                `region`,
                `rue`,
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
                1,
                "' . $_POST['title_annonce'] . '",
                "' . $_POST['content_annonce'] . '",
                "' . $_POST['location'] . '",
                "' . $_POST['region'] . '",
                "' . $_POST['address'] . '",
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
        } else {

            // Création de l'annonce //
            $insert_annonce = $dbh->query('INSERT INTO `appartements` (
                `id_site`,
                `title`,
                `description`,
                `location`,
                `region`,
                `rue`,
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
                1,
                "' . $_POST['title_annonce'] . '",
                "' . $_POST['content_annonce'] . '",
                "' . $_POST['location'] . '",
                "' . $_POST['region'] . '",
                "' . $_POST['address'] . '",
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

        $options = [
            'cost' => 12,
        ];

        $password = password_hash($_POST['password_login'], PASSWORD_BCRYPT, $options);

        // Création de l'user //
        $create_user = $dbh->query('INSERT INTO `users` (id_site, email, email_contact, password, civilite, nom, prenom, tel) VALUES ("1", "' . $_POST['email_login'] . '", "' . $_POST['email_contact'] . '", "' . $password . '", "' . $_POST['genre'] . '", "' . $_POST['nom_contact'] . '", "' . $_POST['prenom_contact'] . '", "' . $_POST['tel_contact'] . '")');

        // Envoi du mail
        $from = 'contact@location-entre-particulier.fr';
        $from_name = 'LEP - Location entre particulier';
        $to = $_POST['email_login'];
        $to_name = ucfirst($_POST['prenom_contact']) . ' ' . ucfirst($_POST['nom_contact']);
        $reply       = "no-reply@location-entre-particulier.fr";
        $reply_name     = 'LEP - Location entre particulier';

        $sujet = 'Création de vos identifiants et de votre annonce.';

        $content = 'Bonjour ' . $_POST['prenom_contact'] . ',<br/><br/>';

        $content .= 'Merci de vous avoir inscrit sur LEP, vous pouvez désormais vous connecter à votre espace.<br/><br/>';

        $content .= 'Notre équipe va examiner avec attention votre annonce, et elle sera en ligne sous 24/48h jours ouvrée maximum.<br/><br/>';

        $content .= 'Vous pouvez gérer vos annonces ou vos coordonnées, modifier supprimer, créé, comme bon vous semble.<br/><br/>';
        
        $content .= 'Pour rappel votre identifiant de connexion :<br/>';
        $content .= 'Adresse email : ' . $_POST['email_contact'] . '<br/>';
        $content .= 'Votre adresse ip : ' . $_SERVER['REMOTE_ADDR'] . '<br/><br/>';

        $content .= 'Nous vous souhaitons une agréable expérience sur <a href="https://location-entre-particulier.fr">LEP</a>.<br/><br/>';

        $content .= '<img width="50" height="50" src="https://location-entre-particulier.fr/public/assets/images/favicon.png"><br/><br/>';

        $content .= 'A très bientôt.';

        sendMail($from, $from_name, $to, $to_name, $reply, $reply_name, $sujet, $content, $dbh, false);

        // ---------------------------- //

        // L'utilisateur ne possède pas de compte
        $final = ['create' => true, 'title' => 'Votre annonce a bien été créée !', 'message' => 'Merci de patienter le temps que notre équipe analyse votre annonce, celà peut prendre entre 24/48h jour ouvrée, merci de votre confiance.<br><br><h4>À très bientôt.</h4>', 'icone' => $image_url . 'check.png'];
    } else {
        // L'utilisateur possède un compte
        $final = ['create' => false, 'title' => 'Votre annonce n\'a pas été publié !', 'message' => 'Vous possédez déjà un compte, merci de vous connecter avec vos identifiants. Vous pouvez aussi réinitialiser votre mot de passe, si vous avez perdu votre mot de passe.<br><br>Vous avez la possibilité de nous contacter si vous ne retrouvez pas vos identifiant de connexion.<br><br><h4>À très bientôt.</h4>', 'icone' => $image_url . 'error.png'];
    }
} else {
    // L'utilisateur a rencontré une erreur
    //$final = ['register' => false, 'message' => constant('MESSAGE_REGISTER_2'), 'back' => '<a role="button" class="back">' . constant('BACK') .  '</a>', 'icone' => '<i class="fa-solid fa-triangle-exclamation" style="font-size: 40px;"></i>'];
}

echo json_encode($final);
