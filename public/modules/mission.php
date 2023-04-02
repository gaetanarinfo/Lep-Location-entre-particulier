<section class="py-5 reveal" id="features">

    <div class="container px-5 my-5">

        <div class="row gx-5">

            <div class="col-lg-4 mb-5 mb-lg-0">
                <h2 class="fw-bolder mb-0"><i class="fa-solid fa-mountain-sun fs-3 me-3"></i>Notre mission, vous satisfaire dans vos projets immobiliers.</h2>
            </div>

            <div class="col-lg-8">

                <div class="row gx-5 row-cols-1 row-cols-md-2">

                    <?php foreach ($mission_row as $value) { ?>

                        <div class="col mb-5 h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-building"></i></div>
                            <h2 class="h5"><?= $value['title'] ?></h2>
                            <p class="mb-0"><?= $value['description'] ?></p>
                        </div>

                    <?php } ?>

                </div>

            </div>

        </div>

    </div>

</section>