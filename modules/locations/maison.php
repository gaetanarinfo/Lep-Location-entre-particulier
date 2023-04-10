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
                            <img role="button" src="<?= $image_url . 'annonces/' . $maison['image'] ?>" alt="" class="img-fluid rounded shadow" data-fancybox="gallery">
                        </div>

                        <?php if (!empty($maison['image_2'])) { ?>
                            <div id="image-2" class="col-md-6">
                                <img role="button" src="<?= $image_url . 'annonces/' . $maison['image_2'] ?>" alt="" class="img-fluid rounded shadow" data-fancybox="gallery">
                            </div>
                        <?php } ?>

                        <?php if (!empty($maison['image_3'])) { ?>
                            <div id="image-3" class="col-md-6">
                                <img role="button" src="<?= $image_url . 'annonces/' . $maison['image_3'] ?>" alt="" class="img-fluid rounded shadow" data-fancybox="gallery">
                            </div>
                        <?php } ?>

                        <?php if (!empty($maison['image_4'])) { ?>
                            <div id="image-4" class="col-md-6">
                                <img role="button" src="<?= $image_url . 'annonces/' . $maison['image_4'] ?>" alt="" class="img-fluid rounded shadow" data-fancybox="gallery">
                            </div>
                        <?php } ?>

                        <div class="col-md-6">
                            <div id="map" class="rounded shadow"></div>
                        </div>

                        <div class="bloc-galerie mt-5">

                            <div class="me-4">
                                <img id="1" width="100" height="100" src="<?= $image_url . 'annonces/' . $maison['image'] ?>" alt="" class="img-fluid rounded image-galerie-1">
                            </div>

                            <?php if (!empty($maison['image_2'])) { ?>
                                <div class="me-4">
                                    <img id="2" width="100" height="100" src="<?= $image_url . 'annonces/' . $maison['image_2'] ?>" alt="" class="img-fluid rounded image-galerie-2">
                                </div>
                            <?php } ?>

                            <?php if (!empty($maison['image_3'])) { ?>
                                <div class="me-4">
                                    <img id="3" width="100" height="100" src="<?= $image_url . 'annonces/' . $maison['image_3'] ?>" alt="" class="img-fluid rounded image-galerie-3">
                                </div>
                            <?php } ?>

                            <?php if (!empty($maison['image_4'])) { ?>
                                <div>
                                    <img id="4" width="100" height="100" src="<?= $image_url . 'annonces/' . $maison['image_4'] ?>" alt="" class="img-fluid rounded image-galerie-4">
                                </div>
                            <?php } ?>

                        </div>

                        <div class="col-md-12 mt-4">
                            <hr>
                        </div>

                        <div class="col-md-12 mt-2">
                            <h1 class="h2"><i class="fa-solid fa-puzzle-piece me-2 text-info"></i><?= $maison['pieces'] ?> pièces <?= $maison['title_type'] ?> de <?= $maison['surface'] ?> m² à <?= $maison['location'] ?></h1>
                            <p class="text-dark"><i class="fa-solid fa-map-pin me-2 text-success"></i><?= $maison['rue'] ?>, <?= $maison['code_postal'] ?>, <?= $maison['location'] ?></p>
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
                                        <th scope="row"><?= $maison['surface'] ?> m2</th>
                                        <td><?= $maison['pieces'] ?> pièce<?= ($maison['pieces'] >= 1) ? '' : 's' ?></td>
                                        <td><?= $maison['chambres'] ?> chambre<?= ($maison['chambres'] >= 1) ? '' : 's' ?></td>
                                        <td><?= $maison['title_type'] ?></td>
                                        <td><i class="fa-solid fa-certificate me-1 <?= ($maison['verification'] == 1) ? 'text-success' : 'text-danger' ?>"></i> <?= ($maison['verification'] == 1) ? 'Oui' : 'Non' ?></td>
                                        <td class="text-end"><?= $maison['id'] ?></td>
                                    </tr>

                                </tbody>

                            </table>

                        </div>

                        <div class="col-md-6 bloc-content mt-5">
                            <h3><i class="fa-solid fa-arrows-to-circle me-2 text-danger"></i><?= $maison['title'] ?></h3>
                            <p class="text-dark"><?= $maison['description'] ?></p>

                            <a id="button-contact-modal" href="#" data-bs-toggle="modal" data-bs-target="#contact_prop" class="text-decoration-none text-dark">Vous avez des questions concernant cette location ? Contactez le propriétaire simplement et rapidement en cliquant ici.</a>
                        </div>

                        <div class="col-md-6 mt-5">

                            <div class="row bloc-contact">

                                <div class="col-md-6"><img src="<?= $image_url . 'contact-proprietaire.png' ?>" class="img-fluid" alt=""></div>

                                <div class="col-md-6">

                                    <h3 class="text-end text-warning fw-bold title-price"><?= $maison['prix'] ?> €/mois</h3>

                                    <form id="contact-prop">

                                        <div class="form-group mb-3 form-bloc-email">
                                            <span class="me-3"><i class="fa-regular fa-paper-plane text-success"></i></span>
                                            <input class="form-control" autocomplete="off" required="" id="email_contact" placeholder="Entrez votre adresse email.." type="email" name="email_contact">
                                        </div>

                                        <label class="control control--checkbox mb-0"><span class="caption">J'accepte les conditions générales d'information sur les logements locatifs, les annonces et la politique de gestion des données personnelles de LEP.</span>
                                            <input type="checkbox" id="accept-condition" style="width: 0;" />
                                            <div class="control__indicator"></div>

                                        </label>

                                        <div class="col-md-12 text-end mt-4">
                                            <input type="submit" value="Contacter le proprietaire" id="contact-proprietaire" class="btn btn-block bg-gradient btn-info text-white disabled">
                                        </div>

                                    </form>

                                </div>

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
                    <a class="btn btn-lg btn-success bg-gradient create-annonce-free" href="/location/<?= makeUrl($maison['location']) ?>" role="button">Cliquez ici pour voir toutes les locations de <?= $maison['location'] ?></a>

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

                <form id="contact-prop-2" class="mt-4">

                    <div class="form-group mb-3 form-bloc-email">
                        <span class="me-3"><i class="fa-regular fa-paper-plane text-success"></i></span>
                        <input class="form-control" autocomplete="off" required="" id="email_contact_2" placeholder="Entrez votre adresse email.." type="email" name="email_contact">
                    </div>

                    <label class="control control--checkbox mb-0"><span class="caption">J'accepte les conditions générales d'information sur les logements locatifs, les annonces et la politique de gestion des données personnelles de LEP.</span>
                        <input type="checkbox" id="accept-condition-2" style="width: 0;" />
                        <div class="control__indicator"></div>

                    </label>

                    <div class="col-md-12 text-end mt-4">
                        <input type="submit" value="Contacter le proprietaire" id="contact-proprietaire-2" class="btn btn-block bg-gradient btn-info text-white disabled">
                    </div>

                </form>

            </div>

            <div class="modal-footer text-center d-block pt-3 mb-3">
                <a href="#" data-bs-dismiss="modal" class="text-dark">Non merci, cette propriété ne m'interesse pas</a>
            </div>
        </div>

    </div>

</div>

<script>
    // Map

    var longitude = <?= $maison['longitude'] ?>,
        latitude = <?= $maison['latitude'] ?>;

    const map = L.map('map').setView([longitude, latitude], 13);

    var marker = L.marker([longitude, latitude]).addTo(map);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

    Fancybox.bind('[data-fancybox="gallery"]', {
        l10n: Fancybox.l10n.fr
    });
</script>
