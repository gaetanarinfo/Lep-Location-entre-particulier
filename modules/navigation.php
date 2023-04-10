<nav class="navbar navbar-expand-lg navbar-dark bg-dark nav-fixed">

    <div class="container px-5">

        <a class="navbar-brand hide-mobile" href="/"><img class="me-3" height="50" width="50" src="<?= $image_url ?>favicon.png" alt="<?= $site_config['title'] ?>" /><?= $site_config['title'] ?></a>
        <a class="navbar-brand show-mobile" href="/"><img class="me-3" height="50" width="50" src="<?= $image_url ?>favicon.png" alt="<?= $site_config['title'] ?>" /><?= substr($site_config['title'], 0, 3) ?></a>

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

                    <?php if (!isset($_SESSION['user_id'])) { ?>

                        <li><a class="dropdown-item<?= (basename($_SERVER['PHP_SELF']) == "register.php") ? " active disabled" : ""; ?>" href="register"><i class="fa-solid fa-angle-right me-2"></i>Ajouter une annonce</a></li>

                        <li><a class="dropdown-item<?= (basename($_SERVER['PHP_SELF']) == "login.php") ? " active disabled" : ""; ?>" href="login"><i class="fa-solid fa-angle-left me-2"></i>Connexion</a></li>

                    <?php } else { ?>
                        <li><a class="dropdown-item<?= (basename($_SERVER['PHP_SELF']) == "mon-espace.php") ? " active disabled" : ""; ?>" href="mon-espace"><i class="fa-solid fa-rocket me-2"></i>Mon espace</a></li>
                        <li><a class="dropdown-item<?= (basename($_SERVER['PHP_SELF']) == "annonces.php") ? " active disabled" : ""; ?>" href="annonces"><i class="fa-solid fa-rectangle-list me-2"></i>Mes annonces</a></li>
                        <li><a class="dropdown-item<?= (basename($_SERVER['PHP_SELF']) == "abonnements.php") ? " active disabled" : ""; ?>" href="abonnements"><i class="fa-solid fa-wand-magic-sparkles me-2"></i>Mes abonnements</a></li>
                        <li><a class="dropdown-item<?= (basename($_SERVER['PHP_SELF']) == "coordonees.php") ? " active disabled" : ""; ?>" href="coordonees"><i class="fa-solid fa-user-pen me-2"></i>Gestion de mon compte</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item<?= (basename($_SERVER['PHP_SELF']) == "logout.php") ? " active disabled" : ""; ?>" href="logout"><i class="fa-solid fa-arrow-right-from-bracket me-2"></i>Déconnexion</a></li>
                    <?php } ?>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-question me-2"></i>Aide / Contact</a></li>

                </ul>

            </div>

        </div>



    </div>

</nav>