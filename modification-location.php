<!-- Vérification utilisateur -->
<?php require('config/user-verification.php') ?>

<!-- Vérification page -->
<?php require('config/page-verification.php') ?>

<!-- Configuration du site -->
<?php include('config/config.php'); ?>

<!-- Body -->
<?php include('modules/body.php'); ?>

<main class="flex-shrink-0">

    <div class="container-fluid">

        <div class="row">

            <!-- SideBar -->
            <?php include('modules/users/sidebar.php'); ?>

            <div class="col-md-9 ms-sm-auto ps-0 pe-4 col-lg-10 page">

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

                    <h1 class="h2"><i class="fa-regular fa-face-smile-wink me-1 text-dark"></i> Bonjour <?= $users['prenom'] ?>, bienvenue sur votre espace</h1>

                </div>

                <div class="mt-4 mb-5">
                    <h4><i class="fa-solid fa-file-pen me-2 text-success"></i>Modification de <?= $location_user['title'] ?></h4>
                </div>

                <div class="row mb-4">

                    <form id="update">

                        <div class="row">

                            <div class="col-md-6 contents">

                                <div class="loader_inf hidden" id="loader-form">
                                    <img width="67" height="67" src="<?= $image_url . 'loader.svg' ?>">
                                </div>

                                <div class="message-validation">

                                    <div>
                                        <img class="message-icone" src="">
                                    </div>

                                    <div>
                                        <h3 class="message-title"></h3>
                                    </div>

                                    <div class="mb-4">
                                        <p class="message-body"></p>
                                    </div>

                                    <div class="mb-4">
                                        <a href="/login" class="btn btn-outline-dark text-decoration-none fw-bold">Retour</a>
                                    </div>

                                </div>

                                <div class="row justify-content-center bloc-form">

                                    <div class="mb-4">
                                        <h3>Informations générales</h3>
                                    </div>

                                    <div class="col-md-6 mb-4">

                                        <div class="form-group mb-3">
                                            <label for="type_propriete">Type de propriété</label>
                                            <select class="form-select" aria-label="Type de propriété" id="type_propriete" name="type_propriete">
                                                <option value="7" <?= ($location_user['type'] == 7) ? 'selected' : '' ?>>Maison</option>
                                                <option value="1" <?= ($location_user['type'] == 1) ? 'selected' : '' ?>>Appartement</option>
                                                <option value="4" <?= ($location_user['type'] == 4) ? 'selected' : '' ?>>Duplex</option>
                                                <option value="5" <?= ($location_user['type'] == 5) ? 'selected' : '' ?>>Loft</option>
                                                <option value="3" <?= ($location_user['type'] == 3) ? 'selected' : '' ?>>Chambre</option>
                                                <option value="6" <?= ($location_user['type'] == 6) ? 'selected' : '' ?>>Appartement étudiant</option>
                                            </select>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>* Disponible à partir de</label>
                                            <input class="form-control" required placeholder="Disponible à partir de" type="date" min="<?= date('Y-m-d') ?>" id="disponible" value="<?= $location_user['disponible'] ?>" name="disponible">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>* Pièces</label>
                                            <select required class="form-select" placeholder="Pièces" id="pieces" name="pieces">
                                                <option value="1" <?= ($location_user['pieces'] == 1) ? 'selected' : '' ?>>1</option>
                                                <option value="2" <?= ($location_user['pieces'] == 2) ? 'selected' : '' ?>>2</option>
                                                <option value="3" <?= ($location_user['pieces'] == 3) ? 'selected' : '' ?>>3</option>
                                                <option value="4" <?= ($location_user['pieces'] == 4) ? 'selected' : '' ?>>4</option>
                                                <option value="5" <?= ($location_user['pieces'] == 5) ? 'selected' : '' ?>>5</option>
                                                <option value="6" <?= ($location_user['pieces'] == 6) ? 'selected' : '' ?>>6</option>
                                                <option value="7" <?= ($location_user['pieces'] == 7) ? 'selected' : '' ?>>7</option>
                                                <option value="8" <?= ($location_user['pieces'] == 8) ? 'selected' : '' ?>>8</option>
                                                <option value="9" <?= ($location_user['pieces'] == 9) ? 'selected' : '' ?>>9</option>
                                                <option value="10" <?= ($location_user['pieces'] == 10) ? 'selected' : '' ?>>10</option>
                                            </select>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>* Surface (m2)</label>
                                            <input class="form-control" min="1" oninput="validity.valid||(value='');" placeholder="Surface" type="number" value="<?= $location_user['surface'] ?>" step="1" id="surface" name="surface">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>* Dépôt de garantie</label>
                                            <input class="form-control" required placeholder="Dépôt de garantie" type="number" id="garantie" name="garantie" value="<?= $location_user['garantie'] ?>">
                                        </div>

                                    </div>

                                    <div class="col-md-6 mb-4">

                                        <div class="form-group mb-3">
                                            <label for="">Durée de location</label>
                                            <select class="form-select" id="duree_location" name="duree_location">
                                                <option value="1" <?= ($location_user['duree'] == 1) ? 'selected' : '' ?>>Illimité</option>
                                                <option value="2" <?= ($location_user['duree'] == 2) ? 'selected' : '' ?>>Plus de six mois</option>
                                                <option value="3" <?= ($location_user['duree'] == 3) ? 'selected' : '' ?>>Moins de six mois</option>
                                            </select>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Chambres</label>
                                            <select class="form-select" placeholder="Chambres" id="chambre" name="chambre">
                                                <option value="1" <?= ($location_user['chambres'] == 1) ? 'selected' : '' ?>>1</option>
                                                <option value="2" <?= ($location_user['chambres'] == 2) ? 'selected' : '' ?>>2</option>
                                                <option value="3" <?= ($location_user['chambres'] == 3) ? 'selected' : '' ?>>3</option>
                                                <option value="4" <?= ($location_user['chambres'] == 4) ? 'selected' : '' ?>>4</option>
                                                <option value="5" <?= ($location_user['chambres'] == 5) ? 'selected' : '' ?>>5</option>
                                                <option value="6" <?= ($location_user['chambres'] == 6) ? 'selected' : '' ?>>6</option>
                                                <option value="7" <?= ($location_user['chambres'] == 7) ? 'selected' : '' ?>>7</option>
                                                <option value="8" <?= ($location_user['chambres'] == 8) ? 'selected' : '' ?>>8</option>
                                            </select>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Loyer</label>
                                            <input class="form-control" placeholder="Loyer" type="text" id="loyer" name="loyer" value="<?= $location_user['prix'] ?>">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Frais supplémentaires</label>
                                            <input class="form-control" placeholder="Frais supplémentaires" type="text" id="frais_supp" name="frais_supp" value="<?= $location_user['frais'] ?>">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>* Location disponible</label>
                                            <select class="form-select" placeholder="Chambres" id="disponibilite" name="disponibilite">
                                                <option value="1" <?= ($location_user['disponibilite'] == 1) ? 'selected' : '' ?>>Oui</option>
                                                <option value="0" <?= ($location_user['disponibilite'] == 0) ? 'selected' : '' ?>>Non</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="col-md-12 mb-4">

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="meuble" <?= ($location_user['meuble'] == 1) ? 'value="true" checked' : 'value="false"' ?> name="meuble">
                                            <label class="form-check-label" for="meuble">Meublé</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="animeaux_acceptes" <?= ($location_user['animeaux_acceptes'] == 1) ? 'value="true" checked' : 'value="false"' ?> name="animeaux_acceptes">
                                            <label class="form-check-label" for="animeaux_acceptes">Animaux acceptés</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="sous_location" <?= ($location_user['sous_location'] == 1) ? 'value="true" checked' : 'value="false"' ?> name="sous_location">
                                            <label class="form-check-label" for="sous_location">Sous-location</label>
                                        </div>

                                    </div>

                                    <div class="mb-4">
                                        <h3>Où se trouve votre bien</h3>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="form-group mb-3">
                                            <label>* Adresse</label>
                                            <input class="form-control" autocomplete="off" required id="address" placeholder="Ex: 20 rue du parc" type="text" name="address" value="<?= $location_user['rue'] ?>">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>* Région</label>
                                            <select class="form-select" placeholder="Région" required id="region" name="region">
                                                <?php foreach ($regions as $value) { ?>
                                                    <option value="<?= $value['id'] ?>" <?= ($location_user['region'] == $value['id']) ? 'selected' : '' ?>><?= $value['title'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">

                                        <div class="form-group mb-3">
                                            <div class="form-group mb-3">
                                                <label>* Location</label>
                                                <input class="form-control" autocomplete="off" required id="location" value="<?= $location_user['location'] ?>" placeholder="Ex: Le Mans" type="text" name="location">
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>* Code postal</label>
                                            <input class="form-control" autocomplete="off" id="cp" required placeholder="Ex: 75256" value="<?= $location_user['code_postal'] ?>" type="number" name="cp">
                                        </div>

                                    </div>

                                    <div class="mb-4">
                                        <h3>Vos coordonnées</h3>
                                    </div>

                                    <div class="col-md-6 mb-4">

                                        <div class="form-group mb-3">
                                            <label>* Civilité</label>
                                            <select class="form-select" placeholder="Civilité" id="genre" name="genre">
                                                <option value="1" <?= ($users['civilite'] == 1) ? 'selected' : '' ?>>Madame</option>
                                                <option value="2" <?= ($users['civilite'] == 2) ? 'selected' : '' ?>>Monsieur</option>
                                            </select>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>* Téléphone</label>
                                            <input class="form-control" autocomplete="off" required id="tel_contact" placeholder="Téléphone" type="tel" name="tel_contact" value="<?= $users['tel'] ?>">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>* Prenom</label>
                                            <input class="form-control" autocomplete="off" required id="prenom_contact" placeholder="Prénom" type="text" name="prenom_contact" value="<?= $users['prenom'] ?>">
                                        </div>

                                    </div>

                                    <div class="col-md-6 mb-4">

                                        <div class="form-group mb-3">
                                            <label>* Email</label>
                                            <input class="form-control" autocomplete="off" required id="email_contact" placeholder="Adresse email" type="text" name="email_contact" value="<?= $users['email_contact'] ?>">
                                        </div>


                                        <div class="form-group mb-3">
                                            <label>* Nom</label>
                                            <input class="form-control" autocomplete="off" required id="nom_contact" placeholder="Nom" type="text" name="nom_contact" value="<?= $users['nom'] ?>">
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-6 picture">

                                <div class="location">

                                    <div id="locaMCarousel_<?= $location_user['id'] ?>" class="carousel slide" data-bs-ride="carousel">

                                        <div class="carousel-inner">

                                            <div class="carousel-item active">
                                                <img class="card-img-top" src="<?= $image_url . 'annonces/' . $location_user['image'] ?>" />
                                            </div>

                                            <?php if (!empty($location_user['image_2'])) { ?>
                                                <div class="carousel-item">
                                                    <img class="card-img-top" src="<?= $image_url . 'annonces/' . $location_user['image_2'] ?>" />
                                                </div>
                                            <?php } ?>

                                            <?php if (!empty($location_user['image_3'])) { ?>
                                                <div class="carousel-item">
                                                    <img class="card-img-top" src="<?= $image_url . 'annonces/' . $location_user['image_3'] ?>" />
                                                </div>
                                            <?php } ?>


                                            <?php if (!empty($location_user['image_4'])) { ?>
                                                <div class="carousel-item">
                                                    <img class="card-img-top" src="<?= $image_url . 'annonces/' . $location_user['image_4'] ?>" />
                                                </div>
                                            <?php } ?>

                                        </div>

                                        <button class="carousel-control-prev" type="button" data-bs-target="#locaMCarousel_<?= $location_user['id'] ?>" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Précédent</span>
                                        </button>

                                        <button class="carousel-control-next" type="button" data-bs-target="#locaMCarousel_<?= $location_user['id'] ?>" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Suivant</span>
                                        </button>

                                    </div>

                                </div>

                            </div>

                            <div class="mb-4 bloc-form">
                                <h3>Titre et description</h3>
                            </div>

                            <div class="col-md-6 mb-4 bloc-form">
                                <div class="form-group mb-3">
                                    <label>* Titre</label>
                                    <input class="form-control" autocomplete="off" required id="title_annonce" placeholder="Title" type="text" name="title_annonce" value="<?= $location_user['title'] ?>">
                                </div>

                                <div class="form-group mb-3">
                                    <label>* Description</label>
                                    <textarea class="form-control" autocomplete="off" required id="content_annonce" placeholder="Description" rows="10" name="content_annonce"><?= $location_user['description'] ?></textarea>
                                </div>
                            </div>

                            <div class="col-md-12 bloc-form">
                                <input type="submit" value="Valider" id="button-update" class="btn btn-block bg-gradient btn-info btn-lg text-white">
                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</main>

<!-- Footer-->
<?php include('modules/footer.php'); ?>