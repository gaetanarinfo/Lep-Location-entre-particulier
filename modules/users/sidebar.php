<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark sidebar hide-mobile">

    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <img src="<?= $image_url ?>favicon.png" width="40" height="32" class="bi me-2">
        <span class="fs-4">LPE</span>
    </a>

    <hr>

    <ul class="nav nav-pills flex-column mb-auto">

        <li class="nav-item">
            <a href="/mon-espace" class="nav-link text-white <?= (basename($_SERVER['PHP_SELF']) == "mon-espace.php") ? " active disabled" : ""; ?>" aria-current="page">
                <i class="fa-solid fa-rocket me-2"></i>
                Mon espace
            </a>
        </li>

        <li>
            <a href="/mes-locations" class="nav-link text-white <?= (basename($_SERVER['PHP_SELF']) == "mes-locations.php") ? " active disabled" : ""; ?>">
                <i class="fa-solid fa-rectangle-list me-2"></i>
                Mes locations en ligne
            </a>
        </li>

        <li>
            <a href="/abonnements" class="nav-link text-white <?= (basename($_SERVER['PHP_SELF']) == "abonnements.php") ? " active disabled" : ""; ?>">
                <i class="fa-solid fa-wand-magic-sparkles me-2"></i>
                Mes abonnements
            </a>
        </li>

        <li>
            <a href="/coordonees" class="nav-link text-white <?= (basename($_SERVER['PHP_SELF']) == "coordonees.php") ? " active disabled" : ""; ?>">
                <i class="fa-solid fa-user-pen me-2"></i>
                Gestion de mon compte
            </a>
        </li>

        <?php if ($users['subscription'] == 1) { ?>

            <li>
                <hr>
            </li>

            <li>
                <div class="ps-3 pe-3">
                    <i class="fa-solid fa-trophy text-3 me-2"></i><span class="text-3 fw-bold">Membre Pro Premium</span>
                </div>
            </li>

        <?php } ?>

        <?php if ($users['subscription'] <= 0) { ?>

            <li>
                <hr>
            </li>

            <li>
                <div class="text-center">
                    <a href="/cart" class="btn bg-gradient btn-success"><i class="fa-solid fa-cart-plus me-2"></i>Prendre un abonnement</a>
                </div>
            </li>
        <?php } ?>

    </ul>


    <hr>

    <div class="dropdown">

        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="rounded-circle me-2 user-avatar"><i class="fa-regular fa-circle-user"></i></span>
            <strong><?= $users['prenom'] . ' ' . $users['nom'] ?></strong>
        </a>

        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <?php if (!isset($_SESSION['user_id'])) { ?>

                <li><a class="dropdown-item<?= (basename($_SERVER['PHP_SELF']) == "register.php") ? " active disabled" : ""; ?>" href="/register"><i class="fa-solid fa-angle-right me-2"></i>Ajouter une annonce</a></li>

                <li><a class="dropdown-item<?= (basename($_SERVER['PHP_SELF']) == "login.php") ? " active disabled" : ""; ?>" href="/login"><i class="fa-solid fa-angle-left me-2"></i>Connexion</a></li>

            <?php } else { ?>
                <li><a class="dropdown-item<?= (basename($_SERVER['PHP_SELF']) == "mon-espace.php") ? " active disabled" : ""; ?>" href="/mon-espace"><i class="fa-solid fa-rocket me-2"></i>Mon espace</a></li>
                <li><a class="dropdown-item<?= (basename($_SERVER['PHP_SELF']) == "mes-locations.php") ? " active disabled" : ""; ?>" href="/mes-locations"><i class="fa-solid fa-rectangle-list me-2"></i>Mes annonces</a></li>
                <li><a class="dropdown-item<?= (basename($_SERVER['PHP_SELF']) == "abonnements.php") ? " active disabled" : ""; ?>" href="/abonnements"><i class="fa-solid fa-wand-magic-sparkles me-2"></i>Mes abonnements</a></li>
                <li><a class="dropdown-item<?= (basename($_SERVER['PHP_SELF']) == "coordonees.php") ? " active disabled" : ""; ?>" href="/coordonees"><i class="fa-solid fa-user-pen me-2"></i>Gestion de mon compte</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item<?= (basename($_SERVER['PHP_SELF']) == "logout.php") ? " active disabled" : ""; ?>" href="/utilisateurs/logout"><i class="fa-solid fa-arrow-right-from-bracket me-2"></i>Déconnexion</a></li>
            <?php } ?>

        </ul>

    </div>

</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark nav-fixed show-mobile">

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
                        <li><a class="dropdown-item<?= (basename($_SERVER['PHP_SELF']) == "espace.php") ? " active disabled" : ""; ?>" href="espace"><i class="fa-solid fa-rocket me-2"></i>Mon espace</a></li>
                        <li><a class="dropdown-item<?= (basename($_SERVER['PHP_SELF']) == "location.php") ? " active disabled" : ""; ?>" href="annonces"><i class="fa-solid fa-rectangle-list me-2"></i>Mes annonces</a></li>
                        <li><a class="dropdown-item<?= (basename($_SERVER['PHP_SELF']) == "abonnements.php") ? " active disabled" : ""; ?>" href="abonnements"><i class="fa-solid fa-wand-magic-sparkles me-2"></i>Mes abonnements</a></li>
                        <li><a class="dropdown-item<?= (basename($_SERVER['PHP_SELF']) == "coordonees.php") ? " active disabled" : ""; ?>" href="coordonees"><i class="fa-solid fa-user-pen me-2"></i>Gestion de mon compte</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item<?= (basename($_SERVER['PHP_SELF']) == "logout.php") ? " active disabled" : ""; ?>" href="/utilisateurs/logout"><i class="fa-solid fa-arrow-right-from-bracket me-2"></i>Déconnexion</a></li>
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