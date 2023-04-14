<!-- Vérification utilisateur -->
<?php require('config/page-verification.php') ?>

<!-- Configuration du site -->
<?php include('config/config.php'); ?>

<!-- Body -->
<?php include('modules/body.php'); ?>

<main class="flex-shrink-0">

    <!-- Navigation-->
    <?php include('modules/navigation.php'); ?>

    <div class="content reveal">

        <div class="container">

            <div class="row mt-1">

                <h1>Recevez les dernières nouvelles de LEP</h1>
                <p class="text-dark">Dernières actualités, conseils et guides pour votre recherche de logement</p>

                <!-- Breadcrump -->
                <?php include('modules/breadcrump.php') ?>

                <div class="row gx-5 mt-4 search_box_actualites">

                    <?php foreach ($blogs_rows as $value) { ?>

                        <div class="col-lg-4 mb-5">

                            <div class="card h-100 shadow border-0">

                                <img class="card-img-top" src="<?= $image_url . 'blog/' . $value['image'] ?>" alt="<?= $value['title'] ?>" />

                                <div class="card-body p-4">

                                    <div class="badge bg-info bg-gradient rounded-pill mb-3"><?= $value['tag'] ?></div>

                                    <a class="text-decoration-none link-dark stretched-link" href="/blog/<?= $value['url'] ?>">
                                        <h5 class="card-title mb-3"><?= $value['title'] ?></h5>
                                    </a>


                                    <p class="card-text mb-0"><?= $value['small_description'] ?></p>

                                </div>

                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">

                                    <div class="d-flex align-items-end justify-content-between">

                                        <div class="d-flex align-items-center">

                                            <img class="rounded-circle me-3" height="70" width="70" src="<?= $image_url . 'blog/avatar/' . $value['avatar'] ?>" alt="<?= $value['author'] ?>" />

                                            <div class="small">
                                                <div class="fw-bold"><?= $value['author'] ?></div>
                                                <div class="text-muted">Publié le <?= date('d/m/Y', strtotime($value['created_at'])) . ' à ' . date('H:i', strtotime($value['created_at'])) ?></div>
                                                <div class="text-muted">Mis à jour le <?= date('d/m/Y', strtotime($value['updated_at'])) . ' à ' . date('H:i', strtotime($value['updated_at'])) ?></div>
                                            </div>


                                        </div>

                                    </div>

                                    <div class="mt-3 text-end"><span class="ms-2 me-2"><i class="fa-regular fa-heart me-2 text-danger"></i><?= $value['likes'] ?></span><span><i class="fa-regular fa-eye me-2 text-info"></i><?= $value['views'] ?></span></div>

                                </div>

                            </div>

                        </div>

                    <?php } ?>

                    <div id="show_news_bloc" class="text-center mt-5">

                        <div class="loader_inf hidden" id="loader-form">
                            <img width="67" height="67" src="<?= $image_url ?>loader.svg">
                        </div>

                        <a href="#" id="show_news" class="btn btn-lg btn-success bg-gradient text-white text-decoration-none"><i class="fa-solid fa-plus me-2 text-white"></i> Voir plus d'actualités</a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</main>

<!-- Footer-->
<?php include('modules/footer.php'); ?>