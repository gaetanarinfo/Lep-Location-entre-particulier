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

                            <div class="mb-4 mt-4">
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

                            <div class="mb-4 bloc-forgot-check">
                                <h3>Mot de passe oublié</h3>
                                <p class="mb-4">Simple en deux clic modifier votre mot de passe.</p>
                            </div>

                            <div id="forgot-password-check">

                                <form id="forgot-password-form">

                                    <div class="form-group last mb-4">
                                        <label>
                                            <input type="password" pattern=".{8,}" class="form-control" id="password_forgot_check" placeholder="Mot de passe" required>
                                            <input type="hidden" id="token_forgot_check" value="<?= $_GET['token'] ?>">
                                            <span>Minimum 8 charactères</span>

                                            <div class="password-icon">
                                                <i data-feather="eye"></i>
                                                <i data-feather="eye-off"></i>
                                            </div>
                                        </label>
                                    </div>

                                    <input type="submit" value="Valider" id="button-forgot" class="btn btn-block bg-gradient btn-info text-white">

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</main>

<!-- Footer-->
<?php include('modules/footer.php'); ?>