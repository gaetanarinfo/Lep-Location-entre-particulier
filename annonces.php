<!-- Vérification utilisateur -->
<?php require('config/page-verification.php') ?>

<!-- Configuration du site -->
<?php include('config/config.php'); ?>

<!-- Body -->
<?php include('modules/body.php'); ?>

<?php if (basename($_SERVER['PHP_SELF']) == 'annonces.php' && !empty($appartement_url) && empty($maison_url)) { ?>
    <!-- Appartement -->
    <?php include('modules/locations/appartement.php') ?>
<?php } ?>

<?php if (basename($_SERVER['PHP_SELF']) == 'annonces.php' && empty($appartement_url) && !empty($maison_url)) { ?>
    <!-- Maison -->
    <?php include('modules/locations/maison.php') ?>
<?php } ?>

<!-- Footer-->
<?php include('modules/footer.php'); ?>