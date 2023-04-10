<?php if (basename($_SERVER['PHP_SELF']) == 'annonces.php' && !empty($appartement_url) && empty($maison_url)) { ?>
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Accueil</a></li>
            <li class="breadcrumb-item active"><a href="/location" class="text-decoration-none">Locations</a></li>
            <li class="breadcrumb-item active"><a href="/location-appartement" class="text-decoration-none"><?= $appartement['title_type'] ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $appartement['pieces'] ?> pièce<?= ($appartement['pieces'] <= 1) ? '' : 's' ?> <?= strtolower($appartement['title_type']) ?> de <?= $appartement['surface'] ?> m² à <?= $appartement['location'] ?></li>
        </ol>
    </nav>
<?php } ?>

<?php if (basename($_SERVER['PHP_SELF']) == 'annonces.php' && empty($appartement_url) && !empty($maison_url)) { ?>
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Accueil</a></li>
            <li class="breadcrumb-item active"><a href="/location" class="text-decoration-none">Locations</a></li>
            <li class="breadcrumb-item active"><a href="/location-maison" class="text-decoration-none"><?= $maison['title_type'] ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $maison['pieces'] ?> pièce<?= ($maison['pieces'] <= 1) ? '' : 's' ?> <?= strtolower($maison['title_type']) ?> de <?= $maison['surface'] ?> m² à <?= $maison['location'] ?></li>
        </ol>
    </nav>
<?php } ?>