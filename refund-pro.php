<!-- Vérification utilisateur -->
<?php require('config/page-verification.php'); ?>

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

                <h1 class="h3 mb-4">Demander le remboursement de votre abonnement</h1>
                <h5 class="mb-4">Plusieurs choix s'offre à vous ! Faite le bon.</h5>

                <div class="prev-grid d-flex">

                    <div class="d-flex grid-refund">

                        <div class="col-md-6 me-3">
                            <img src="<?= $image_url . 'refund.png' ?>" class="img-fluid img-refund">
                        </div>

                        <?php if ($refund['status'] == "2" OR $refund['status'] == "5") { ?>

                            <div class="col-md-6">

                                <div class="loader_inf hidden" id="loader-form">
                                    <img width="67" height="67" src="<?= $image_url . 'loader.svg' ?>">
                                </div>

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

                                <div class="bloc-refund">
                                    <p class="fw-bold text-dark h5 mb-3"><i class="fa-solid fa-plus me-2"></i>Je garde l'offre que j'ai actuellement !</p>
                                    <a href="/mon-espace" class="btn btn-success bg-gradient btn-lg text-decoration-none text-white"><i class="fa-solid fa-check me-2"></i>Valider le changement</a>
                                </div>

                                <hr class="mt-4 mb-4 bloc-refund">

                                <div class="bloc-refund">
                                    <p class="fw-bold text-dark h5 mb-3"><i class="fa-solid fa-plus me-2"></i>Je résilie mon abonnement sans frais !</p>
                                    <input type="hidden" name="token" id="token" value="<?= $refund['token'] ?>">
                                    <a id="refund-validate" class="btn btn-danger bg-gradient btn-lg text-decoration-none text-white"><i class="fa-solid fa-xmark me-2"></i>Valider le changement</a>
                                </div>

                            </div>

                        <?php } ?>

                        <?php if ($refund['status'] == 4) { ?>

                            <div class="col-md-6">

                                <div class="message-validation message-success d-block">

                                    <div>
                                        <img class="message-icone" src="<?= $image_url . 'check.png' ?>">
                                    </div>

                                    <div>
                                        <h3 class="message-title">En attente de remboursement</h3>
                                    </div>

                                    <div class="mb-4 mt-4">
                                        <p class="message-body">Vous avez déjà demandé un remboursement pour cet abonnement.<br/><br/>Merci de patienter quelque jours, si toutefois vous ne recevez rien, merci de nous contacter dans les plus brefs délais.<br /><br />
                                        <h4>A très bientôt.</h4>
                                        </p>
                                    </div>

                                </div>

                            </div>

                        <?php } ?>

                    </div>

                </div>

                <p class="mt-4 mb-0 text-dark fw-bold small">* En résiliant votre offre vous perdez tous vos avantages sur LEP.</p>
                <p class="text-dark fw-bold small">* Selon nos conditions de remboursement, vous avez 14 jours pour le demander.</p>

            </div>

        </div>

    </div>

</main>

<!-- Footer-->
<?php include('modules/footer.php'); ?>