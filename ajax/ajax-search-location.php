<?php

// Affichage des erreurs  -->
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Importation des différents fichiers  -->
include_once('../config/connexion.php');
include_once('../config/fonctions.php');
include_once('../config/public.php');

date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fra_fra');

$final = '';
$where = '';


if (!empty($_GET['location'])) {
    $location = $_GET['location'];
    $where .= ' AND L.location LIKE "%' . $location . '%"';
}

if (!empty($_GET['type_propriete'])) {
    $type_propriete = intval($_GET['type_propriete']);
    $where .= ' AND L.type = ' . $type_propriete . '';
}

if(!empty($_GET['loyer_propriete'])) {
    $loyer_propriete = intval($_GET['loyer_propriete']);
    $where .= ' AND L.prix <= ' . $loyer_propriete . '';
}

if(!empty($_GET['chambres_propriete'])) {
    $chambres_propriete = intval($_GET['chambres_propriete']);
    $where .= ' AND L.chambres <= ' . $chambres_propriete . '';
}

if(!empty($_GET['pieces_propriete'])) {
    $pieces_propriete = intval($_GET['pieces_propriete']);
    $where .= ' AND L.pieces <= ' . $pieces_propriete . '';
}

// Récupération des datas sans quot
$req = $dbh->prepare('SELECT L.*, LT.title AS title_type 
FROM locations AS L LEFT JOIN locations_type AS LT ON LT.id = L.type 
WHERE L.id_site = 1 AND L.verification = 1 AND L.abonnement_expire = 0 ' . $where);

$req->execute();

$donnees = $req->fetchAll();

?>

<?php if (!empty($donnees)) { ?>

    <?php foreach ($donnees as $value) { ?>

        <div class="col">

            <div class="card">

                <?php if (date('Y-m-d H:i', strtotime($value['created_at'])) < date('Y-m-d H:i', strtotime('+7 days'))) { ?>
                    <div class="badge_new">
                        <span class="badge rounded-pill bg-danger">Nouveau !</span>
                    </div>
                <?php } ?>

                <div class="location">


                    <div id="locaCarousel_<?= $value['id'] ?>" class="carousel slide" data-bs-ride="carousel">

                        <div class="carousel-inner">

                            <div class="carousel-item active">
                                <img class="card-img-top" src="<?= $image_url . 'annonces/' . $value['image'] ?>" alt="<?= $value['title_type'] . ' de ' . $value['surface'] . ' m2 à ' . $value['location'] ?>" />
                            </div>

                            <?php if (!empty($value['image_2'])) { ?>
                                <div class="carousel-item">
                                    <img class="card-img-top" src="<?= $image_url . 'annonces/' . $value['image_2'] ?>" alt="<?= $value['title_type'] . ' de ' . $value['surface'] . ' m2 à ' . $value['location'] ?>" />
                                </div>
                            <?php } ?>

                            <?php if (!empty($value['image_3'])) { ?>
                                <div class="carousel-item">
                                    <img class="card-img-top" src="<?= $image_url . 'annonces/' . $value['image_3'] ?>" alt="<?= $value['title_type'] . ' de ' . $value['surface'] . ' m2 à ' . $value['location'] ?>" />
                                </div>
                            <?php } ?>


                            <?php if (!empty($value['image_4'])) { ?>
                                <div class="carousel-item">
                                    <img class="card-img-top" src="<?= $image_url . 'annonces/' . $value['image_4'] ?>" alt="<?= $value['title_type'] . ' de ' . $value['surface'] . ' m2 à ' . $value['location'] ?>" />
                                </div>
                            <?php } ?>

                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#locaCarousel_<?= $value['id'] ?>" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Précédent</span>
                        </button>

                        <button class="carousel-control-next" type="button" data-bs-target="#locaCarousel_<?= $value['id'] ?>" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Suivant</span>
                        </button>

                    </div>

                    <div class="bandeau">
                        <span>
                            <i class="fa-solid fa-map-pin me-1"></i> <?= $value['location'] ?>
                        </span>
                    </div>

                </div>

                <div class="card-body">
                    <h5 class="card-title"><?= $value['title_type'] . ' de ' . $value['surface'] . ' m<sup>2</sup> à ' . $value['location'] ?></h5>
                    <p class="card-text"><?= $value['rue'] ?></p>
                </div>

                <div class="details">

                    <div>
                        <p><i class="fa-solid fa-meteor"></i></p>
                        <p>Surface</p>
                        <p><?= $value['surface'] ?> m<sup>2</sup></p>
                    </div>

                    <div>
                        <p><i class="fa-solid fa-puzzle-piece"></i></p>
                        <p>Pièces</p>
                        <p><?= $value['pieces'] ?></p>
                    </div>

                    <div>
                        <p><i class="fa-solid fa-house"></i></p>
                        <p>Type</p>
                        <p><?= $value['title_type'] ?></p>
                    </div>

                </div>

                <div class="footer">

                    <div>
                        <span><?= $value['prix'] ?> €/mois</span>
                    </div>

                    <div></div>

                    <a href="/locations/<?= $value['url'] ?>" class="text-decoration-none">
                        <div>
                            <span>Voir le bien</span>
                        </div>
                    </a>

                </div>

            </div>

        </div>

    <?php } ?>

<?php } ?>