<!-- Configuration du site -->
<?php include('config/config.php'); ?>

<!-- Body -->
<?php include('modules/body.php'); ?>

<main class="flex-shrink-0">

    <!-- Navigation-->
    <?php include('modules/navigation.php'); ?>

    <div class="content">

        <div class="container">

            <div class="row">

                <div class="col-md-6">
                    <img src="<?= $image_url ?>login.svg" alt="Image" class="img-fluid">
                </div>

                <div class="col-md-6 contents">

                    <div class="row justify-content-center">

                        <div class="col-md-8">

                            <div class="mb-4">
                                <h3>Connexion</h3>
                                <p class="mb-4">Rapide et sécurisé c'est tout.</p>
                            </div>

                            <form action="#" method="post">

                                <div class="form-group first">
                                    <label for="email">Adresse email</label>
                                    <input type="email" class="form-control" id="email_login" required>
                                </div>

                                <div class="form-group last mb-4">
                                    <label for="password">Mot de passe</label>
                                    <input type="password" class="form-control" id="password" required>
                                </div>

                                <div class="d-flex mb-5 align-items-center justify-content-between">
                                    
                                    <label class="control control--checkbox mb-0"><span class="caption">Rester connecté ?</span>
                                        <input type="checkbox" checked="checked" />
                                        <div class="control__indicator"></div>
                                    </label>

                                    <span class="ml-auto"><a href="#" class="forgot-pass">Mot de passe oublié</a></span>
                                </div>

                                <input type="submit" value="Connexion" class="btn btn-block btn-primary">

                                <span class="d-block text-left my-4 text-muted">&mdash; ou connectez-vous avec &mdash;</span>

                                <div class="social-login">

                                    <a href="#" class="facebook">
                                        <span class="icon-facebook mr-3"></span>
                                    </a>

                                    <a href="#" class="twitter">
                                        <span class="icon-twitter mr-3"></span>
                                    </a>

                                    <a href="#" class="google">
                                        <span class="icon-google mr-3"></span>
                                    </a>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</main>

<!-- Footer-->
<?php include('modules/footer.php'); ?>