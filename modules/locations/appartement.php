<main class="flex-shrink-0">

    <!-- Navigation-->
    <?php include('modules/navigation.php'); ?>

    <div class="content reveal">

        <div class="container mb-5">

            <div class="row">

                <!-- Breadcrump -->
                <?php include('modules/breadcrump.php') ?>

                <div class="container mt-3">

                    <div class="row">

                        <div id="image-1" class="col-md-6">
                            <img role="button" src="<?= $image_url . 'annonces/' . $appartement['image'] ?>" alt="" class="img-fluid rounded shadow" data-fancybox="gallery">
                        </div>

                        <?php if (!empty($appartement['image_2'])) { ?>
                            <div id="image-2" class="col-md-6">
                                <img role="button" src="<?= $image_url . 'annonces/' . $appartement['image_2'] ?>" alt="" class="img-fluid rounded shadow" data-fancybox="gallery">
                            </div>
                        <?php } ?>

                        <?php if (!empty($appartement['image_3'])) { ?>
                            <div id="image-3" class="col-md-6">
                                <img role="button" src="<?= $image_url . 'annonces/' . $appartement['image_3'] ?>" alt="" class="img-fluid rounded shadow" data-fancybox="gallery">
                            </div>
                        <?php } ?>

                        <?php if (!empty($appartement['image_4'])) { ?>
                            <div id="image-4" class="col-md-6">
                                <img role="button" src="<?= $image_url . 'annonces/' . $appartement['image_4'] ?>" alt="" class="img-fluid rounded shadow" data-fancybox="gallery">
                            </div>
                        <?php } ?>

                        <div class="col-md-6">
                            <div id="map" class="rounded shadow"></div>
                        </div>

                        <div class="bloc-galerie mt-5">

                            <div class="me-4">
                                <img id="1" width="100" height="100" src="<?= $image_url . 'annonces/' . $appartement['image'] ?>" alt="" class="img-fluid rounded image-galerie-1">
                            </div>

                            <?php if (!empty($appartement['image_2'])) { ?>
                                <div class="me-4">
                                    <img id="2" width="100" height="100" src="<?= $image_url . 'annonces/' . $appartement['image_2'] ?>" alt="" class="img-fluid rounded image-galerie-2">
                                </div>
                            <?php } ?>

                            <?php if (!empty($appartement['image_3'])) { ?>
                                <div class="me-4">
                                    <img id="3" width="100" height="100" src="<?= $image_url . 'annonces/' . $appartement['image_3'] ?>" alt="" class="img-fluid rounded image-galerie-3">
                                </div>
                            <?php } ?>

                            <?php if (!empty($appartement['image_4'])) { ?>
                                <div>
                                    <img id="4" width="100" height="100" src="<?= $image_url . 'annonces/' . $appartement['image_4'] ?>" alt="" class="img-fluid rounded image-galerie-4">
                                </div>
                            <?php } ?>

                        </div>

                        <div class="col-md-12 mt-4">
                            <hr>
                        </div>

                        <div class="col-md-12 mt-2">
                            <h1 class="h2"><i class="fa-solid fa-puzzle-piece me-2 text-info"></i><?= $appartement['pieces'] ?> pièces <?= $appartement['title_type'] ?> de <?= $appartement['surface'] ?> m² à <?= $appartement['location'] ?></h1>
                            <p class="text-dark"><i class="fa-solid fa-map-pin me-2 text-success"></i><?= $appartement['rue'] ?>, <?= $appartement['code_postal'] ?>, <?= $appartement['location'] ?></p>
                        </div>

                        <div class="col-md-12 mt-5">

                            <table class="table">

                                <thead>

                                    <tr>
                                        <th scope="col">Surface</th>
                                        <th scope="col">Pièces</th>
                                        <th scope="col">Chambres</th>
                                        <th scope="col">Type de propriété</th>
                                        <th scope="col">Appartement soumis à LEP</th>
                                        <th scope="col" class="text-end">Numéro du bien</th>
                                    </tr>

                                </thead>

                                <tbody>

                                    <tr>
                                        <th scope="row"><?= $appartement['surface'] ?> m2</th>
                                        <td><?= $appartement['pieces'] ?> pièce<?= ($appartement['pieces'] >= 1) ? '' : 's' ?></td>
                                        <td><?= $appartement['chambres'] ?> chambre<?= ($appartement['chambres'] >= 1) ? '' : 's' ?></td>
                                        <td><?= $appartement['title_type'] ?></td>
                                        <td><i class="fa-solid fa-certificate me-1 <?= ($appartement['verification'] == 1) ? 'text-success' : 'text-danger' ?>"></i> <?= ($appartement['verification'] == 1) ? 'Oui' : 'Non' ?></td>
                                        <td class="text-end"><?= $appartement['id'] ?></td>
                                    </tr>

                                </tbody>

                            </table>

                        </div>

                        <div class="col-md-6 bloc-content mt-5">
                            <h3><i class="fa-solid fa-arrows-to-circle me-2 text-danger"></i><?= $appartement['title'] ?></h3>
                            <p class="text-dark"><?= $appartement['description'] ?></p>

                            <a id="button-contact-modal" href="#" data-bs-toggle="modal" data-bs-target="#contact_prop" class="text-decoration-none text-dark">Vous avez des questions concernant cette location ? Contactez le propriétaire simplement et rapidement en cliquant ici.</a>
                        </div>

                        <div class="col-md-6 mt-5">

                            <div class="row bloc-contact">

                                <div class="col-md-6"><img src="<?= $image_url . 'contact-proprietaire.png' ?>" class="img-fluid" alt=""></div>

                                <?php

                                if (!empty($_COOKIE['location_email'])) {

                                    $contact_location = $dbh->prepare('SELECT email, status FROM contact_location WHERE email = :email');
                                    $contact_location->execute(array('email' => $_COOKIE['location_email']));
                                    $contact = $contact_location->fetch();

                                    $user_location = $dbh->prepare('SELECT U.*, UC.title AS civilite_name FROM users AS U LEFT JOIN users_civilite AS UC ON UC.id = U.civilite WHERE U.id = :id');
                                    $user_location->execute(['id' => $appartement['user_id']]);
                                    $user_info = $user_location->fetch();

                                    if ($contact['email'] == $_COOKIE['location_email'] && $contact['status'] == 2) { ?>

                                        <div class="col-md-6">

                                            <h3 class="text-end text-warning fw-bold title-price"><?= $appartement['prix'] ?> €/mois</h3>

                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><b><i class="fa-regular fa-user me-2"></i><?= $user_info['civilite_name'] ?><br/><?= $user_info['prenom'] . ' ' . $user_info['nom']?></b></li>
                                                <li class="list-group-item"><b><i class="fa-regular fa-at me-2"></i>Adresse email :</b> <a class="text-dark" href="mailto:<?= $user_info['email_contact'] ?>"><?= $user_info['email_contact'] ?></a></li>
                                                <li class="list-group-item"><b><i class="fa-solid fa-phone me-2"></i>Téléphone :</b><br/><a class="text-dark" href="tel:<?= $user_info['tel'] ?>"><?= $user_info['tel'] ?></a></li>
                                            </ul>

                                        </div>

                                    <?php } else { ?>

                                        <div class="col-md-6">

                                            <h3 class="text-end text-warning fw-bold title-price"><?= $appartement['prix'] ?> €/mois</h3>

                                            <div class="loader_inf hidden" id="loader-form">
                                                <img width="67" height="67" src="<?= $image_url . 'loader.svg' ?>">
                                            </div>

                                            <form id="contact-prop">

                                                <div class="form-group mb-3 form-bloc-email">
                                                    <span class="me-3"><i class="fa-regular fa-paper-plane text-success"></i></span>
                                                    <input class="form-control" autocomplete="off" required="" id="email_contact" placeholder="Entrez votre adresse email.." type="email" name="email_contact">
                                                    <input type="hidden" id="location_id" name="location_id" value="<?= $appartement['id'] ?>">
                                                    <input type="hidden" id="location_type" name="location_type" value="<?= $appartement['type'] ?>">
                                                </div>

                                                <label class="control control--checkbox mb-0"><span class="caption">J'accepte les conditions générales d'information sur les logements locatifs, les annonces et la politique de gestion des données personnelles de LEP.</span>
                                                    <input type="checkbox" id="accept-condition" style="width: 0;" />
                                                    <div class="control__indicator"></div>

                                                </label>

                                                <div class="col-md-12 text-end mt-4">
                                                    <input type="submit" value="Contacter le proprietaire" id="contact-proprietaire" class="btn btn-block bg-gradient btn-info text-white disabled">
                                                </div>

                                            </form>

                                            <div class="col-md-12 text-end mt-4 show-coordonee">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#contact_prop_pre_paiement" class="btn btn-block btn-lg bg-gradient btn-info text-white"><i class="fa-regular fa-envelope me-2" style="font-size: 1.2rem;"></i>Afficher les coordonnées</a>
                                            </div>

                                        </div>

                                    <?php } ?>

                                <?php } else { ?>

                                    <div class="col-md-6">

                                        <h3 class="text-end text-warning fw-bold title-price"><?= $appartement['prix'] ?> €/mois</h3>

                                        <div class="loader_inf hidden" id="loader-form">
                                            <img width="67" height="67" src="<?= $image_url . 'loader.svg' ?>">
                                        </div>

                                        <form id="contact-prop">

                                            <div class="form-group mb-3 form-bloc-email">
                                                <span class="me-3"><i class="fa-regular fa-paper-plane text-success"></i></span>
                                                <input class="form-control" autocomplete="off" required="" id="email_contact" placeholder="Entrez votre adresse email.." type="email" name="email_contact">
                                                <input type="hidden" id="location_id" name="location_id" value="<?= $appartement['id'] ?>">
                                                <input type="hidden" id="location_type" name="location_type" value="<?= $appartement['type'] ?>">
                                            </div>

                                            <label class="control control--checkbox mb-0"><span class="caption">J'accepte les conditions générales d'information sur les logements locatifs, les annonces et la politique de gestion des données personnelles de LEP.</span>
                                                <input type="checkbox" id="accept-condition" style="width: 0;" />
                                                <div class="control__indicator"></div>

                                            </label>

                                            <div class="col-md-12 text-end mt-4">
                                                <input type="submit" value="Contacter le proprietaire" id="contact-proprietaire" class="btn btn-block bg-gradient btn-info text-white disabled">
                                            </div>

                                        </form>

                                        <div class="col-md-12 text-end mt-4 show-coordonee">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#contact_prop_pre_paiement" class="btn btn-block btn-lg bg-gradient btn-info text-white"><i class="fa-regular fa-envelope me-2" style="font-size: 1.2rem;"></i>Afficher les coordonnées</a>
                                        </div>

                                    </div>

                                <?php } ?>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="bg-white py-5 reveal location-free">

            <div class="container px-4 py-5">

                <div class="bg-success bg-gradient p-5 rounded">

                    <h3 class="text-white mb-4">Cette location ne vous intéresse pas ?</h3>
                    <a class="btn btn-lg btn-success bg-gradient create-annonce-free" href="/location/<?= makeUrl($appartement['location']) ?>" role="button">Cliquez ici pour voir toutes les locations de <?= $appartement['location'] ?></a>

                </div>

            </div>

        </div>

    </div>

</main>

<!-- Modal -->
<div class="modal fade" id="contact_prop" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <h3 class="text-center">Contacter le propriétaire</h3>

                <div class="loader_inf hidden" id="loader-form-2">
                    <img width="67" height="67" src="<?= $image_url . 'loader.svg' ?>">
                </div>

                <form id="contact-prop-2" class="mt-4">

                    <div class="form-group mb-3 form-bloc-email">
                        <span class="me-3"><i class="fa-regular fa-paper-plane text-success"></i></span>
                        <input class="form-control" autocomplete="off" required="" id="email_contact_2" placeholder="Entrez votre adresse email.." type="email" name="email_contact_2">
                    </div>

                    <label class="control control--checkbox mb-0"><span class="caption">J'accepte les conditions générales d'information sur les logements locatifs, les annonces et la politique de gestion des données personnelles de LEP.</span>
                        <input type="checkbox" id="accept-condition-2" style="width: 0;" />
                        <div class="control__indicator"></div>

                    </label>

                    <div class="col-md-12 text-end mt-4">
                        <input type="submit" value="Contacter le proprietaire" id="contact-proprietaire-2" class="btn btn-block bg-gradient btn-info text-white disabled">
                    </div>

                </form>

                <div class="col-md-12 text-end mt-4 show-coordonee-2">
                    <a href="#" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#contact_prop_pre_paiement" class="btn btn-block btn-lg bg-gradient btn-info text-white"><i class="fa-regular fa-envelope me-2" style="font-size: 1.2rem;"></i>Afficher les coordonnées</a>
                </div>

            </div>

            <div class="modal-footer text-center d-block pt-3 mb-3">
                <a href="#" data-bs-dismiss="modal" class="text-dark">Non merci, cette propriété ne m'interesse pas</a>
            </div>
        </div>

    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="contact_prop_pre_paiement" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <div class="grid-title">
                    <img class="me-3" height="50" width="50" src="<?= $image_url ?>favicon.png">
                    <h3 class="text-center mb-0">Comment fonctionne LEP ?</h2>
                </div>

                <hr class="mb-3">

                <p class="text-dark"><b>Chez LEP</b>, nous travaillons chaque jour pour vous offrir la meilleure expérience locative.</p>
                <p class="text-dark">C'est pourquoi nous avons le plus grand choix de locations au monde, comparé à de nombreux sites internet.</p>
                <p class="text-dark">Consultez toutes les annonces de location dans le monde sur <b>LEP</b> ne dépensez plus votre temps et votre argent pour rien.</p>

                <hr class="mb-3">

                <div class="text-center">
                    <img src="<?= $image_url . 'reseau-locataire.jpg' ?>" class="img-fluid text-center rounded shadow-md" style="max-width: 450px;">
                </div>

                <p class="cancel-other mt-4 mb-4">Vous avez la possibilité d'annulez à tout moment, sans raison.</p>

                <h4 class="text-dark fw-bold text-center">Contacter le propriétaire</h4>
                <p class="text-dark fw-bold text-center">Obtenez votre accès complet dès maintenant</p>
                <p class="text-dark text-center">Contact illimité de tous les propriétaires de notre site internet jusqu'à annulation.</p>

                <div class="col-md-12">

                    <div class="alert-before">
                        <div id="alert-card-success" class="alert alert-success">Merci, votre paiement a été accepté !</div>
                    </div>

                    <div class="alert-before">
                        <div id="alert-card-error" class="alert alert-danger">Une erreur est survenue avec votre carte bancaire !</div>
                    </div>

                    <div class="loader_inf hidden" id="loader-paiement">
                        <img width="67" height="67" src="<?= $image_url . 'loader.svg' ?>">
                    </div>

                    <div class="card_element">

                        <!-- Display a payment form -->
                        <form id="payment-form" class="mb-3">

                            <input type="hidden" value="Abonnement LPE location - <?= '15,99 €' . ' - ' . date('d/m/Y H:i:s') ?>" id="description">

                            <div id="card-element">
                                <!--Stripe.js injects the Card Element-->
                            </div>

                            <button class="btn btn-lg btn-warning btn-gradient btn-paiement mt-3" id="submit_card">
                                <span id="button-text">Commencez maintenant</span>
                            </button>

                        </form>

                    </div>

                    <div class="bloc-text-div">
                        <p class="bloc-text-mini text-center">Votre abonnement commence dès maintenant, l'abonnement est renouvelé tous les mois. Les frais de renouvellement sont de 15,99 €. Vous pouvez toujours annuler votre abonnement.</p>
                    </div>

                </div>

            </div>

            <div class="modal-footer text-center d-block pt-3 mb-3">
                <a href="#" data-bs-dismiss="modal" class="text-dark">Non merci, cette offre ne m'interesse pas</a>
            </div>
        </div>

    </div>

</div>

<script>
    // Map

    var longitude = <?= $appartement['longitude'] ?>,
        latitude = <?= $appartement['latitude'] ?>;

    const map = L.map('map').setView([longitude, latitude], 13);

    var marker = L.marker([longitude, latitude]).addTo(map);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

    Fancybox.bind('[data-fancybox="gallery"]', {
        l10n: Fancybox.l10n.fr
    });
</script>