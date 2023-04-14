<!-- Vérification utilisateur -->
<?php require('config/user-verification.php') ?>

<!-- Vérification page -->
<?php require('config/page-verification.php') ?>

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
                    <h4><i class="fa-solid fa-signal me-2 text-3"></i>Statistiques de <?= $location_user['title'] ?></h4>
                </div>

                <div class="mt-4 mb-4">
                    <h4><span class="badge bg-success me-3 py-2"><i class="fa-regular fa-circle-check me-2 text-white"></i>Mes locations en ligne (<?= count($locations_user_all); ?>)</span><span class="badge bg-danger me-3 py-2"><i class="fa-regular fa-circle-xmark me-1 text-white"></i> Mes locations inactive (<?= count($locations_user_all2) ?>)</span></h4>
                </div>

                <?php

                // Données du graph de total
                $views_graph = array();
                $apparition_graph = array();

                foreach ($months as $month) {

                    if (empty($_GET['year'])) {
                        $start_date_graph = date('Y') . "-" . $month['id'] . "-01";
                        $end_date_graph = date('Y') . "-" . $month['id'] . "-30";
                    } else {
                        $start_date_graph = $_GET['year'] . "-" . $month['id'] . "-01";
                        $end_date_graph = $_GET['year'] . "-" . $month['id'] . "-30";
                    }

                    $views_chiffres_req = $dbh->prepare('SELECT COUNT(id) AS views FROM locations_views WHERE location_id = "' . $location_user['id'] . '" AND created_at BETWEEN "' . $start_date_graph . '" AND  "' . $end_date_graph . '"');
                    $views_chiffres_req->execute();
                    $views_chiffres = $views_chiffres_req->fetch();

                    if ($views_chiffres['views'] == "") $views_graph[] = '0';
                    else $views_graph[] = $views_chiffres['views'];

                    $apparitions_req = $dbh->prepare('SELECT COUNT(id) AS apparition FROM locations_apparitions WHERE location_id = "' . $location_user['id'] . '" AND created_at BETWEEN "' . $start_date_graph . '" AND  "' . $end_date_graph . '"');
                    $apparitions_req->execute();
                    $apparitions_chiffres = $apparitions_req->fetch();

                    if ($apparitions_chiffres['apparition'] == "") $apparition_graph[] = '0';
                    else $apparition_graph[] = $apparitions_chiffres['apparition'];
                }

                $views_graph = implode(',', $views_graph);
                $apparition_graph = implode(',', $apparition_graph);

                ?>

                <input type="hidden" id="views_graph" data-target="<?= $views_graph; ?>" />
                <input type="hidden" id="apparition_graph" data-target="<?= $apparition_graph; ?>" />

                <script>
                    $(document).ready(function() {

                        var views = $('#views_graph').data("target");
                        views = views.split(',');
                        myLineChart.data.datasets[0].data = views;
                        myLineChart.update();

                        var apparition = $('#apparition_graph').data("target");
                        apparition = apparition.split(',');
                        myLineChart2.data.datasets[0].data = apparition;
                        myLineChart2.update();

                    });
                </script>

                <div class="row mb-4">

                    <div class="col-md-3">
                        
                        <div class="location">

                            <div id="locaMCarousel_<?= $location_user['id'] ?>" class="carousel slide" data-bs-ride="carousel">

                                <div class="carousel-inner">

                                    <div class="carousel-item active">
                                        <img class="card-img-top" src="<?= $image_url . 'annonces/' . $location_user['image'] ?>" />
                                    </div>

                                    <?php if (!empty($location_user['image_2'])) { ?>
                                        <div class="carousel-item">
                                            <img class="card-img-top" src="<?= $image_url . 'annonces/' . $location_user['image_2'] ?>" />
                                        </div>
                                    <?php } ?>

                                    <?php if (!empty($location_user['image_3'])) { ?>
                                        <div class="carousel-item">
                                            <img class="card-img-top" src="<?= $image_url . 'annonces/' . $location_user['image_3'] ?>" />
                                        </div>
                                    <?php } ?>


                                    <?php if (!empty($location_user['image_4'])) { ?>
                                        <div class="carousel-item">
                                            <img class="card-img-top" src="<?= $image_url . 'annonces/' . $location_user['image_4'] ?>" />
                                        </div>
                                    <?php } ?>

                                </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#locaMCarousel_<?= $location_user['id'] ?>" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Précédent</span>
                                </button>

                                <button class="carousel-control-next" type="button" data-bs-target="#locaMCarousel_<?= $location_user['id'] ?>" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Suivant</span>
                                </button>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-2">

                        <ul class="list-group">

                            <li class="list-group-item">
                                <div class="text-start"><i class="fa-regular fa-eye"></i></div>
                                <div class="text-end"><?= $location_user['views'] ?></div>
                            </li>

                            <li class="list-group-item">
                                <div><i class="fa-solid fa-phone"></i></div>
                                <div><?= $location_user['tel_views'] ?></div>
                            </li>

                            <li class="list-group-item">
                                <div><i class="fa-regular fa-envelope"></i></div>
                                <div><?= $location_user['mail_views'] ?></div>
                            </li>

                        </ul>

                        <div class="mt-3 mb-3">
                            <i class="fa-solid fa-calendar-days me-1 text-info"></i> Créer le <b><?= date('d/m/Y à H:i', strtotime($location_user['created_at'])) ?>
                        </div>

                        <?php if (!empty($location_user['updated_at'])) { ?>
                            <div class="mt-2">
                                <i class="fa-solid fa-calendar-days me-1 text-info"></i> Modifier le <b><?= date('d/m/Y à H:i', strtotime($location_user['updated_at'])) ?>
                            </div>
                        <?php } ?>

                        <div class="mt-2">
                            <a href="/modification/<?= $location_user['url'] ?>" class="btn btn-outline-success bg-gradient"><i class="fa-solid fa-pencil me-2"></i>Modifier</a>
                        </div>

                        <div class="mt-3 mb-3">
                            <a data-id="<?= $location_user['id'] ?>" class="btn btn-outline-danger bg-gradient remove-location"><i class="fa-solid fa-trash-can"></i></a>
                        </div>

                    </div>

                </div>

                <hr>

                <div class="row mb-3 mt-4">
                    <h4>Tendance de votre location</h4>
                </div>

                <div class="container nouveautes_maison locations_user">

                    <div class="row row-cols-1 row-cols-md-2 g-4 nouveautes_maisons">

                        <div class="mt-4 col">

                            <div>

                                <ul class="nav nav-tabs">

                                    <li class="nav-item">
                                        <a data-item="1" class="nav-link active nav-1" aria-current="page" href="#" tabindex="0" data-bs-toggle="tooltip" data-bs-placement="top" title="Nombre de fois où le détail de votre annonce a été consulté."><i class="fa-regular fa-eye me-2"></i>Vues</a>
                                    </li>

                                </ul>

                            </div>


                            <div class="col-xl-12 col-lg-12 mt-4">

                                <div class="card shadow mb-4 bloc-stats-1">

                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-success">Nombre de vues sur l'année <?= date('Y') ?></h6>
                                    </div>

                                    <!-- Card Body -->
                                    <div class="card-body">

                                        <div class="chart-area">

                                            <div class="chartjs-size-monitor">

                                                <div class="chartjs-size-monitor-expand">
                                                    <div class=""></div>
                                                </div>

                                                <div class="chartjs-size-monitor-shrink">
                                                    <div class=""></div>
                                                </div>

                                            </div>

                                            <canvas id="myAreaChart" style="display: block; height: 320px; width: 781px;" width="976" height="400" class="chartjs-render-monitor"></canvas>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col">

                            <div>

                                <ul class="nav nav-tabs">

                                    <li class="nav-item">
                                        <a data-item="2" class="nav-link nav-2 active" href="#" tabindex="0" data-bs-toggle="tooltip" data-bs-placement="top" title="Nombre de fois où votre annonce est apparue dans les résultats de recherche."><i class="fa-solid fa-list-ul me-2"></i>Apparitions</a>
                                    </li>

                                </ul>

                            </div>

                            <div class="col-xl-12 col-lg-12 mt-4">

                                <div class="card shadow mb-4 bloc-stats-2">

                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-info">Appartitions sur l'année <?= date('Y') ?></h6>
                                    </div>

                                    <!-- Card Body -->
                                    <div class="card-body">

                                        <div class="chart-area">

                                            <div class="chartjs-size-monitor">

                                                <div class="chartjs-size-monitor-expand">
                                                    <div class=""></div>
                                                </div>

                                                <div class="chartjs-size-monitor-shrink">
                                                    <div class=""></div>
                                                </div>

                                            </div>

                                            <canvas id="myAreaChart2" style="display: block; height: 320px; width: 781px;" width="976" height="400" class="chartjs-render-monitor"></canvas>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>


                    </div>

                </div>

            </div>

        </div>

    </div>

</main>

<!-- Footer-->
<?php include('modules/footer.php'); ?>