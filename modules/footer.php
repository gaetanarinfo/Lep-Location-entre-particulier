<div class="container footer_bottom">

    <footer class="bg-dark text-white py-5 mt-auto">

        <div class="row">

            <div class="col-6 col-md-2 mb-3">

                <h5>À propos</h5>

                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="blog" class="nav-link p-0 text-muted">Blog</a></li>
                    <li class="nav-item mb-2"><a href="cgu" class="nav-link p-0 text-muted">Conditions générales d'utilisation</a></li>
                    <li class="nav-item mb-2"><a href="cgv" class="nav-link p-0 text-muted">Conditions générales de vente</a></li>
                    <li class="nav-item mb-2"><a href="help" class="nav-link p-0 text-muted">Aide / Contact</a></li>
                </ul>

            </div>

            <div class="col-6 col-md-2 mb-3">

                <h5>Pour les locataires</h5>

                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Rechercher des propriétés à louer</a></li>
                    <li class="nav-item mb-2"><a href="faq" class="nav-link p-0 text-muted">Aide (FAQ)</a></li>
                </ul>

            </div>

            <div class="col-6 col-md-2 mb-3">

                <h5>Pour les propriétaire</h5>

                <ul class="nav flex-column">
                    <?php if (!isset($_SESSION['user_id'])) { ?>
                        <li class="nav-item mb-2"><a href="/utilisateurs/register" class="nav-link p-0 text-muted">Créer une annonce de location</a></li>
                        <li class="nav-item mb-2"><a href="/utilisateurs/login" class="nav-link p-0 text-muted">Connexion</a></li>
                    <?php } else { ?>
                        <li class="nav-item mb-2"><a class="nav-link p-0 text-muted" href="mon-espace">Mon espace</a></li>
                        <li class="nav-item mb-2"><a class="nav-link p-0 text-muted" href="annonces">Mes annonces</a></li>
                        <li class="nav-item mb-2"><a class="nav-link p-0 text-muted" href="abonnements">Mes abonnements</a></li>
                        <li class="nav-item mb-2"><a class="nav-link p-0 text-muted" href="coordonees">Gestion de mon compte</a></li>
                        <li class="nav-item mb-2"><a class="nav-link p-0 text-muted" href="/utilisateurs/logout">Déconnexion</a></li>
                    <?php } ?>
                </ul>

            </div>

            <div class="col-md-5 offset-md-1 mb-3">

                <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
                    <img height="50" width="50" src="<?= $image_url ?>favicon.png" alt="LEP - Location entre Particulier">
                </a>

                <p class="text-muted">© Copyright &copy; Seigneur Gaëtan - <?= $site_config['title'] ?> - <?= date('Y') ?></p>

            </div>

        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">

            <ul class="list-unstyled d-flex">

                <li class="ms-3">
                    <a class="link-white" href="#">
                        <img src="<?= $image_url . '/socials/facebook.svg' ?>" alt="Facebook" width="24" height="24">
                    </a>
                </li>

                <li class="ms-3">
                    <a class="link-white" href="#">
                        <img src="<?= $image_url . '/socials/twitter.svg' ?>" alt="Twitter" width="24" height="24">
                    </a>
                </li>

                <li class="ms-3">
                    <a class="link-white" href="#">
                        <img src="<?= $image_url . '/socials/linkedin.svg' ?>" alt="Linkedin" width="24" height="24">
                    </a>
                </li>

            </ul>

        </div>

    </footer>

</div>

<a href="#" id="toTopBtn" class="cd-top text-replace js-cd-top cd-top--is-visible cd-top--fade-out" data-abc="true"><i class="fa-solid fa-chevron-up"></i></a>

<?php if (basename($_SERVER['PHP_SELF']) == "login.php" or basename($_SERVER['PHP_SELF']) == "forgot-password.php" or basename($_SERVER['PHP_SELF']) == "location.php") { ?>
    <!-- ICON SCRIPT -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace();
    </script>
<?php } ?>

</body>

</html>