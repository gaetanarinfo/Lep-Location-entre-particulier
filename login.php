<!-- Vérification utilisateur -->
<?php require('config/user-verification.php') ?>

<!-- Configuration du site -->
<?php include('config/config.php'); ?>

<!-- Body -->
<?php include('modules/body.php'); ?>

<main class="flex-shrink-0">

    <!-- Navigation-->
    <?php include('modules/navigation.php'); ?>

    <div class="content reveal">

        <div class="container">

            <div class="row">

                <div class="col-md-6">
                    <img src="<?= $image_url ?>login.svg" alt="Image" class="img-fluid">
                </div>

                <div class="col-md-6 contents">

                    <div class="row justify-content-center">

                        <div class="message-validation">

                            <div>
                                <img class="message-icone" src="">
                            </div>

                            <div>
                                <h3 class="message-title"></h3>
                            </div>

                            <div class="mb-4">
                                <p class="message-body"></p>
                            </div>

                            <div class="mb-4 back-login">
                                <a id="back-login" class="btn btn-outline-dark text-decoration-none fw-bold">Retour</a>
                            </div>

                        </div>


                        <div class="col-md-8">

                            <div class="loader_inf hidden" id="loader-form">
                                <img width="67" height="67" src="<?= $image_url . 'loader.svg' ?>">
                            </div>

                            <div class="mb-4 bloc-form">
                                <h3>Connexion</h3>
                                <p class="mb-4">Rapide et sécurisé c'est tout.</p>
                            </div>

                            <form id="login" class="bloc-form">

                                <div class="form-group first mb-3">
                                    <input type="email" class="form-control" id="email_login" placeholder="Adresse email" required>
                                </div>

                                <div class="form-group last mb-4">
                                    <label>
                                        <input type="password" pattern=".{8,}" class="form-control" id="password_login" placeholder="Mot de passe" required>
                                        <span>Minimum 8 charactères</span>

                                        <div class="password-icon">
                                            <i data-feather="eye"></i>
                                            <i data-feather="eye-off"></i>
                                        </div>
                                    </label>
                                </div>

                                <div class="d-flex mb-5 align-items-center justify-content-between">

                                    <label class="control control--checkbox mb-0"><span class="caption">Rester connecté ?</span>
                                        <input type="checkbox" id="connect_login" />
                                        <div class="control__indicator"></div>
                                    </label>

                                    <span class="ml-auto"><a href="forgot-password" class="forgot-password">Mot de passe oublié</a></span>
                                </div>

                                <input type="submit" value="Connexion" id="button-login" class="btn btn-block bg-gradient btn-info text-white">
                                <div id='recaptcha' class="g-recaptcha" data-sitekey="6Ld3v1AlAAAAAN-WwC2MQYPo19jBSBpMYZSWV4eV" data-callback="recaptchacheck" data-size="invisible"></div>

                                <span class="d-block text-left my-4 text-muted">&mdash; Ou connectez-vous avec &mdash;</span>

                                <div class="social-login">

                                    <a href="#" class="facebook me-2">
                                        <span class="icon-facebook me-3"></span>
                                    </a>

                                    <a href="#" class="twitter me-2">
                                        <span class="icon-twitter me-3"></span>
                                    </a>

                                    <a href="#" class="google">
                                        <span class="icon-google me-3"></span>
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