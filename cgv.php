<!-- Vérification utilisateur -->
<?php require('config/page-verification.php') ?>

<!-- Configuration du site -->
<?php include('config/config.php'); ?>

<!-- Body -->
<?php include('modules/body.php'); ?>

<main class="flex-shrink-0">

    <!-- Navigation-->
    <?php include('modules/navigation.php'); ?>

    <div class="content reveal">

        <div class="container">

            <div class="row mt-1">

                <object data="<?= 'documents/cgv.pdf' ?>" type="application/pdf" width="100%" height="1200px">
                    <p>Impossible d'afficher le fichier PDF. <a href="<?= $static_url . 'documents/cgv.pdf' ?>">Télécharger</a> plutôt.</p>
                </object>

            </div>

        </div>

    </div>

</main>

<!-- Footer-->
<?php include('modules/footer.php'); ?>