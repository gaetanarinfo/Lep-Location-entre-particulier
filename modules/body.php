<!DOCTYPE html>

<html>

<head>

    <?php include_once('modules/titles.php') ?>

    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <title><?= $title ?></title>
    <meta name="description" content="<?= $description ?>">

    <link rel="apple-touch-icon" sizes="57x57" href="https://<?= $_SERVER['SERVER_NAME'] ?>/public/assets/images/icons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="https://<?= $_SERVER['SERVER_NAME'] ?>/public/assets/images/icons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="https://<?= $_SERVER['SERVER_NAME'] ?>/public/assets/images/icons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="https://<?= $_SERVER['SERVER_NAME'] ?>/public/assets/images/icons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="https://<?= $_SERVER['SERVER_NAME'] ?>/public/assets/images/icons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="https://<?= $_SERVER['SERVER_NAME'] ?>/public/assets/images/icons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="https://<?= $_SERVER['SERVER_NAME'] ?>/public/assets/images/icons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="https://<?= $_SERVER['SERVER_NAME'] ?>/public/assets/images/icons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="https://<?= $_SERVER['SERVER_NAME'] ?>/public/assets/images/icons/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="https://<?= $_SERVER['SERVER_NAME'] ?>/public/assets/images/icons/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://<?= $_SERVER['SERVER_NAME'] ?>/public/assets/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="https://<?= $_SERVER['SERVER_NAME'] ?>/public/assets/images/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://<?= $_SERVER['SERVER_NAME'] ?>/public/assets/images/icons/favicon-16x16.png">
    <link rel="manifest" href="https://<?= $_SERVER['SERVER_NAME'] ?>/public/assets/images/icons/manifest.json">
    <link rel="shortcut icon" href="https://<?= $_SERVER['SERVER_NAME'] ?>/public/assets/images/icons/favicon.ico" type="images/x-icon" />

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="https://<?= $_SERVER['SERVER_NAME'] ?>/public/assets/images/icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Feuilles de styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="<?= $static_url . 'css/styles.css' ?>" rel="stylesheet">

    <?php if (basename($_SERVER['PHP_SELF']) == "login.php" or basename($_SERVER['PHP_SELF']) == "forgot-password.php") { ?>
        <link href="<?= $static_url . 'css/login.css?=' . time(); ?>" rel="stylesheet">
    <?php } ?>

    <?php if (basename($_SERVER['PHP_SELF']) == "register.php") { ?>
        <link href="<?= $static_url . 'css/register.css?=' . time(); ?>" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <?php } ?>

    <?php if (isset($_SESSION['user_id']) && basename($_SERVER['PHP_SELF']) == "mon-espace.php") { ?>
        <link href="<?= $static_url . 'css/users/espace.css?=' . time(); ?>" rel="stylesheet">
    <?php } ?>

    <?php if (isset($_SESSION['user_id']) && basename($_SERVER['PHP_SELF']) == "abonnements.php") { ?>
        <link href="<?= $static_url . 'css/users/espace.css?=' . time(); ?>" rel="stylesheet">
    <?php } ?>

    <?php if (isset($_SESSION['user_id']) && basename($_SERVER['PHP_SELF']) == "mes-locations.php") { ?>
        <link href="<?= $static_url . 'css/users/espace.css?=' . time(); ?>" rel="stylesheet">
    <?php } ?>

    <?php if (isset($_SESSION['user_id']) && basename($_SERVER['PHP_SELF']) == "location-statistiques.php") { ?>
        <link href="<?= $static_url . 'css/users/espace.css?=' . time(); ?>" rel="stylesheet">
        <link href="<?= $static_url . 'css/users/location-statistiques.css?=' . time(); ?>" rel="stylesheet">
    <?php } ?>

    <?php if (isset($_SESSION['user_id']) && basename($_SERVER['PHP_SELF']) == "modification-location.php") { ?>
        <link href="<?= $static_url . 'css/users/espace.css?=' . time(); ?>" rel="stylesheet">
        <link href="<?= $static_url . 'css/users/modification-location.css?=' . time(); ?>" rel="stylesheet">
    <?php } ?>

    <?php if (isset($_SESSION['user_id']) && basename($_SERVER['PHP_SELF']) == "cart.php") { ?>
        <link href="<?= $static_url . 'css/users/cart.css?=' . time(); ?>" rel="stylesheet">
        <link href="<?= $static_url . 'css/stripe.css?=' . time(); ?>" rel="stylesheet">
    <?php } ?>

    <?php if (basename($_SERVER['PHP_SELF']) == "location.php") { ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
        <link href="<?= $static_url . 'css/location.css?=' . time(); ?>" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
        <?php if (empty($_COOKIE['location_email'])) { ?>
            <link href="<?= $static_url . 'css/stripe.css?=' . time(); ?>" rel="stylesheet">
        <?php } ?>
    <?php } ?>

    <?php if (basename($_SERVER['PHP_SELF']) == "cgv.php" or basename($_SERVER['PHP_SELF']) == "cgu.php") { ?>
        <link href="<?= $static_url . 'css/conditions.css?=' . time(); ?>" rel="stylesheet">
    <?php } ?>

    <?php if (basename($_SERVER['PHP_SELF']) == "blog.php") { ?>
        <link href="<?= $static_url . 'css/blog.css?=' . time(); ?>" rel="stylesheet">
    <?php } ?>

    <?php if (basename($_SERVER['PHP_SELF']) == "actualite.php") { ?>
        <link href="<?= $static_url . 'css/actualite.css?=' . time(); ?>" rel="stylesheet">
    <?php } ?>

    <?php if (basename($_SERVER['PHP_SELF']) == "locations.php" or basename($_SERVER['PHP_SELF']) == "locations-appartements.php" or basename($_SERVER['PHP_SELF']) == "locations-maisons.php" or basename($_SERVER['PHP_SELF']) == "locations-populaires.php") { ?>
        <link href="<?= $static_url . 'css/locations.css?=' . time(); ?>" rel="stylesheet">
    <?php } ?>

    <?php if (basename($_SERVER['PHP_SELF']) == "contact.php") { ?>
        <link href="<?= $static_url . 'css/contact.css?=' . time(); ?>" rel="stylesheet">
    <?php } ?>

    <?php if (basename($_SERVER['PHP_SELF']) == "faq.php") { ?>
        <link href="<?= $static_url . 'css/faq.css?=' . time(); ?>" rel="stylesheet">
    <?php } ?>

    <?php if (basename($_SERVER['PHP_SELF']) == "refund.php") { ?>
        <link href="<?= $static_url . 'css/refund.css?=' . time(); ?>" rel="stylesheet">
    <?php } ?>

    <?php if (basename($_SERVER['PHP_SELF']) == "refund-pro.php") { ?>
        <link href="<?= $static_url . 'css/refund.css?=' . time(); ?>" rel="stylesheet">
    <?php } ?>

    <!-- Script JS -->
    <script src="<?= $static_url . 'js/6650c3fdcf.js' ?>" crossorigin="anonymous"></script>
    <script src="<?= $static_url ?>js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

    <script src="<?= $static_url . 'js/scripts.js' ?>"></script>
    <?php if (basename($_SERVER['PHP_SELF']) == "login.php" or basename($_SERVER['PHP_SELF']) == "forgot-password.php") { ?>
        <script src="<?= $static_url . 'js/login.js?=' . time(); ?>"></script>
    <?php } ?>

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>

    <?php if (basename($_SERVER['PHP_SELF']) == "register.php") { ?>
        <script src="<?= $static_url . 'js/register.js?=' . time(); ?>"></script>
    <?php } ?>

    <?php if (basename($_SERVER['PHP_SELF']) == "location.php") { ?>
        <script src="<?= $static_url . 'js/jquery.creditCardValidator.js'; ?>"></script>
        <script src="<?= $static_url . 'js/location.js?=' . time(); ?>"></script>
        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/l10n/fr.umd.js"></script>
        <?php if (empty($_COOKIE['location_email'])) { ?>
            <script src="https://js.stripe.com/v3/"></script>
            <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
            <script src="<?= $static_url . 'js/client.js?=' . time(); ?>"></script>
        <?php } ?>
    <?php } ?>

    <?php if (basename($_SERVER['PHP_SELF']) == "blog.php") { ?>
        <script src="<?= $static_url . 'js/blog.js?=' . time(); ?>"></script>
    <?php } ?>

    <?php if (basename($_SERVER['PHP_SELF']) == "actualite.php") { ?>
        <script src="<?= $static_url . 'js/actualite.js?=' . time(); ?>"></script>
    <?php } ?>

    <?php if (basename($_SERVER['PHP_SELF']) == "locations.php" or basename($_SERVER['PHP_SELF']) == "locations-appartements.php" or basename($_SERVER['PHP_SELF']) == "locations-maisons.php" or basename($_SERVER['PHP_SELF']) == "locations-populaires.php") { ?>
        <script src="<?= $static_url . 'js/locations.js?=' . time(); ?>"></script>
    <?php } ?>

    <?php if (basename($_SERVER['PHP_SELF']) == "contact.php") { ?>
        <script src="<?= $static_url . 'js/contact.js?=' . time(); ?>"></script>
    <?php } ?>

    <?php if (basename($_SERVER['PHP_SELF']) == "refund.php") { ?>
        <script src="<?= $static_url . 'js/refund.js?=' . time(); ?>"></script>
    <?php } ?>

    <?php if (basename($_SERVER['PHP_SELF']) == "refund-pro.php") { ?>
        <script src="<?= $static_url . 'js/users/refund-pro.js?=' . time(); ?>"></script>
    <?php } ?>

    <?php if (isset($_SESSION['user_id']) && basename($_SERVER['PHP_SELF']) == "mon-espace.php") { ?>
        <script src="<?= $static_url . 'js/users/espace.js?=' . time(); ?>"></script>
    <?php } ?>

    <?php if (isset($_SESSION['user_id']) && basename($_SERVER['PHP_SELF']) == "cart.php") { ?>
        <script src="https://js.stripe.com/v3/"></script>
        <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
        <script src="<?= $static_url . 'js/users/cart.js?=' . time(); ?>"></script>
    <?php } ?>

    <?php if (basename($_SERVER['PHP_SELF']) == "/") { ?>
        <script>
            // Carousel Header

            var headerCarousel = document.querySelector('#headerCarousel')

            var carousel = new bootstrap.Carousel(headerCarousel, {
                interval: 2000,
                wrap: false,
                touch: true
            })
            // --------- //
        </script>
    <?php } ?>

    <script src="<?= $static_url . 'js/scrollreveal.js?=' . time(); ?>"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>

    <?php if (basename($_SERVER['PHP_SELF']) == "/") { ?>
        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://<?= $_SERVER['SERVER_NAME'] ?>/">
        <meta property="og:title" content="Louer en toute confiance grâce à LEP">
        <meta property="og:description" content="Consultez toutes les annonces immobilières d'appartements à louer sur toute la France. Trouvez votre futur logement grâce à LEP.">
        <meta property="og:image" content="https://<?= $_SERVER['SERVER_NAME'] ?>/public/assets/images/header/header_1.jpg">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="https://<?= $_SERVER['SERVER_NAME'] ?>/">
        <meta property="twitter:title" content="Louer en toute confiance grâce à LEP">
        <meta property="twitter:description" content="Consultez toutes les annonces immobilières d'appartements à louer sur toute la France. Trouvez votre futur logement grâce à LEP.">
        <meta property="twitter:image" content="https://<?= $_SERVER['SERVER_NAME'] ?>/public/assets/images/header/header_1.jpg">
    <?php } ?>

    <?php

    if (basename($_SERVER['PHP_SELF']) == "location.php") {

        if (!empty($location_req)) {

    ?>
            <!-- Open Graph / Facebook -->
            <meta property="og:type" content="website">
            <meta property="og:url" content="https://<?= $_SERVER['SERVER_NAME'] ?>/locations/<?= $_GET['url'] ?>">
            <meta property="og:title" content="<?= $location_req['pieces'] . ' pièces ' . $location_req['title_type'] . ' de ' . $location_req['surface'] . ' m² à ' . $location_req['location']; ?>">
            <meta property="og:description" content="<?= substr($location_req['description'], 0, 155) ?>">
            <meta property="og:image" content="https://<?= $_SERVER['SERVER_NAME'] ?>/public/assets/images/locations/<?= $location_req['image'] ?>">

            <!-- Twitter -->
            <meta property="twitter:card" content="summary_large_image">
            <meta property="twitter:url" content="https://<?= $_SERVER['SERVER_NAME'] ?>/locations/<?= $_GET['url'] ?>">
            <meta property="twitter:title" content="<?= $location_req['pieces'] . ' pièces ' . $location_req['title_type'] . ' de ' . $location_req['surface'] . ' m² à ' . $location_req['location']; ?>">
            <meta property="twitter:description" content="<?= substr($location_req['description'], 0, 155) ?>">
            <meta property="twitter:image" content="https://<?= $_SERVER['SERVER_NAME'] ?>/public/assets/images/annonces/<?= $location_req['image'] ?>">

        <?php } ?>

    <?php } ?>

    <?php

    if (basename($_SERVER['PHP_SELF']) == "actualite.php") {

        if (!empty($actualite_url)) {

    ?>
            <!-- Open Graph / Facebook -->
            <meta property="og:type" content="website">
            <meta property="og:url" content="https://<?= $_SERVER['SERVER_NAME'] ?>/blog/<?= $_GET['url'] ?>">
            <meta property="og:title" content="<?= $actualite['title']; ?>">
            <meta property="og:description" content="<?= substr($actualite['small_description'], 0, 155) ?>">
            <meta property="og:image" content="https://<?= $_SERVER['SERVER_NAME'] ?>/public/assets/images/blog/<?= $actualite['image'] ?>">

            <!-- Twitter -->
            <meta property="twitter:card" content="summary_large_image">
            <meta property="twitter:url" content="https://<?= $_SERVER['SERVER_NAME'] ?>/blog/<?= $_GET['url'] ?>">
            <meta property="twitter:title" content="<?= $actualite['title']; ?>">
            <meta property="twitter:description" content="<?= substr($actualite['small_description'], 0, 155) ?>">
            <meta property="twitter:image" content="https://<?= $_SERVER['SERVER_NAME'] ?>/public/assets/images/blog/<?= $actualite['image'] ?>">

        <?php } ?>

    <?php } ?>


</head>

<body class="d-flex flex-column h-100">