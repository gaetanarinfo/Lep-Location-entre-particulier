<!-- Configuration du site -->
<?php include('config/config.php'); ?>

<!-- Body -->
<?php include('modules/body.php'); ?>

<main class="flex-shrink-0">

    <!-- Navigation-->
    <?php include('modules/navigation.php'); ?>

    <div class="content reveal">

        <div class="container mb-5">

            <div class="row">

                <h1 class="h3 mb-4">Maisons ou appartement en location en France - voir toutes les maisons et appartement locatives vacantes en France</h1>

                <!-- Breadcrump -->
                <?php include('modules/breadcrump.php') ?>

                <div class="d-flex grid-locations">

                    <div class="col-md-8 mt-4 first-col me-4 pe-3">

                        <div class="row row-cols-1 row-cols-md-3 g-4 locations">

                            <?php foreach ($locations as $value) { ?>

                                <div class="col">

                                    <div class="card">

                                        <?php if (date('Y-m-d H:i', strtotime($value['created_at'])) < date('Y-m-d H:i', strtotime('+7 days'))) { ?>
                                            <div class="badge_new">
                                                <span class="badge rounded-pill bg-danger">Nouveau !</span>
                                            </div>
                                        <?php } ?>

                                        <div class="location">


                                            <div id="locaCarousel_<?= $value['id'] ?>" class="carousel slide" data-bs-ride="carousel">

                                                <div class="carousel-inner">

                                                    <div class="carousel-item active">
                                                        <img class="card-img-top" src="<?= $image_url . 'annonces/' . $value['image'] ?>" alt="<?= $value['title_type'] . ' de ' . $value['surface'] . ' m2 à ' . $value['location'] ?>" />
                                                    </div>

                                                    <?php if (!empty($value['image_2'])) { ?>
                                                        <div class="carousel-item">
                                                            <img class="card-img-top" src="<?= $image_url . 'annonces/' . $value['image_2'] ?>" alt="<?= $value['title_type'] . ' de ' . $value['surface'] . ' m2 à ' . $value['location'] ?>" />
                                                        </div>
                                                    <?php } ?>

                                                    <?php if (!empty($value['image_3'])) { ?>
                                                        <div class="carousel-item">
                                                            <img class="card-img-top" src="<?= $image_url . 'annonces/' . $value['image_3'] ?>" alt="<?= $value['title_type'] . ' de ' . $value['surface'] . ' m2 à ' . $value['location'] ?>" />
                                                        </div>
                                                    <?php } ?>


                                                    <?php if (!empty($value['image_4'])) { ?>
                                                        <div class="carousel-item">
                                                            <img class="card-img-top" src="<?= $image_url . 'annonces/' . $value['image_4'] ?>" alt="<?= $value['title_type'] . ' de ' . $value['surface'] . ' m2 à ' . $value['location'] ?>" />
                                                        </div>
                                                    <?php } ?>

                                                </div>

                                                <button class="carousel-control-prev" type="button" data-bs-target="#locaCarousel_<?= $value['id'] ?>" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Précédent</span>
                                                </button>

                                                <button class="carousel-control-next" type="button" data-bs-target="#locaCarousel_<?= $value['id'] ?>" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Suivant</span>
                                                </button>

                                            </div>

                                            <div class="bandeau">
                                                <span>
                                                    <i class="fa-solid fa-map-pin me-1"></i> <?= $value['location'] ?>
                                                </span>
                                            </div>

                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title"><?= $value['title_type'] . ' de ' . $value['surface'] . ' m<sup>2</sup> à ' . $value['location'] ?></h5>
                                            <p class="card-text"><?= $value['rue'] ?></p>
                                        </div>

                                        <div class="details">

                                            <div>
                                                <p><i class="fa-solid fa-meteor"></i></p>
                                                <p>Surface</p>
                                                <p><?= $value['surface'] ?> m<sup>2</sup></p>
                                            </div>

                                            <div>
                                                <p><i class="fa-solid fa-puzzle-piece"></i></p>
                                                <p>Pièces</p>
                                                <p><?= $value['pieces'] ?></p>
                                            </div>

                                            <div>
                                                <p><i class="fa-solid fa-house"></i></p>
                                                <p>Type</p>
                                                <p><?= $value['title_type'] ?></p>
                                            </div>

                                        </div>

                                        <div class="footer">

                                            <div>
                                                <span><?= $value['prix'] ?> €/mois</span>
                                            </div>

                                            <div></div>

                                            <a href="/locations/<?= $value['url'] ?>" class="text-decoration-none">
                                                <div>
                                                    <span>Voir le bien</span>
                                                </div>
                                            </a>

                                        </div>

                                    </div>

                                </div>

                            <?php } ?>

                        </div>

                        <div class="error" <?= (empty($locations)) ? 'style="display: block;"' : '' ?>>
                            <img src="<?= $image_url . 'no-search-results.svg' ?>" class="img-fluid mt-5 mb-5">
                            <h3 class="mb-4">Oups ! Nous n'avons trouvé aucune location pour cette recherche.</h3>
                            <p class="text-dark">Nous n'avons pas encore de logement à vous proposer pour votre recherche.</p>
                        </div>

                        <div class="loader_inf hidden" id="loader-form">
                            <img width="67" height="67" src="<?= $image_url . 'loader.svg' ?>">
                        </div>

                    </div>

                    <div class="col-md-4 mt-4">

                        <div class="d-flex bloc-filter-remove">
                            <div class="filter text-start" style="display: none;">
                                <a id="remove_filter" class="btn btn-outline-info"><i class="fa-solid fa-eraser me-2"></i><b>Effacer les filtres</b></a>
                            </div>
                            <p class="text-dark text-end fw-bold">Afficher les <?= count($locations) ?> résultats</p>
                        </div>

                        <hr>

                        <div class="row justify-content-center bloc-form">

                            <div class="col-md-12 mb-4">

                                <div class="form-group mb-3">
                                    <div class="form-group mb-3">
                                        <label>Localisation</label>
                                        <input class="form-control" autocomplete="off" id="location" placeholder="Code postal, ville ou région" type="text" name="location">
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="type_propriete">Type</label>
                                    <select class="form-select" aria-label="Type de propriété" id="type_propriete" name="type_propriete">
                                        <option value="0">Tous</option>
                                        <option value="7">Maison</option>
                                        <option value="1">Appartement</option>
                                        <option value="4">Duplex</option>
                                        <option value="5">Loft</option>
                                        <option value="3">Chambre</option>
                                        <option value="6">Appartement étudiant</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label text-dark prix"><i class="fa-solid fa-chevron-right me-2"></i>Loyer principale <span class="ms-1 text-warning">(</span><span class="text-warning rangePrix">2500</span><span class="text-warning"> €)</span></label>
                                    <input type="range" class="form-range" min="0" max="2500" step="250" value="2500" id="loyer_propriete">
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label text-dark prix"><i class="fa-solid fa-chevron-right me-2"></i>Chambre(s) <span class="ms-1 text-warning">(</span><span class="text-warning rangeChambres">1</span><span class="text-warning">)</span></label>
                                    <input type="range" class="form-range" min="1" max="8" step="1" value="1" id="chambres_propriete">
                                </div>

                                <div class="form-group">
                                    <label class="form-label text-dark prix"><i class="fa-solid fa-chevron-right me-2"></i>Pièce(s) <span class="ms-1 text-warning">(</span><span class="text-warning rangePieces">1</span><span class="text-warning">)</span></label>
                                    <input type="range" class="form-range" min="1" max="8" step="1" value="1" id="pieces_propriete">
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</main>

<!-- Footer-->
<?php include('modules/footer.php'); ?>