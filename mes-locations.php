<!-- Vérification utilisateur -->
<?php require('config/user-verification.php') ?>

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

                <div class="mt-4 mb-4">
                    <h4><i class="fa-solid fa-rectangle-list me-2 text-2"></i>Mes Locations</h4>
                </div>

                <div class="mt-4 mb-4">

                    <h4><span class="badge bg-success me-3 py-2"><i class="fa-regular fa-circle-check me-2 text-white"></i>Mes locations en ligne (<?= count($locations_user_all); ?>)</span><span class="badge bg-danger me-3 py-2"><i class="fa-regular fa-circle-xmark me-1 text-white"></i> Mes locations inactive (<?= count($locations_user_all2) ?>)</span></h4>

                    <?php if ($users['subscription'] == 1 or count($locations_user) <= 2) { ?>
                        <div class="d-flex mt-4">
                            <a class="btn bg-gradient btn-outline-info"><i class="fa-regular fa-square-plus me-2"></i>Créer une location</a>
                        </div>
                    <?php } ?>

                </div>

                <div class="container nouveautes_maison locations_user">

                    <div class="row row-cols-1 row-cols-md-4 g-4 nouveautes_maisons">

                        <?php foreach ($locations_user_all as $value) { ?>

                            <div class="col">

                                <?php if ($value['abonnement_expire'] == 0) { ?>
                                    <div class="d-flex bloc-update">
                                        <div class="col-md-12"><i class="fa-solid fa-calendar-days me-1 text-info"></i> Créer le <b><?= date('d/m/Y à H:i', strtotime($value['created_at'])) ?></b></div>
                                    </div>

                                    <hr>

                                <?php } ?>

                                <div class="d-flex bloc-update">

                                    <?php if ($value['abonnement_expire'] == 1) { ?>
                                        <div class="abonnement-expiree">
                                            <span class="text-danger fw-bold"><i class="fa-sharp fa-regular fa-circle-xmark me-2 text-danger"></i>Abonnement expirée</span>
                                        </div>
                                    <?php } else { ?>
                                        <div class="col me-2 text-start"><a href="/location-statistiques/<?= $value['url'] ?>" class="statistiques text-decoration-none fw-bold text-dark"><i class="fa-solid fa-signal me-2 text-3"></i>Statistiques</a></div>
                                        <div class="col text-center"><a data-id="<?= $value['id'] ?>" class="update-location text-decoration-none fw-bold text-dark"><i class="fa-solid fa-file-pen me-1 text-success"></i> Modifier</a></div>
                                        <div class="col text-end"><a data-id="<?= $value['id'] ?>" class="remove-location text-decoration-none fw-bold text-dark"><i class="fa-solid fa-trash-can me-1 text-danger"></i> Supprimer</a></div>
                                    <?php } ?>

                                </div>

                                <hr>

                                <div class="card<?= ($value['abonnement_expire'] == 1) ? ' disabled' : '' ?>">
                                    <?php if (date('Y-m-d H:i', strtotime($value['created_at'])) < date('Y-m-d H:i', strtotime('+7 days'))) { ?>
                                        <div class="badge_new">
                                            <span class="badge rounded-pill bg-danger">Nouveau !</span>
                                        </div>
                                    <?php } ?>

                                    <div class="location">

                                        <div id="locaMCarousel_<?= $value['id'] ?>" class="carousel slide" data-bs-ride="carousel">

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

                                            <button class="carousel-control-prev" type="button" data-bs-target="#locaMCarousel_<?= $value['id'] ?>" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Précédent</span>
                                            </button>

                                            <button class="carousel-control-next" type="button" data-bs-target="#locaMCarousel_<?= $value['id'] ?>" data-bs-slide="next">
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

                                        <a href="/locations/<?= $value['url'] ?>" target="_blank" class="text-decoration-none">
                                            <div>
                                                <span>Voir le bien</span>
                                            </div>
                                        </a>

                                    </div>

                                </div>

                            </div>

                        <?php } ?>

                    </div>

                </div>

                <hr class="mb-5 mt-5">

            </div>

        </div>

    </div>

</main>

<!-- Footer-->
<?php include('modules/footer.php'); ?>