<div class="bg-light py-5">

    <div class="container px-4 py-5 autres-recherches">

        <h2 class="pb-2 border-bottom text-center mb-3">Voir d'autres recherches</h2>
        <p class="text-center">Élargissez votre recherche et consultez les locations disponibles dans les villes populaires</p>

        <div class="collapseTable">

            <div class="collaspeRow">

                <?php

                foreach ($locationsCols1_last_row as $value) {

                    // On compte le nombre de résultat par Région
                    $regionCounterCols1 = $dbh->query('SELECT COUNT(id) FROM appartements WHERE id_site = 1 AND regions = ' . $value['id']);
                    $count = $regionCounterCols1->fetchColumn();

                    // Je veux uniquement le nom de la ville pour chaque annonce
                    $villeRow1 = $dbh->query('SELECT location FROM appartements WHERE id_site = 1 AND regions = ' . $value['id']);
                    $ville1_row = $villeRow1->fetchAll();
                    $array = array_unique($ville1_row, SORT_REGULAR);

                ?>

                    <div class="accordion mb-3" id="accordionCols<?= $value['id'] ?>">

                        <div class="accordion-item">

                            <h2 class="accordion-header" id="headingCols<?= $value['id'] ?>">

                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCols<?= $value['id'] ?>" aria-expanded="false" aria-controls="collapseCols<?= $value['id'] ?>">
                                    <?= $value['title'] ?>
                                    <span class="badge bg-success"><?= $count ?></span>
                                </button>


                            </h2>

                            <div id="collapseCols<?= $value['id'] ?>" class="accordion-collapse collapse" aria-labelledby="headingCols<?= $value['id'] ?>" data-bs-parent="#accordionCols<?= $value['id'] ?>">

                                <div class="accordion-body">

                                    <ul class="mb-0">
                                        <?php

                                        foreach ($array as $key => $value) {
                                            echo '<li><a class="text-decoration-none" href="/">' . $value['location'] . '</a></li>';
                                        }

                                        ?>
                                    </ul>

                                </div>

                            </div>

                        </div>

                    </div>

                <?php } ?>

            </div>

            <div class="collaspeRow">

                <?php

                foreach ($locationsCols2_last_row as $value) {

                    // On compte le nombre de résultat par Région
                    $regionCounterCols2 = $dbh->query('SELECT COUNT(*) FROM appartements WHERE id_site = 1 AND regions = ' . $value['id']);
                    $count = $regionCounterCols2->fetchColumn();

                    // Je veux uniquement le nom de la ville pour chaque annonce
                    $villeRow2 = $dbh->query('SELECT location FROM appartements WHERE id_site = 1 AND regions = ' . $value['id']);
                    $ville2_row = $villeRow2->fetchAll();
                    $array = array_unique($ville2_row, SORT_REGULAR);
                ?>

                    <div class="accordion mb-3" id="accordion2Cols<?= $value['id'] ?>">

                        <div class="accordion-item">

                            <h2 class="accordion-header" id="heading2Cols<?= $value['id'] ?>">

                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2Cols<?= $value['id'] ?>" aria-expanded="false" aria-controls="collapse2Cols<?= $value['id'] ?>">
                                    <?= $value['title'] ?>
                                    <span class="badge bg-success"><?= $count ?></span>
                                </button>


                            </h2>

                            <div id="collapse2Cols<?= $value['id'] ?>" class="accordion-collapse collapse" aria-labelledby="heading2Cols<?= $value['id'] ?>" data-bs-parent="#accordion2Cols<?= $value['id'] ?>">

                                <div class="accordion-body">

                                    <ul class="mb-0">
                                        <?php

                                        foreach ($array as $key => $value) {
                                            echo '<li><a class="text-decoration-none" href="/">' . $value['location'] . '</a></li>';
                                        }

                                        ?>
                                    </ul>

                                </div>

                            </div>

                        </div>

                    </div>

                <?php } ?>

            </div>

        </div>

    </div>

</div>