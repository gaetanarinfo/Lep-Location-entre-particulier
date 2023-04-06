<!DOCTYPE html>

<html>

<head>

    <?php include_once('modules/titles.php') ?>

    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <title><?= $title ?></title>
    <meta name="description" content="<?= $site_config['meta_description'] ?>">

    <!-- Feuilles de styles -->
    <link rel="icon" type="image/png" href="<?= $image_url . $site_config['favicon'] ?>" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="<?= $static_url . 'css/styles.css' ?>" rel="stylesheet">

    <?php if (basename($_SERVER['PHP_SELF']) == "login.php" OR basename($_SERVER['PHP_SELF']) == "forgot-password.php") { ?>
        <link href="<?= $static_url . 'css/login.css?=' . time(); ?>" rel="stylesheet">
    <?php } ?>

    <?php if (basename($_SERVER['PHP_SELF']) == "register.php") { ?>
        <link href="<?= $static_url . 'css/register.css?=' . time(); ?>" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <?php } ?>

    <?php if (isset($_SESSION['user_id']) && basename($_SERVER['PHP_SELF']) == "espace.php") { ?>
        <link href="<?= $static_url . 'css/users/espace.css?=' . time(); ?>" rel="stylesheet">
    <?php } ?>

    <!-- Script JS -->
    <script src="<?= $static_url . 'js/6650c3fdcf.js' ?>" crossorigin="anonymous"></script>
    <script src="<?= $static_url ?>js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script src="<?= $static_url . 'js/scripts.js' ?>"></script>
    <?php if (basename($_SERVER['PHP_SELF']) == "login.php" OR basename($_SERVER['PHP_SELF']) == "forgot-password.php") { ?>
        <script src="<?= $static_url . 'js/login.js?=' . time(); ?>"></script>
    <?php } ?>

    <?php if (basename($_SERVER['PHP_SELF']) == "register.php") { ?>
        <script src="<?= $static_url . 'js/register.js?=' . time(); ?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <?php } ?>

    <script src="<?= $static_url . 'js/scrollreveal.js?=' . time(); ?>"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>

</head>

<body class="d-flex flex-column h-100">