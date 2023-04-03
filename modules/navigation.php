<nav class="navbar navbar-expand-lg navbar-dark bg-dark nav-fixed">

    <div class="container px-5">

        <a class="navbar-brand" href="/"><img class="me-3" height="50" width="50" src="<?= $image_url ?>favicon.png" alt="<?= $site_config['title'] ?>" /><?= $site_config['title'] ?></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <?php foreach ($menu_row as $value) { ?>

                    <li class="nav-item me-3"><a class="nav-link fw-bold" href="<?= $value['menu_url'] ?>"><i class="fa-solid <?= $value['menu_icon'] ?> me-2"></i> <?= $value['menu_title'] ?></a></li>

                <?php } ?>

            </ul>

            <div class="dropdown text-start dropdown-user">

                <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="rounded-circle"><i class="fa-regular fa-circle-user"></i></span>
                </a>

                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">

                    <li><a class="dropdown-item" href="nouvelle-annonce"><i class="fa-solid fa-angle-right me-2"></i>Ajouter une annonce</a></li>

                    <li><a class="dropdown-item" href="se-connecter"><i class="fa-solid fa-angle-left me-2"></i>Connexion</a></li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-question me-2"></i>Aide / Contact</a></li>

                </ul>

            </div>

        </div>



    </div>

</nav>