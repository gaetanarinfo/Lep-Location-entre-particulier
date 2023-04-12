<div class="container px-4 py-5 nouveautes_maison reveal">

    <h2 class="pb-2 border-bottom mb-3">Nos nouveautés côté location maison.</h2>

    <?php if (!empty($maisons_last_row)) { ?>

        <div class="row row-cols-1 row-cols-md-3 g-4 nouveautes_maisons">

            <?php foreach ($maisons_last_row as $value) { ?>

                <div class="col">

                    <div class="card">

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

    <?php } else { ?>

        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </symbol>
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </symbol>
        </svg>

        <div class="previous-alert">

            <div class="alert alert-primary d-flex align-items-center mt-3" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                    <use xlink:href="#info-fill" />
                </svg>
                <div>
                    Aucune nouvelle annonce pour le moment.
                </div>
            </div>

        </div>

    <?php } ?>

</div>