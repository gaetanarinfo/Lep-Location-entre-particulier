<div class="container px-4 py-5 nouveautes_appartements">

    <h2 class="pb-2 border-bottom mb-3">Nos nouveautés côté location appartement.</h2>

    <div class="row row-cols-1 row-cols-md-3 g-4">

        <?php foreach ($appartements_last_row as $value) { ?>

            <div class="col">

                <div class="card">

                    <div class="badge_new">
                        <span class="badge rounded-pill bg-danger">Nouveau !</span>
                    </div>

                    <div class="location">


                        <div id="locaCarousel_<?= $value['id'] ?>" class="carousel slide" data-bs-ride="carousel">

                            <div class="carousel-inner">

                                <div class="carousel-item active">
                                    <img class="card-img-top" src="<?= $image_url . 'appartements/' . $value['image'] ?>" alt="<?= $value['title_type'] . ' de ' . $value['surface'] . ' m<sup>2</sup> à ' . $value['location'] ?>" />
                                </div>

                                <?php if (!empty($value['image_2'])) { ?>
                                    <div class="carousel-item">
                                        <img class="card-img-top" src="<?= $image_url . 'appartements/' . $value['image_2'] ?>" alt="<?= $value['title_type'] . ' de ' . $value['surface'] . ' m<sup>2</sup> à ' . $value['location'] ?>" />
                                    </div>
                                <?php } ?>

                                <?php if (!empty($value['image_3'])) { ?>
                                    <div class="carousel-item">
                                        <img class="card-img-top" src="<?= $image_url . 'appartements/' . $value['image_3'] ?>" alt="<?= $value['title_type'] . ' de ' . $value['surface'] . ' m<sup>2</sup> à ' . $value['location'] ?>" />
                                    </div>
                                <?php } ?>


                                <?php if (!empty($value['image_4'])) { ?>
                                    <div class="carousel-item">
                                        <img class="card-img-top" src="<?= $image_url . 'appartements/' . $value['image_4'] ?>" alt="<?= $value['title_type'] . ' de ' . $value['surface'] . ' m<sup>2</sup> à ' . $value['location'] ?>" />
                                    </div>
                                <?php } ?>

                                <?php if (!empty($value['image_3'])) { ?>
                                    <div class="carousel-item">
                                        <img class="card-img-top" src="<?= $image_url . 'appartements/' . $value['image_5'] ?>" alt="<?= $value['title_type'] . ' de ' . $value['surface'] . ' m<sup>2</sup> à ' . $value['location'] ?>" />
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

                        <a href="" class="text-decoration-none">
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