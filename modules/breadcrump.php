<?php if (basename($_SERVER['PHP_SELF']) == 'location.php' && !empty($location_req)) { ?>
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Accueil</a></li>
            <li class="breadcrumb-item active"><a href="/locations" class="text-decoration-none">Locations</a></li>
            <li class="breadcrumb-item active"><a href="/locations-appartements" class="text-decoration-none"><?= $location_req['title_type'] ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $location_req['pieces'] ?> pièce<?= ($location_req['pieces'] <= 1) ? '' : 's' ?> <?= strtolower($location_req['title_type']) ?> de <?= $location_req['surface'] ?> m² à <?= $location_req['location'] ?></li>
        </ol>
    </nav>
<?php } ?>

<?php if (basename($_SERVER['PHP_SELF']) == 'blog.php' OR basename($_SERVER['PHP_SELF']) == 'actualite.php') { ?>
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Accueil</a></li>
            <?php if (basename($_SERVER['PHP_SELF']) == 'actualite.php') { ?>
                <li class="breadcrumb-item active"><a href="/blog" class="text-decoration-none">Blog</a></li>
                <li class="breadcrumb-item" aria-current="page"><?= $actualite['title'] ?></li>
            <?php } else { ?>
                <li class="breadcrumb-item active" aria-current="page">Blog</li>
            <?php } ?>
        </ol>
    </nav>
<?php } ?>

<?php if (basename($_SERVER['PHP_SELF']) == 'locations.php') { ?>
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Locations</li>
        </ol>
    </nav>
<?php } ?>

<?php if (basename($_SERVER['PHP_SELF']) == 'locations-appartements.php') { ?>
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Accueil</a></li>
            <li class="breadcrumb-item active"><a href="/locations" class="text-decoration-none">Locations</a></li>
            <li class="breadcrumb-item active" aria-current="page">Locations appartements</li>
        </ol>
    </nav>
<?php } ?>

<?php if (basename($_SERVER['PHP_SELF']) == 'locations-maisons.php') { ?>
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Accueil</a></li>
            <li class="breadcrumb-item active"><a href="/locations" class="text-decoration-none">Locations</a></li>
            <li class="breadcrumb-item active" aria-current="page">Locations maisons</li>
        </ol>
    </nav>
<?php } ?> 

<?php if (basename($_SERVER['PHP_SELF']) == 'locations-populaires.php') { ?>
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Accueil</a></li>
            <li class="breadcrumb-item active"><a href="/locations" class="text-decoration-none">Locations</a></li>
            <li class="breadcrumb-item active" aria-current="page">Locations populaires</li>
            <li class="breadcrumb-item active" aria-current="page"><?= $villes_france['ville_nom_reel'] ?></li>
        </ol>
    </nav>
<?php } ?>