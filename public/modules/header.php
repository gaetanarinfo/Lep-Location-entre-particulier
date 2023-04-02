<header class="bg-dark py-5">

    <div class="container px-5">

        <div class="row gx-5 align-items-center justify-content-center">

            <?php if ($header_config['position'] == 0) { ?>

                <div class="col-lg-8 col-xl-7 col-xxl-6">

                    <div class="my-5 text-center text-xl-start">

                        <h1 class="display-5 fw-bolder text-white mb-2"><?= $header_config['title'] ?></h1>

                        <p class="lead fw-normal text-white-50 mb-4"><?= $header_config['description'] ?></p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-<?= $header_config['color_bouton_1'] ?> btn-lg px-4 me-sm-3" href="<?= $header_config['url_bouton_1'] ?>"><?= $header_config['title_bouton_1'] ?></a>
                            <a class="btn btn-<?= $header_config['color_bouton_2'] ?> btn-lg px-4" href="<?= $header_config['url_bouton_2'] ?>"><?= $header_config['title_bouton_2'] ?></a>
                        </div>

                    </div>

                </div>

                <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">

                    <div id="headerCarousel" class="carousel slide" data-bs-ride="carousel">

                        <div class="carousel-indicators">

                            <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>

                            <?php if (!empty($header_config['image_2'])) { ?>
                                <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <?php } ?>

                            <?php if (!empty($header_config['image_3'])) { ?>
                                <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            <?php } ?>

                        </div>

                        <div class="carousel-inner">

                            <div class="carousel-item active">
                                <img class="d-block w-100 img-fluid rounded-3 my-5" src="<?= $image_url ?>header/<?= $header_config['image'] ?>" alt="<?= $site_config['title'] ?>" />
                            </div>

                            <?php if (!empty($header_config['image_2'])) { ?>
                                <div class="carousel-item">
                                    <img class="d-block w-100 img-fluid rounded-3 my-5" src="<?= $image_url ?>header/<?= $header_config['image_2'] ?>" alt="<?= $site_config['title'] ?>" />
                                </div>
                            <?php } ?>

                            <?php if (!empty($header_config['image_3'])) { ?>
                                <div class="carousel-item">
                                    <img class="d-block w-100 img-fluid rounded-3 my-5" src="<?= $image_url ?>header/<?= $header_config['image_3'] ?>" alt="<?= $site_config['title'] ?>" />
                                </div>
                            <?php } ?>

                        </div>

                    </div>

                </div>

            <?php } else { ?>

                <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">

                    <div id="headerCarousel" class="carousel slide" data-bs-ride="carousel">

                        <div class="carousel-indicators">

                            <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>

                            <?php if (!empty($header_config['image_2'])) { ?>
                                <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <?php } ?>

                            <?php if (!empty($header_config['image_3'])) { ?>
                                <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            <?php } ?>

                        </div>

                        <div class="carousel-inner">

                            <div class="carousel-item active">
                                <img class="d-block w-100 img-fluid rounded-3 my-5" src="<?= $image_url ?>header/<?= $header_config['image'] ?>" alt="<?= $site_config['title'] ?>" />
                            </div>

                            <?php if (!empty($header_config['image_2'])) { ?>
                                <div class="carousel-item">
                                    <img class="d-block w-100 img-fluid rounded-3 my-5" src="<?= $image_url ?>header/<?= $header_config['image_2'] ?>" alt="<?= $site_config['title'] ?>" />
                                </div>
                            <?php } ?>

                            <?php if (!empty($header_config['image_3'])) { ?>
                                <div class="carousel-item">
                                    <img class="d-block w-100 img-fluid rounded-3 my-5" src="<?= $image_url ?>header/<?= $header_config['image_3'] ?>" alt="<?= $site_config['title'] ?>" />
                                </div>
                            <?php } ?>

                        </div>

                    </div>

                </div>

                <div class="col-lg-8 col-xl-7 col-xxl-6">

                    <div class="my-5 text-center text-xl-start">

                        <h1 class="display-5 fw-bolder text-white mb-2"><?= $header_config['title'] ?></h1>

                        <p class="lead fw-normal text-white-50 mb-4"><?= $header_config['description'] ?></p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-<?= $header_config['color_bouton_1'] ?> btn-lg px-4 me-sm-3" href="<?= $header_config['url_bouton_1'] ?>"><?= $header_config['title_bouton_1'] ?></a>
                            <a class="btn btn-<?= $header_config['color_bouton_2'] ?> btn-lg px-4" href="<?= $header_config['url_bouton_2'] ?>"><?= $header_config['title_bouton_2'] ?></a>
                        </div>

                    </div>

                </div>

            <?php } ?>

        </div>

    </div>

</header>