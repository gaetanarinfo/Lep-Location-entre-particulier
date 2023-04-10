<!-- Vérification utilisateur -->
<?php require('config/user-verification.php') ?>

<!-- Configuration du site -->
<?php include('config/config.php'); ?>

<!-- Body -->
<?php include('modules/body.php'); ?>

<main class="flex-shrink-0">

    <!-- Navigation-->
    <?php include('modules/navigation.php'); ?>

    <div class="content mt-5 reveal">

        <div class="container">

            <form id="register">

                <div class="row">

                    <div class="col-md-6 picture show-mobile mb-4">
                        <img src="<?= $image_url . 'register.jpg' ?>" class="img-fluid rounded shadow-lg" alt="">

                        <div class="mt-4 w-100">
                            <h3 class="mb-3">Publiez votre annonce de location sur <?= $site_config['title'] ?></h3>
                            <p class="text-dark">Ajoutez votre annonce de location sur <?= $site_config['title'] ?> - c'est 100 % gratuit ! Des milliers de locataires font des recherches sur internet, sans trouver le bon site internet. Nous avons la bonne solution pour vous. Publiez votre annonce de location dès aujourd'hui ! Vous pouvez toujours suspendre et / ou supprimer votre annonce.</p>
                        </div>
                    </div>

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
                                        <option value="7">Maison</option>
                                        <option value="1">Appartement</option>
                                        <option value="4">Duplex</option>
                                        <option value="5">Loft</option>
                                        <option value="3">Chambre</option>
                                        <option value="6">Appartement étudiant</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label>* Disponible à partir de</label>
                                    <input class="form-control" required placeholder="Disponible à partir de" type="date" id="disponible" name="disponible">
                                </div>

                                <div class="form-group mb-3">
                                    <label>* Pièces</label>
                                    <select required class="form-select" placeholder="Pièces" id="pieces" name="pieces">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label>* Surface</label>
                                    <input class="form-control" min="1" oninput="validity.valid||(value='');" placeholder="Surface" type="number" step="1" id="surface" name="surface">
                                </div>

                                <div class="form-group mb-3">
                                    <label>* Dépôt de garantie</label>
                                    <input class="form-control" required placeholder="Dépôt de garantie" type="number" id="garantie" name="garantie">
                                </div>

                            </div>

                            <div class="col-md-6 mb-4">

                                <div class="form-group mb-3">
                                    <label for="">Durée de location</label>
                                    <select class="form-select" id="duree_location" name="duree_location">
                                        <option value="1">Illimité</option>
                                        <option value="2">Plus de six mois</option>
                                        <option value="3">Moins de six mois</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Chambres</label>
                                    <select class="form-select" placeholder="Chambres" id="chambre" name="chambre">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Loyer</label>
                                    <input class="form-control" placeholder="Loyer" type="text" value="0" id="loyer" name="loyer">
                                </div>

                                <div class="form-group mb-3">
                                    <label>Frais supplémentaires</label>
                                    <input class="form-control" placeholder="Frais supplémentaires" type="text" id="frais_supp" name="frais_supp">
                                </div>

                            </div>

                            <div class="col-md-12 mb-4">

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="meuble" value="false" name="meuble">
                                    <label class="form-check-label" for="meuble">Meublé</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="animeaux_acceptes" value="false" name="animeaux_acceptes">
                                    <label class="form-check-label" for="animeaux_acceptes">Animaux acceptés</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="sous_location" value="false" name="sous_location">
                                    <label class="form-check-label" for="sous_location">Sous-location</label>
                                </div>

                            </div>

                            <div class="mb-4">
                                <h3>Où se trouve votre bien</h3>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="form-group mb-3">
                                    <label>* Adresse</label>
                                    <input class="form-control" autocomplete="off" required id="address" placeholder="Ex: 20 rue du parc" type="text" name="address">
                                </div>

                                <div class="form-group mb-3">
                                    <label>* Région</label>
                                    <select class="form-select" placeholder="Région" required id="region" name="region">
                                        <?php foreach ($regions as $value) { ?>
                                            <option value="<?= $value['id'] ?>"><?= $value['title'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                               
                            <div class="form-group mb-3">
                                    <div class="form-group mb-3">
                                        <label>* Location</label>
                                        <input class="form-control" autocomplete="off" required id="location" placeholder="Ex: Le Mans" type="text" name="location">
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label>* Code postal</label>
                                    <input class="form-control" autocomplete="off" id="cp" required placeholder="Ex: 75256" min="1" max="5" type="number" name="cp">
                                </div>

                            </div>

                            <div class="mb-4">
                                <h3>Vos coordonnées</h3>
                            </div>

                            <div class="col-md-6 mb-4">

                                <div class="form-group mb-3">
                                    <label>* Civilité</label>
                                    <select class="form-select" placeholder="Civilité" id="genre" name="genre">
                                        <option value="1">Madame</option>
                                        <option value="2">Monsieur</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label>* Téléphone</label>
                                    <input class="form-control" autocomplete="off" required id="tel_contact" placeholder="Téléphone" type="tel" name="tel_contact">
                                </div>

                                <div class="form-group mb-3">
                                    <label>* Prenom</label>
                                    <input class="form-control" autocomplete="off" required id="prenom_contact" placeholder="Prénom" type="text" name="prenom_contact">
                                </div>

                            </div>

                            <div class="col-md-6 mb-4">

                                <div class="form-group mb-3">
                                    <label>* Email</label>
                                    <input class="form-control" autocomplete="off" required id="email_contact" placeholder="Adresse email" type="text" name="email_contact">
                                </div>


                                <div class="form-group mb-3">
                                    <label>* Nom</label>
                                    <input class="form-control" autocomplete="off" required id="nom_contact" placeholder="Nom" type="text" name="nom_contact">
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-6 picture hide-mobile">
                        <img src="<?= $image_url . 'register.jpg' ?>" class="img-fluid rounded shadow-lg" alt="">

                        <div class="mt-4 w-100">
                            <h3 class="mb-3">Publiez votre annonce de location sur <?= $site_config['title'] ?></h3>
                            <p class="text-dark">Ajoutez votre annonce de location sur <?= $site_config['title'] ?> - c'est 100 % gratuit ! Des milliers de locataires font des recherches sur internet, sans trouver le bon site internet. Nous avons la bonne solution pour vous. Publiez votre annonce de location dès aujourd'hui ! Vous pouvez toujours suspendre et / ou supprimer votre annonce.</p>
                        </div>
                    </div>

                    <div class="mb-4 bloc-form">
                        <h3>Titre et description</h3>
                    </div>

                    <div class="col-md-12 mb-4 bloc-form">
                        <div class="form-group mb-3">
                            <label>* Titre</label>
                            <input class="form-control" autocomplete="off" required id="title_annonce" placeholder="Title" type="text" name="title_annonce">
                        </div>

                        <div class="form-group mb-3">
                            <label>* Description</label>
                            <textarea class="form-control" autocomplete="off" required id="content_annonce" placeholder="Description" rows="10" name="content_annonce"></textarea>
                        </div>
                    </div>

                    <div class="mb-4 bloc-form">
                        <h3>Galerie d'images</h3>
                    </div>

                    <div class="col-md-3 mb-4 bloc-form">

                        <label for="upload-galerie" class="d-block">

                            <div class="upload-bloc">

                                <div class="galerie-received" id="galerie-received"></div>

                                <input type="file" id="upload-galerie" class="d-none" accept="image/*">
                                <p class="text-dark">Cliquez ici pour la télécharger</p>
                                <div id="button-add-galerie" class="btn btn-block bg-gradient btn-info text-white">Ajouter des photos</div>

                                <div class="error error-1 mt-2"></div>

                            </div>

                        </label>

                    </div>

                    <div class="col-md-3 mb-4 bloc-form">

                        <label for="upload-galerie-2" class="d-block">

                            <div class="upload-bloc-2">

                                <div class="galerie-received" id="galerie-received-2"></div>

                                <input type="file" id="upload-galerie-2" class="d-none" accept="image/*">
                                <p class="text-dark">Cliquez ici pour la télécharger</p>
                                <div id="button-add-galerie" class="btn btn-block bg-gradient btn-info text-white">Ajouter des photos</div>

                                <div class="error error-1-2 mt-2"></div>

                            </div>

                        </label>

                    </div>

                    <div class="col-md-3 mb-4 bloc-form">

                        <label for="upload-galerie-3" class="d-block">

                            <div class="upload-bloc-3">

                                <div class="galerie-received" id="galerie-received-3"></div>

                                <input type="file" id="upload-galerie-3" class="d-none" accept="image/*">
                                <p class="text-dark">Cliquez ici pour la télécharger</p>
                                <div id="button-add-galerie" class="btn btn-block bg-gradient btn-info text-white">Ajouter des photos</div>

                                <div class="error error-1-3 mt-2"></div>

                            </div>

                        </label>

                    </div>

                    <div class="col-md-3 mb-4 bloc-form">

                        <label for="upload-galerie-4" class="d-block">

                            <div class="upload-bloc-4">

                                <div class="galerie-received" id="galerie-received-4"></div>

                                <input type="file" id="upload-galerie-4" class="d-none" accept="image/*">
                                <p class="text-dark">Cliquez ici pour la télécharger</p>
                                <div id="button-add-galerie" class="btn btn-block bg-gradient btn-info text-white">Ajouter des photos</div>

                                <div class="error error-1-4 mt-2"></div>

                            </div>

                        </label>

                    </div>

                    <div class="mb-4 bloc-form">
                        <h3>Vos informations de connexion</h3>
                    </div>

                    <div class="col-md-4 mb-4 bloc-form">
                        <div class="form-group mb-3">
                            <label>* Email</label>
                            <input class="form-control" autocomplete="off" required id="email_login" placeholder="Email" type="email" name="email_login">
                        </div>
                    </div>

                    <div class="col-md-4 mb-4 bloc-form">
                        <div class="form-group mb-3">
                            <label>* Mot de passe (8 caractères minimum)</label>
                            <input class="form-control" autocomplete="off" required id="password_login" pattern=".{8,}" placeholder="Mot de passe" type="password" name="password_login">
                        </div>
                    </div>

                    <div class="col-md-12 bloc-form">
                        <input type="submit" value="Inscrire votre bien" id="button-register" class="btn btn-block bg-gradient btn-success text-white">
                    </div>

                </div>

            </form>

        </div>

    </div>

</main>

<!-- Footer-->
<?php include('modules/footer.php'); ?>