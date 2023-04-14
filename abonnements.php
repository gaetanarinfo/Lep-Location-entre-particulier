<!-- Vérification utilisateur -->
<?php require('config/user-verification.php') ?>

<!-- Configuration du site -->
<?php include('config/config.php'); ?>

<!-- Body -->
<?php include('modules/body.php'); ?>

<main class="flex-shrink-0">

    <div class="container-fluid">

        <div class="row">

            <!-- SideBar -->
            <?php include('modules/users/sidebar.php'); ?>

            <div class="col-md-9 ms-sm-auto ps-0 pe-4 col-lg-10 page">

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

                    <h1 class="h2"><i class="fa-regular fa-face-smile-wink me-1 text-dark"></i> Bonjour <?= $users['prenom'] ?>, bienvenue sur votre espace</h1>

                </div>

                <div class="mt-4 mb-4">
                    <h4><i class="fa-solid fa-wand-magic-sparkles me-2 text-1"></i>Mes abonnements</h4>
                </div>

                <div class="container nouveautes_maison locations_user mb-4">

                    <?php if ($users['subscription'] == 1) { ?>

                        <div class="subscriptions row row-cols-1 row-cols-md-3 g-4">

                            <?php foreach ($subscriptions_all as $value) { ?>

                                <?php if ($value['status'] == 2) { ?>

                                    <div class="col">

                                        <div class="card">

                                            <h5 class="card-header"><i class="fa-solid fa-flag-checkered me-2 text-success"></i>Abonnement - LPE PRO - <?= date('d/m/Y', strtotime($value['paiement_date'])) . ' à ' . date('H:i', strtotime($value['paiement_date'])) ?></h5>

                                            <div class="card-body">
                                                <h5 class="card-title"><i class="fa-sharp fa-regular fa-circle-check me-2 text-success"></i>Abonnement actif</h5>
                                                <p class="card-text">Votre abonnement prendra fin le <?= date('d/m/Y', strtotime('+1 month ' . $value['paiement_date'])) . ' à ' . date('H:i', strtotime($value['paiement_date'])) ?>.</p>
                                            </div>

                                        </div>

                                    </div>

                                <?php } ?>

                                <?php if ($value['status'] == 5) { ?>

                                    <div class="col">

                                        <div class="card">

                                            <h5 class="card-header"><i class="fa-solid fa-flag-checkered me-2 text-danger"></i>Abonnement - LPE PRO - <?= date('d/m/Y', strtotime($value['paiement_date'])) . ' à ' . date('H:i', strtotime($value['paiement_date'])) ?></h5>

                                            <div class="card-body">
                                                <h5 class="card-title"><i class="fa-sharp fa-regular fa-circle-xmark me-2 text-danger"></i>Abonnement inactif</h5>
                                                <p class="card-text">Votre abonnement a pris fin le <?= date('d/m/Y', strtotime('+1 month ' . $value['paiement_date'])) . ' à ' . date('H:i', strtotime($value['paiement_date'])) ?>.</p>
                                            </div>

                                        </div>

                                    </div>

                                <?php } ?>

                            <?php } ?>

                        </div>

                    <?php } else { ?>

                        <?php if (!empty($subscriptions_all)) { ?>

                            <div class="subscriptions row row-cols-1 row-cols-md-3 g-4 mb-4">

                                <?php foreach ($subscriptions_all as $value) { ?>

                                    <?php if ($value['status'] == 5) { ?>

                                        <div class="col">

                                            <div class="card">

                                                <h5 class="card-header"><i class="fa-solid fa-flag-checkered me-2 text-danger"></i>Abonnement - LPE PRO - <?= date('d/m/Y', strtotime($value['paiement_date'])) . ' à ' . date('H:i', strtotime($value['paiement_date'])) ?></h5>

                                                <div class="card-body">
                                                    <h5 class="card-title"><i class="fa-sharp fa-regular fa-circle-xmark me-2 text-danger"></i>Abonnement inactif</h5>
                                                    <p class="card-text">Votre abonnement a pris fin le <?= date('d/m/Y', strtotime('+1 month ' . $value['paiement_date'])) . ' à ' . date('H:i', strtotime($value['paiement_date'])) ?>.</p>
                                                </div>

                                            </div>

                                        </div>

                                    <?php } ?>

                                <?php } ?>

                            </div>

                        <?php } else { ?>

                            <div class="previous-alert">

                                <div class="alert alert-primary d-flex align-items-center mt-3" role="alert">

                                    <i class="fa-solid fa-wand-magic-sparkles me-2"></i>

                                    <div>
                                        Vous n'avez pas encore d'abonnement en cours !
                                    </div>

                                </div>

                            </div>

                        <?php } ?>

                        <div class="text-center mt-2">
                            <a href="/cart" class="btn bg-gradient btn-outline-success btn-lg"><i class="fa-solid fa-cart-plus me-2"></i>Prendre un abonnement</a>
                        </div>

                    <?php } ?>

                </div>

            </div>

        </div>

    </div>

</main>

<!-- Footer-->
<?php include('modules/footer.php'); ?>