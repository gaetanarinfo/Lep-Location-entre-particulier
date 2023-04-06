<div class="container px-4 py-5 ville-populaire reveal">

    <h2 class="pb-2 border-bottom">Trouvez un logement dans les villes populaires</h2>

    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">

        <?php foreach ($ville_populaire_row as $value) { ?>

            <div class="col">

                <a class="text-decoration-none" href="<?= $value['url'] ?>">

                    <div class="card card-cover h-100 overflow-hidden text-white bg-white rounded-5 shadow-lg" style="background-image: url('<?= $image_url . 'populaire_ville/' . $value['image'] ?>');">

                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-5 mt-4 mb-5 display-6 lh-1 fw-bold"><?= $value['title'] ?></h2>
                        </div>

                    </div>

                </a>

            </div>

        <?php } ?>

    </div>

</div>