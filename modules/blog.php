<section class="py-5 reveal">

    <div class="container px-5 my-5">

        <div class="row gx-5 justify-content-center">

            <div class="col-lg-8 col-xl-6">

                <div class="text-center">

                    <h2 class="fw-bolder">Blog immobilier</h2>

                    <p class="lead fw-normal text-muted mb-5">Ne perdez plus de temps à chercher, Retrouvez toutes l'actualité immobilière.</p>

                </div>

            </div>

        </div>

        <div class="row gx-5">

            <?php foreach ($blogs_row as $value) { ?>

                <div class="col-lg-4 mb-5">

                    <div class="card h-100 shadow border-0">

                        <img class="card-img-top" src="<?= $image_url . 'blog/' . $value['image'] ?>" alt="<?= $value['title'] ?>" />

                        <div class="card-body p-4">

                            <div class="badge bg-info bg-gradient rounded-pill mb-3"><?= $value['tag'] ?></div>

                            <a class="text-decoration-none link-dark stretched-link" href="/">
                                <h5 class="card-title mb-3"><?= $value['title'] ?></h5>
                            </a>


                            <p class="card-text mb-0"><?= $value['small_description'] ?></p>

                        </div>

                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">

                            <div class="d-flex align-items-end justify-content-between">

                                <div class="d-flex align-items-center">

                                    <img class="rounded-circle me-3" height="70" width="70" src="<?= $image_url . 'blog/' ?>avatar/73d897d1-0400-4c61-a860-27b2a06296a1.webp" alt="Mickaêl Libert" />

                                    <div class="small">
                                        <div class="fw-bold"><?= $value['author'] ?></div>
                                        <div class="text-muted">Publié le <?= date('d/m/Y', strtotime($value['created_at'])) . ' à ' . date('H:i', strtotime($value['created_at'])) ?></div>
                                        <div class="text-muted">Mis à jour le <?= date('d/m/Y', strtotime($value['updated_at'])) . ' à ' . date('H:i', strtotime($value['updated_at'])) ?></div>
                                    </div>


                                </div>

                            </div>

                            <div class="mt-3 text-end"><span><i class="fa-regular fa-comment me-2 text-success"></i><?= $value['comments'] ?></span><span class="ms-2 me-2"><i class="fa-regular fa-heart me-2 text-danger"></i><?= $value['likes'] ?></span><span><i class="fa-regular fa-eye me-2 text-info"></i><?= $value['views'] ?></span></div>

                        </div>

                    </div>

                </div>

            <?php } ?>

        </div>

        <!-- Newsletter -->
        <?php include('newsletter.php'); ?>

    </div>

</section>