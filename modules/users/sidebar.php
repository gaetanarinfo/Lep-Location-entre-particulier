<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark sidebar">

    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <img src="<?= $image_url ?>favicon.png" width="40" height="32" class="bi me-2">
        <span class="fs-4">LPE</span>
    </a>

    <hr>

    <ul class="nav nav-pills flex-column mb-auto">

        <li class="nav-item">
            <a href="/espace" class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "espace.php") ? " active disabled" : ""; ?>" aria-current="page">
                <i class="fa-solid fa-rocket me-2"></i>
                Mon espace
            </a>
        </li>

        <li>
            <a href="/annonces" class="nav-link text-white <?= (basename($_SERVER['PHP_SELF']) == "annonces.php") ? " active disabled" : ""; ?>">
                <i class="fa-solid fa-rectangle-list me-2"></i>
                Mes annonces active
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

    </ul>

    <hr>

    <div class="dropdown">

        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="rounded-circle me-2 user-avatar"><i class="fa-regular fa-circle-user"></i></span>
            <strong><?= $users['prenom'] . ' ' . $users['nom'] ?></strong>
        </a>

        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <?php if (!isset($_SESSION['user_id'])) { ?>

                <li><a class="dropdown-item<?= (basename($_SERVER['PHP_SELF']) == "register.php") ? " active disabled" : ""; ?>" href="register"><i class="fa-solid fa-angle-right me-2"></i>Ajouter une annonce</a></li>

                <li><a class="dropdown-item<?= (basename($_SERVER['PHP_SELF']) == "login.php") ? " active disabled" : ""; ?>" href="login"><i class="fa-solid fa-angle-left me-2"></i>Connexion</a></li>

            <?php } else { ?>
                <li><a class="dropdown-item<?= (basename($_SERVER['PHP_SELF']) == "espace.php") ? " active disabled" : ""; ?>" href="espace"><i class="fa-solid fa-rocket me-2"></i>Mon espace</a></li>
                <li><a class="dropdown-item<?= (basename($_SERVER['PHP_SELF']) == "annonces.php") ? " active disabled" : ""; ?>" href="annonces"><i class="fa-solid fa-rectangle-list me-2"></i>Mes annonces</a></li>
                <li><a class="dropdown-item<?= (basename($_SERVER['PHP_SELF']) == "abonnements.php") ? " active disabled" : ""; ?>" href="abonnements"><i class="fa-solid fa-wand-magic-sparkles me-2"></i>Mes abonnements</a></li>
                <li><a class="dropdown-item<?= (basename($_SERVER['PHP_SELF']) == "coordonees.php") ? " active disabled" : ""; ?>" href="coordonees"><i class="fa-solid fa-user-pen me-2"></i>Gestion de mon compte</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item<?= (basename($_SERVER['PHP_SELF']) == "logout.php") ? " active disabled" : ""; ?>" href="logout"><i class="fa-solid fa-arrow-right-from-bracket me-2"></i>Déconnexion</a></li>
            <?php } ?>

        </ul>

    </div>

</div>