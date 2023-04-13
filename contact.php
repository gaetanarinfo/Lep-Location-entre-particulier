<!-- Configuration du site -->
<?php include('config/config.php'); ?>

<!-- Body -->
<?php include('modules/body.php'); ?>

<main class="flex-shrink-0">

    <!-- Navigation-->
    <?php include('modules/navigation.php'); ?>

    <div class="content mt-5 reveal">

        <div class="container">

            <form id="contact">

                <div class="row">

                    <div class="col-md-6 picture show-mobile mb-4">
                        <img src="<?= $image_url . 'contact.jpg' ?>" class="img-fluid rounded shadow-lg" alt="">

                        <div class="mt-4 w-100">
                            <h3 class="mb-3">Contactez notre service client LEP</h3>
                            <h5 class="text-dark mb-4"><i class="fa-solid fa-handshake-angle me-2"></i>Nous voulons vous aider !</h5>

                            <p class="text-dark fw-bold mb-2">Notre adresse e-mail</p>
                            <p class="text-dark mb-0">Contactez notre service client ici :</p>
                            <p class="text-dark"><a href="mailto: contact@location-entre-particulier.fr">contact@location-entre-particulier.fr</a></p>
                            <p class="text-dark fw-bold">Du lundi au samedi de 10h00 à 19h00</p>
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
                                <a href="/" class="btn btn-outline-dark text-decoration-none fw-bold">Retour</a>
                            </div>

                        </div>

                        <div class="row justify-content-center bloc-form">

                            <div class="mb-4">
                                <h3>Vos coordonnées</h3>
                            </div>

                            <div class="col-md-6 mb-4">

                                <div class="form-group mb-3">
                                    <label>* Civilité</label>
                                    <select class="form-select" placeholder="Civilité" id="genre_contact" name="genre_contact">
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

                            <div class="mb-4">
                                <h3>Votre demande concerne</h3>
                            </div>

                            <div class="form-group mb-3">
                                <label>* Sujet</label>
                                <input class="form-control" autocomplete="off" required id="sujet_contact" placeholder="Sujet de la demande" type="text" name="sujet_contact">
                            </div>

                            <div class="form-group mb-3">
                                <label>Numéro du ticket</label>
                                <input class="form-control" autocomplete="off" id="ticket_contact" placeholder="Ex: 845215EF56" type="text" name="ticket_contact">
                            </div>

                            <div class="form-group mb-3">
                                <label>* Message</label>
                                <textarea class="form-control" autocomplete="off" required id="content_contact" rows="9" name="content_contact"></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="formFile" class="form-label">Pièces jointes</label>
                                <input class="form-control" accept="image/*,.pdf,.doc" type="file" id="formFile">
                                <div id="validationFile" class="invalid-feedback">
                                    <i class="fa-solid fa-xmark me-1"></i>Le fichier est trop volumineux.
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-6 picture hide-mobile">
                        <img src="<?= $image_url . 'contact.jpg' ?>" class="img-fluid rounded shadow-lg" alt="">

                        <div class="mt-4 w-100">
                            <h3 class="mb-3">Contactez notre service client LEP</h3>
                            <h5 class="text-dark mb-4"><i class="fa-solid fa-handshake-angle me-2"></i>Nous voulons vous aider !</h5>

                            <p class="text-dark fw-bold mb-2">Notre adresse e-mail</p>
                            <p class="text-dark mb-0">Contactez notre service client ici :</p>
                            <p class="text-dark"><a href="mailto: contact@location-entre-particulier.fr">contact@location-entre-particulier.fr</a></p>
                            <p class="text-dark fw-bold">Du lundi au samedi de 10h00 à 19h00</p>
                        </div>
                    </div>

                    <div class="col-md-12 bloc-form mt-3">
                        <input type="submit" value="Valider votre demande" id="button-help" class="btn btn-block bg-gradient btn-success text-white">
                    </div>

                </div>

            </form>

        </div>

    </div>

</main>

<!-- Footer-->
<?php include('modules/footer.php'); ?>