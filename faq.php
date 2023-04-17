<!-- Configuration du site -->
<?php include('config/config.php'); ?>

<!-- Body -->
<?php include('modules/body.php'); ?>

<main class="flex-shrink-0">

    <!-- Navigation-->
    <?php include('modules/navigation.php'); ?>

    <div class="content reveal">

        <div class="container mb-5">

            <div class="row">

                <h1 class="h3 mb-4">Foire aux questions (FAQ)</h1>
                <h5 class="mb-4">Consultez les guides ci-dessous pour obtenir des réponses à nos questions fréquemment posées</h5>

                <div class="text-center mb-4">
                    <img src="<?= $image_url . 'faq.png' ?>" alt="" class="img-fluid">
                </div>

                <div class="d-flex grid-faq">

                    <div class="col-md-6 me-3">

                        <div class="bloc-faq">

                            <blockquote class="blockquote">
                                <p class="text-dark fw-bold">Comment créer un compte sur LEP ?</p>
                            </blockquote>

                            <p class="text-dark">Grâce à un compte LEP, vous pouvez mettre en ligne un nombre illimité d'annonces de maisons, et d'appartements. La limite est de 2 annonces par propriétaire, ensuite un abonnement sera appliqué avec un nombre illimité d'annonces par propriétaire.</p>

                        </div>

                        <div class="bloc-faq mt-4">

                            <blockquote class="blockquote">
                                <p class="text-dark fw-bold">Pourquoi je ne peut pas m'inscrire en tant que locataire ?</p>
                            </blockquote>

                            <p class="text-dark">Notre site a été créer afin que vous puissiez voir les coordonnées des propriétaires sans créer de compte, il vous suffit de cliquer sur <b>Voir les coordonnées du propriétaire</b> sur une location, puis d'effectuer le paiement de l'abonnement vous aurez donc accès pendant 1 mois à toutes les coordonnées des annonces locatives sur LEP.</p>

                        </div>

                        <div class="bloc-faq mt-4">

                            <blockquote class="blockquote">
                                <p class="text-dark fw-bold">Comment puis-je signaler une location immobilière ?</p>
                            </blockquote>

                            <p class="text-dark">En signalant une location immobilière, vous vous aidez vous-même, les autres clients et nous. Par exemple, le signalement d’une location immobilière pourrait être basé sur des soupçons concernant une fausse location de logement, une location avec des erreurs manifestes dans la description / le prix, des erreurs dans les coordonnées du propriétaire, etc. Nous recommandons et apprécions la coopération avec nos clients afin que nous puissions corriger les erreurs immédiatement sur la page, et ainsi vous offrir le meilleur service possible.</p>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="bloc-faq">

                            <blockquote class="blockquote">
                                <p class="text-dark fw-bold">Comment utiliser l'outil de filtrage ?</p>
                            </blockquote>

                            <p class="text-dark">L'outil de filtrage vous aide dans la recherche de logement, car vous avez la possibilité de filtrer les <a class="text-decoration-none fw-bold text-dark" href="locations">logements</a> affichés en fonction de votre loyer, nombre, chambres, emplacement et type d'hébergement.</p>

                        </div>

                        <div class="bloc-faq mt-4">

                            <blockquote class="blockquote">
                                <p class="text-dark fw-bold">Comment annuler mon abonnement ?</p>
                            </blockquote>

                            <p class="text-dark">En vous désabonnant de LEP, vous renoncez aux possibilités d'accéder à nos annonces immobilières et aux coordonnées des propriétaires. Pour annuler votre abonnement, vous devez vous rendre sur l'email de confirmation. Et cliquer sur le lien correspondant vous permettant de vous désinscrire. Veuillez noter que vous recevrez un e-mail de confirmation - ceci est votre preuve d'annulation.</p>

                        </div>

                    </div>

                </div>

                <div class="mt-4">
                    <p class="h5 text-dark">Vous avez encore des questions sans réponse ?</p>
                    <p class="text-dark mt-2 mb-0">Ensuite, contactez notre service client par e-mail <a href="mailto: contact@location-entre-particulier.fr" class="text-dark fw-bold text-decoration-none">contact@location-entre-particulier.fr</a>.</p>
                    <p class="text-dark mt-2">Les e-mails reçoivent une réponse durant les jours ouvrables entre 10h00 et 19h00 du lundi au samedi.</p>
                </div>

            </div>

        </div>

    </div>

</main>

<!-- Footer-->
<?php include('modules/footer.php'); ?>