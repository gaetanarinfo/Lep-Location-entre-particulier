<div class="container marketing mb-4 reveal">

    <div class="row">

        <h3 class="display-5 fw-bolder text-white mb-4"><i class="fa-solid fa-screwdriver-wrench me-3 fs-1"></i>Notre équipe</h3>

        <?php foreach ($marketing_row as $value) { ?>

            <div class="col-lg-3 mb-4">

                <img class="bd-placeholder-img rounded-circle reveal" width="140" height="140" src="<?= $image_url . 'avatar/' . $value['image'] ?>" alt="<?= $value['title'] ?>">

                <h2 class="mt-4 mb-4"><?= $value['title'] ?></h2>

                <p class="fst-italic fw-normal">"<?= $value['description'] ?>"</p>

            </div>

        <?php } ?>

    </div>

</div>