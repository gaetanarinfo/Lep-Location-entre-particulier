<!DOCTYPE html>

<html>

    <head>
       
       <meta charset="UTF-8">
        
        <title><?= $site_config['meta_title'] ?></title>
        <meta name="description" content="<?= $site_config['meta_description'] ?>">
        
        <!-- Feuilles de styles -->
        <link rel="icon" type="image/png" href="<?= $image_url . $site_config['favicon'] ?>" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="<?= $static_url . 'css/styles.css' ?>" rel="stylesheet">

    </head>

    <body class="d-flex flex-column h-100">