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

        <div class="container px-5">

            <div class="row mt-1">

                <h1 class="h2 mb-4"><?= $actualite['title'] ?></h1>

                <!-- Breadcrump -->
                <?php include('modules/breadcrump.php') ?>

                <div class="d-flex content-flex">

                    <div class="mt-4 col-md-6 me-5">
                        <img width="100%" src="<?= $image_url . 'blog/' . $actualite['image'] ?>" alt="<?= $actualite['title'] ?>" class="img-fluid">

                        <hr class="mt-4">

                        <div class="blog-post-content">
                            <?= $actualite['large_description'] ?>
                        </div>

                    </div>

                    <div class="mt-4 col-md-6">

                        <h2 class="last_actu">Dernières actualités</h2>

                        <ul class="list-group list-group-flush">
                            <?php foreach ($last_actualite as $value) { ?>
                                <li class="list-group-item"><a href="<?= '/blog/' . $value['url'] ?>" class="text-decoration-none text-dark"><i class="fa-regular fa-plus me-2"></i><?= $value['title'] ?></a></li>
                            <?php } ?>
                        </ul>

                        <hr>

                        <h2 class="last_actu">Information complémentaire</h2>

                        <div class="pt-0 bg-transparent border-top-0 mt-4">

                            <div class="d-flex align-items-end justify-content-between">

                                <div class="d-flex align-items-center">

                                    <img class="rounded-circle me-3" height="70" width="70" src="<?= $image_url . 'blog/avatar/' . $actualite['avatar'] ?>" alt="<?= $actualite['author'] ?>" />

                                    <div class="small">
                                        <div class="fw-bold"><?= $actualite['author'] ?></div>
                                        <div class="text-muted">Publié le <?= date('d/m/Y', strtotime($actualite['created_at'])) . ' à ' . date('H:i', strtotime($actualite['created_at'])) ?></div>
                                        <div class="text-muted">Mis à jour le <?= date('d/m/Y', strtotime($actualite['updated_at'])) . ' à ' . date('H:i', strtotime($actualite['updated_at'])) ?></div>
                                    </div>


                                </div>

                            </div>

                            <div class="mt-3 text-start"><span class="ms-2 me-2"><i class="fa-regular fa-heart me-2 text-danger"></i><?= $actualite['likes'] ?></span><span><i class="fa-regular fa-eye me-2 text-info"></i><?= $actualite['views'] ?></span></div>

                            <div class="mt-4 text-start">
                                <p class="fw-bold h5">Source de l'article</p>
                                <p><a class="text-dark text-decoration-none" target="_blank" href="<?= $actualite['source'] ?>"><i class="fa-solid fa-link me-2"></i><?= $actualite['source'] ?></a></p>
                            </div>

                            <div class="mt-4 text-start">
                                <p class="fw-bold h5">Note de l'article</p>

                                <input type="hidden" name="blog-id" id="blog-id" value="<?= $actualite['id'] ?>">

                                <div class="note">

                                    <?php

                                    $note_req = $dbh->prepare('SELECT BA.id FROM blog_avis AS BA WHERE BA.blog_id = :blog_id');
                                    $note_req->execute(array('blog_id' => $actualite['id']));
                                    $note = $note_req->fetchAll();

                                    $note_req2 = $dbh->prepare('SELECT BA.note FROM blog_avis AS BA WHERE BA.blog_id = :blog_id');
                                    $note_req2->execute(array('blog_id' => $actualite['id']));
                                    $note_tot = $note_req2->fetchAll();

                                    $nbr_note = count($note);
                                    $total_note = 0;
                                    $note_max = 6;

                                    foreach ($note_tot as $value) {
                                        $total_note += $value['note'];
                                    }

                                    $note = round($nbr_note * $total_note / $note_max);

                                    switch ($note) {

                                        case '0':
                                            echo '<a data-note="1" class="add-note"><i class="fa-regular fa-star empty"></i></a>';
                                            echo '<a data-note="2" class="add-note"><i class="fa-regular fa-star empty"></i></a>';
                                            echo '<a data-note="3" class="add-note"><i class="fa-regular fa-star empty"></i></a>';
                                            echo '<a data-note="4" class="add-note"><i class="fa-regular fa-star empty"></i></a>';
                                            echo '<a data-note="5" class="add-note"><i class="fa-regular fa-star empty"></i></a>';
                                            echo '<a data-note="6" class="add-note"><i class="fa-regular fa-star empty"></i></a>';
                                            break;

                                        case '1':
                                            echo '<a data-note="1" class="add-note"><i class="fa-solid fa-star"></i></a>';
                                            echo '<a data-note="2" class="add-note"><i class="fa-regular fa-star empty"></i></a>';
                                            echo '<a data-note="3" class="add-note"><i class="fa-regular fa-star empty"></i></a>';
                                            echo '<a data-note="4" class="add-note"><i class="fa-regular fa-star empty"></i></a>';
                                            echo '<a data-note="5" class="add-note"><i class="fa-regular fa-star empty"></i></a>';
                                            echo '<a data-note="6" class="add-note"><i class="fa-regular fa-star empty"></i></a>';
                                            break;

                                        case '2':
                                            echo '<a data-note="1" class="add-note"><i class="fa-solid fa-star"></i></a>';
                                            echo '<a data-note="2" class="add-note"><i class="fa-solid fa-star"></i></a>';
                                            echo '<a data-note="3" class="add-note"><i class="fa-regular fa-star empty"></i></a>';
                                            echo '<a data-note="4" class="add-note"><i class="fa-regular fa-star empty"></i></a>';
                                            echo '<a data-note="5" class="add-note"><i class="fa-regular fa-star empty"></i></a>';
                                            echo '<a data-note="6" class="add-note"><i class="fa-regular fa-star empty"></i></a>';
                                            break;

                                        case '3':
                                            echo '<a data-note="1" class="add-note"><i class="fa-solid fa-star"></i></a>';
                                            echo '<a data-note="2" class="add-note"><i class="fa-solid fa-star"></i></a>';
                                            echo '<a data-note="3" class="add-note"><i class="fa-solid fa-star"></i></a>';
                                            echo '<a data-note="4" class="add-note"><i class="fa-regular fa-star empty"></i></a>';
                                            echo '<a data-note="5" class="add-note"><i class="fa-regular fa-star empty"></i></a>';
                                            echo '<a data-note="6" class="add-note"><i class="fa-regular fa-star empty"></i></a>';
                                            break;

                                        case '4':
                                            echo '<a data-note="1" class="add-note"><i class="fa-solid fa-star"></i></a>';
                                            echo '<a data-note="2" class="add-note"><i class="fa-solid fa-star"></i></a>';
                                            echo '<a data-note="3" class="add-note"><i class="fa-solid fa-star"></i></a>';
                                            echo '<a data-note="4" class="add-note"><i class="fa-solid fa-star"></i></a>';
                                            echo '<a data-note="5" class="add-note"><i class="fa-regular fa-star empty"></i></a>';
                                            echo '<a data-note="6" class="add-note"><i class="fa-regular fa-star empty"></i></a>';
                                            break;

                                        case '5':
                                            echo '<a data-note="1" class="add-note"><i class="fa-solid fa-star"></i></a>';
                                            echo '<a data-note="2" class="add-note"><i class="fa-solid fa-star"></i></a>';
                                            echo '<a data-note="3" class="add-note"><i class="fa-solid fa-star"></i></a>';
                                            echo '<a data-note="4" class="add-note"><i class="fa-solid fa-star"></i></a>';
                                            echo '<a data-note="5" class="add-note"><i class="fa-solid fa-star"></i></a>';
                                            echo '<a data-note="6" class="add-note"><i class="fa-regular fa-star empty"></i></a>';
                                            break;

                                        case '6':
                                            echo '<a data-note="1" class="add-note"><i class="fa-solid fa-star"></i></a>';
                                            echo '<a data-note="2" class="add-note"><i class="fa-solid fa-star"></i></a>';
                                            echo '<a data-note="3" class="add-note"><i class="fa-solid fa-star"></i></a>';
                                            echo '<a data-note="4" class="add-note"><i class="fa-solid fa-star"></i></a>';
                                            echo '<a data-note="5" class="add-note"><i class="fa-solid fa-star"></i></a>';
                                            echo '<a data-note="6" class="add-note"><i class="fa-solid fa-star"></i></a>';
                                            break;
                                    }

                                    ?>

                                </div>

                                <div class="before-note">
                                    <div class="d-flex result-note mt-3">
                                        <span class="icone"></span>
                                        <span class="message"></span>
                                    </div>
                                </div>

                            </div>

                            <div class="mt-4 text-start">

                                <p class="fw-bold h5">Qualité de l'article</p>

                                <div class="like mt-3">
                                    <span class="me-2"><i class="fa-regular fa-face-grin-hearts"></i></span>
                                    <span class="fw-bold"><span class="icone"></span><span class="message">J'aime cet article</span></span>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <hr class="mt-3 mb-4">

                <div class="text-end">

                    <p class="fw-bold">Partager sur les réseaux sociaux</p>

                    <div class="partage">

                        <ul class="list-unstyled d-flex">

                            <li class="ms-3">
                                <a target="_blank" class="link-white" href="https://www.facebook.com/sharer/sharer.php?u=https://<?= $_SERVER['HTTP_HOST'] ?>/blog/<?= $actualite['url'] ?>">
                                    <img src="<?= $image_url . '/socials/facebook.svg' ?>" alt="Facebook" width="24" height="24">
                                </a>
                            </li>

                            <li class="ms-3">
                                <a class="link-white" href="https://twitter.com/share?url=https://<?= $_SERVER['HTTP_HOST'] ?>/blog/<?= $actualite['url'] ?>&text=<?= $actualite['title'] ?>&via=lep" onclick="window.open(this.href);return false;">
                                    <img src="<?= $image_url . '/socials/twitter.svg' ?>" alt="Twitter" width="24" height="24">
                                </a>
                            </li>

                            <li class="ms-3">
                                <a class="link-white" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=https://<?= $_SERVER['HTTP_HOST'] ?>/blog/<?= $actualite['url'] ?>&text=<?= $actualite['title'] ?>">
                                    <img src="<?= $image_url . '/socials/linkedin.svg' ?>" alt="Linkedin" width="24" height="24">
                                </a>
                            </li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

        <div class="bg-white py-5 location-free mt-4">

            <div class="container px-4 py-5">

                <div class="bg-success bg-gradient p-5 rounded">

                    <h3 class="text-white mb-4">Vous recherchez un logement en location ?</h3>
                    <p class="lead text-white">Rechercher parmi <?= count($loc_count) + count($loc_count2) ?> location<?= (count($loc_count) + count($loc_count2) >= 2) ? 's' : '' ?> disponible<?= (count($loc_count) + count($loc_count2) >= 2) ? 's' : '' ?></p>
                    <a class="btn btn-lg btn-success bg-gradient create-annonce-free" href="/locations" role="button">Rechercher maintenant</a>

                </div>

            </div>

        </div>

    </div>

</main>

<!-- Footer-->
<?php include('modules/footer.php'); ?>