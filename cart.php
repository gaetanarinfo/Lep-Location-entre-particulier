<!-- Vérification utilisateur -->
<?php require('config/user-verification.php') ?>

<!-- Configuration du site -->
<?php include('config/config.php'); ?>

<?php $useragent = $_SERVER['HTTP_USER_AGENT']; ?>

<!-- Body -->
<?php include('modules/body.php'); ?>

<main class="flex-shrink-0">

    <div class="container-fluid">

        <div class="row">

            <!-- SideBar -->
            <?php include('modules/users/sidebar.php'); ?>

            <div class="col-md-9 ms-sm-auto ps-0 pe-4 col-lg-10 page">

                <div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 pb-5">

                    <div class="py-5 text-center">
                        <img class="d-block mx-auto mb-4" src="<?= $image_url . 'favicon.png' ?>" alt="" width="80" height="80">
                        <h2>Votre panier</h2>
                        <p class="lead mt-3">Notre système de paiement est sécurisé, vous pouvez prendre votre abonnement en toute sérénité, grâce à votre abonnement créer un nombre illimité d'annonces, vous pouvez les modifier, supprimer, visualiser. Nous vous souhaitons un très bon achat.</p>
                    </div>

                    <div class="row g-5">

                        <div class="col-md-5 col-lg-4 order-md-last">

                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-primary">Votre panier</span>
                                <span class="badge bg-primary rounded-pill">1</span>
                            </h4>

                            <ul class="list-group mb-3">

                                <li class="list-group-item d-flex justify-content-between lh-sm">
                                    <div>
                                        <h6 class="my-0">Abonnement LEP PRO - 1 mois</h6>
                                        <small class="text-muted">Locations illimités pendant 1 mois sur tout le site LEP.</small>
                                    </div>
                                    <span class="text-muted price">39,99 €</span>
                                </li>

                            </ul>

                            <form class="card p-2 code_promo">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Code promotionnel">
                                    <button type="submit" class="btn btn-secondary">Valider</button>
                                </div>
                            </form>

                            <div class="paiement-stripe">
                                <i class="fa-brands fa-stripe"></i>
                            </div>

                        </div>

                        <div class="col-md-7 col-lg-8 bloc-paiement">

                            <div class="message-validation">

                                <div>
                                    <img class="message-icone" src="">
                                </div>

                                <div>
                                    <h3 class="message-title"></h3>
                                </div>

                                <div class="mb-4 mt-4">
                                    <p class="message-body"></p>
                                </div>

                            </div>

                            <div class="loader_inf hidden" id="loader-paiement">
                                <img width="67" height="67" src="<?= $image_url . 'loader.svg' ?>">
                            </div>

                        </div>

                        <div class="col-md-7 col-lg-8 coordonnees">

                            <h4 class="mb-3">Vos coordonnées</h4>

                            <form id="validate-cart" class="needs-validation">

                                <div class="row g-3">

                                    <div class="col-sm-6">
                                        <label for="prenom_cart" class="form-label">Prénom</label>
                                        <input type="text" class="form-control" id="prenom_cart" name="prenom_cart" value="<?= $users['prenom'] ?>" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="nom_cart" class="form-label">Nom</label>
                                        <input type="text" class="form-control" id="nom_cart" name="nom_cart" value="<?= $users['nom'] ?>" required>
                                    </div>

                                    <div class="col-6">
                                        <label for="email_cart" class="form-label">Adresse email</label>
                                        <input type="email" class="form-control" id="email_cart" required name="email_cart" value="<?= $users['email'] ?>">
                                    </div>

                                    <div class="col-6">
                                        <label for="tel_cart" class="form-label">Adresse email</label>
                                        <input type="number" class="form-control" id="tel_cart" required name="tel_cart" value="<?= $users['tel'] ?>">
                                    </div>

                                    <div class="col-12">
                                        <label for="adresse_cart" class="form-label">Adresse</label>
                                        <input type="text" class="form-control" id="adresse_cart" name="adresse_cart" required value="<?= $users['adresse'] ?>">
                                    </div>

                                    <div class="col-md-5">
                                        <label for="pays_cart" class="form-label">Pays</label>
                                        <select class="form-select" id="pays_cart" name="pays_cart" required>

                                            <?php if (empty($users['pays'])) { ?>
                                                <option value="France" selected="selected">France </option>
                                            <?php } else { ?>
                                                <option value="<?= $users['pays'] ?>" selected="selected"><?= $users['pays'] ?> </option>
                                            <?php } ?>

                                            <option value="Afghanistan">Afghanistan </option>
                                            <option value="Afrique_Centrale">Afrique_Centrale </option>
                                            <option value="Afrique_du_sud">Afrique_du_Sud </option>
                                            <option value="Albanie">Albanie </option>
                                            <option value="Algerie">Algerie </option>
                                            <option value="Allemagne">Allemagne </option>
                                            <option value="Andorre">Andorre </option>
                                            <option value="Angola">Angola </option>
                                            <option value="Anguilla">Anguilla </option>
                                            <option value="Arabie_Saoudite">Arabie_Saoudite </option>
                                            <option value="Argentine">Argentine </option>
                                            <option value="Armenie">Armenie </option>
                                            <option value="Australie">Australie </option>
                                            <option value="Autriche">Autriche </option>
                                            <option value="Azerbaidjan">Azerbaidjan </option>

                                            <option value="Bahamas">Bahamas </option>
                                            <option value="Bangladesh">Bangladesh </option>
                                            <option value="Barbade">Barbade </option>
                                            <option value="Bahrein">Bahrein </option>
                                            <option value="Belgique">Belgique </option>
                                            <option value="Belize">Belize </option>
                                            <option value="Benin">Benin </option>
                                            <option value="Bermudes">Bermudes </option>
                                            <option value="Bielorussie">Bielorussie </option>
                                            <option value="Bolivie">Bolivie </option>
                                            <option value="Botswana">Botswana </option>
                                            <option value="Bhoutan">Bhoutan </option>
                                            <option value="Boznie_Herzegovine">Boznie_Herzegovine </option>
                                            <option value="Bresil">Bresil </option>
                                            <option value="Brunei">Brunei </option>
                                            <option value="Bulgarie">Bulgarie </option>
                                            <option value="Burkina_Faso">Burkina_Faso </option>
                                            <option value="Burundi">Burundi </option>

                                            <option value="Caiman">Caiman </option>
                                            <option value="Cambodge">Cambodge </option>
                                            <option value="Cameroun">Cameroun </option>
                                            <option value="Canada">Canada </option>
                                            <option value="Canaries">Canaries </option>
                                            <option value="Cap_vert">Cap_Vert </option>
                                            <option value="Chili">Chili </option>
                                            <option value="Chine">Chine </option>
                                            <option value="Chypre">Chypre </option>
                                            <option value="Colombie">Colombie </option>
                                            <option value="Comores">Colombie </option>
                                            <option value="Congo">Congo </option>
                                            <option value="Congo_democratique">Congo_democratique </option>
                                            <option value="Cook">Cook </option>
                                            <option value="Coree_du_Nord">Coree_du_Nord </option>
                                            <option value="Coree_du_Sud">Coree_du_Sud </option>
                                            <option value="Costa_Rica">Costa_Rica </option>
                                            <option value="Cote_d_Ivoire">Côte_d_Ivoire </option>
                                            <option value="Croatie">Croatie </option>
                                            <option value="Cuba">Cuba </option>

                                            <option value="Danemark">Danemark </option>
                                            <option value="Djibouti">Djibouti </option>
                                            <option value="Dominique">Dominique </option>

                                            <option value="Egypte">Egypte </option>
                                            <option value="Emirats_Arabes_Unis">Emirats_Arabes_Unis </option>
                                            <option value="Equateur">Equateur </option>
                                            <option value="Erythree">Erythree </option>
                                            <option value="Espagne">Espagne </option>
                                            <option value="Estonie">Estonie </option>
                                            <option value="Etats_Unis">Etats_Unis </option>
                                            <option value="Ethiopie">Ethiopie </option>

                                            <option value="Falkland">Falkland </option>
                                            <option value="Feroe">Feroe </option>
                                            <option value="Fidji">Fidji </option>
                                            <option value="Finlande">Finlande </option>
                                            <option value="France">France </option>

                                            <option value="Gabon">Gabon </option>
                                            <option value="Gambie">Gambie </option>
                                            <option value="Georgie">Georgie </option>
                                            <option value="Ghana">Ghana </option>
                                            <option value="Gibraltar">Gibraltar </option>
                                            <option value="Grece">Grece </option>
                                            <option value="Grenade">Grenade </option>
                                            <option value="Groenland">Groenland </option>
                                            <option value="Guadeloupe">Guadeloupe </option>
                                            <option value="Guam">Guam </option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guernesey">Guernesey </option>
                                            <option value="Guinee">Guinee </option>
                                            <option value="Guinee_Bissau">Guinee_Bissau </option>
                                            <option value="Guinee equatoriale">Guinee_Equatoriale </option>
                                            <option value="Guyana">Guyana </option>
                                            <option value="Guyane_Francaise ">Guyane_Francaise </option>

                                            <option value="Haiti">Haiti </option>
                                            <option value="Hawaii">Hawaii </option>
                                            <option value="Honduras">Honduras </option>
                                            <option value="Hong_Kong">Hong_Kong </option>
                                            <option value="Hongrie">Hongrie </option>

                                            <option value="Inde">Inde </option>
                                            <option value="Indonesie">Indonesie </option>
                                            <option value="Iran">Iran </option>
                                            <option value="Iraq">Iraq </option>
                                            <option value="Irlande">Irlande </option>
                                            <option value="Islande">Islande </option>
                                            <option value="Israel">Israel </option>
                                            <option value="Italie">italie </option>

                                            <option value="Jamaique">Jamaique </option>
                                            <option value="Jan Mayen">Jan Mayen </option>
                                            <option value="Japon">Japon </option>
                                            <option value="Jersey">Jersey </option>
                                            <option value="Jordanie">Jordanie </option>

                                            <option value="Kazakhstan">Kazakhstan </option>
                                            <option value="Kenya">Kenya </option>
                                            <option value="Kirghizstan">Kirghizistan </option>
                                            <option value="Kiribati">Kiribati </option>
                                            <option value="Koweit">Koweit </option>

                                            <option value="Laos">Laos </option>
                                            <option value="Lesotho">Lesotho </option>
                                            <option value="Lettonie">Lettonie </option>
                                            <option value="Liban">Liban </option>
                                            <option value="Liberia">Liberia </option>
                                            <option value="Liechtenstein">Liechtenstein </option>
                                            <option value="Lituanie">Lituanie </option>
                                            <option value="Luxembourg">Luxembourg </option>
                                            <option value="Lybie">Lybie </option>

                                            <option value="Macao">Macao </option>
                                            <option value="Macedoine">Macedoine </option>
                                            <option value="Madagascar">Madagascar </option>
                                            <option value="Madère">Madère </option>
                                            <option value="Malaisie">Malaisie </option>
                                            <option value="Malawi">Malawi </option>
                                            <option value="Maldives">Maldives </option>
                                            <option value="Mali">Mali </option>
                                            <option value="Malte">Malte </option>
                                            <option value="Man">Man </option>
                                            <option value="Mariannes du Nord">Mariannes du Nord </option>
                                            <option value="Maroc">Maroc </option>
                                            <option value="Marshall">Marshall </option>
                                            <option value="Martinique">Martinique </option>
                                            <option value="Maurice">Maurice </option>
                                            <option value="Mauritanie">Mauritanie </option>
                                            <option value="Mayotte">Mayotte </option>
                                            <option value="Mexique">Mexique </option>
                                            <option value="Micronesie">Micronesie </option>
                                            <option value="Midway">Midway </option>
                                            <option value="Moldavie">Moldavie </option>
                                            <option value="Monaco">Monaco </option>
                                            <option value="Mongolie">Mongolie </option>
                                            <option value="Montserrat">Montserrat </option>
                                            <option value="Mozambique">Mozambique </option>

                                            <option value="Namibie">Namibie </option>
                                            <option value="Nauru">Nauru </option>
                                            <option value="Nepal">Nepal </option>
                                            <option value="Nicaragua">Nicaragua </option>
                                            <option value="Niger">Niger </option>
                                            <option value="Nigeria">Nigeria </option>
                                            <option value="Niue">Niue </option>
                                            <option value="Norfolk">Norfolk </option>
                                            <option value="Norvege">Norvege </option>
                                            <option value="Nouvelle_Caledonie">Nouvelle_Caledonie </option>
                                            <option value="Nouvelle_Zelande">Nouvelle_Zelande </option>

                                            <option value="Oman">Oman </option>
                                            <option value="Ouganda">Ouganda </option>
                                            <option value="Ouzbekistan">Ouzbekistan </option>

                                            <option value="Pakistan">Pakistan </option>
                                            <option value="Palau">Palau </option>
                                            <option value="Palestine">Palestine </option>
                                            <option value="Panama">Panama </option>
                                            <option value="Papouasie_Nouvelle_Guinee">Papouasie_Nouvelle_Guinee </option>
                                            <option value="Paraguay">Paraguay </option>
                                            <option value="Pays_Bas">Pays_Bas </option>
                                            <option value="Perou">Perou </option>
                                            <option value="Philippines">Philippines </option>
                                            <option value="Pologne">Pologne </option>
                                            <option value="Polynesie">Polynesie </option>
                                            <option value="Porto_Rico">Porto_Rico </option>
                                            <option value="Portugal">Portugal </option>

                                            <option value="Qatar">Qatar </option>

                                            <option value="Republique_Dominicaine">Republique_Dominicaine </option>
                                            <option value="Republique_Tcheque">Republique_Tcheque </option>
                                            <option value="Reunion">Reunion </option>
                                            <option value="Roumanie">Roumanie </option>
                                            <option value="Royaume_Uni">Royaume_Uni </option>
                                            <option value="Russie">Russie </option>
                                            <option value="Rwanda">Rwanda </option>

                                            <option value="Sahara Occidental">Sahara Occidental </option>
                                            <option value="Sainte_Lucie">Sainte_Lucie </option>
                                            <option value="Saint_Marin">Saint_Marin </option>
                                            <option value="Salomon">Salomon </option>
                                            <option value="Salvador">Salvador </option>
                                            <option value="Samoa_Occidentales">Samoa_Occidentales</option>
                                            <option value="Samoa_Americaine">Samoa_Americaine </option>
                                            <option value="Sao_Tome_et_Principe">Sao_Tome_et_Principe </option>
                                            <option value="Senegal">Senegal </option>
                                            <option value="Seychelles">Seychelles </option>
                                            <option value="Sierra Leone">Sierra Leone </option>
                                            <option value="Singapour">Singapour </option>
                                            <option value="Slovaquie">Slovaquie </option>
                                            <option value="Slovenie">Slovenie</option>
                                            <option value="Somalie">Somalie </option>
                                            <option value="Soudan">Soudan </option>
                                            <option value="Sri_Lanka">Sri_Lanka </option>
                                            <option value="Suede">Suede </option>
                                            <option value="Suisse">Suisse </option>
                                            <option value="Surinam">Surinam </option>
                                            <option value="Swaziland">Swaziland </option>
                                            <option value="Syrie">Syrie </option>

                                            <option value="Tadjikistan">Tadjikistan </option>
                                            <option value="Taiwan">Taiwan </option>
                                            <option value="Tonga">Tonga </option>
                                            <option value="Tanzanie">Tanzanie </option>
                                            <option value="Tchad">Tchad </option>
                                            <option value="Thailande">Thailande </option>
                                            <option value="Tibet">Tibet </option>
                                            <option value="Timor_Oriental">Timor_Oriental </option>
                                            <option value="Togo">Togo </option>
                                            <option value="Trinite_et_Tobago">Trinite_et_Tobago </option>
                                            <option value="Tristan da cunha">Tristan de cuncha </option>
                                            <option value="Tunisie">Tunisie </option>
                                            <option value="Turkmenistan">Turmenistan </option>
                                            <option value="Turquie">Turquie </option>

                                            <option value="Ukraine">Ukraine </option>
                                            <option value="Uruguay">Uruguay </option>

                                            <option value="Vanuatu">Vanuatu </option>
                                            <option value="Vatican">Vatican </option>
                                            <option value="Venezuela">Venezuela </option>
                                            <option value="Vierges_Americaines">Vierges_Americaines </option>
                                            <option value="Vierges_Britanniques">Vierges_Britanniques </option>
                                            <option value="Vietnam">Vietnam </option>

                                            <option value="Wake">Wake </option>
                                            <option value="Wallis et Futuma">Wallis et Futuma </option>

                                            <option value="Yemen">Yemen </option>
                                            <option value="Yougoslavie">Yougoslavie </option>

                                            <option value="Zambie">Zambie </option>
                                            <option value="Zimbabwe">Zimbabwe </option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="ville_cart" class="form-label">Ville</label>
                                        <input type="text" class="form-control" id="ville_cart" name="ville_cart" placeholder="Ex: Le Mans" value="<?= $users['ville'] ?>" required>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="cp_cart" class="form-label">Code postal</label>
                                        <input type="text" class="form-control" id="cp_cart" name="cp_cart" value="<?= $users['cp'] ?>" placeholder="Ex: 72000" required>
                                    </div>

                                </div>

                                <hr class="my-4">

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="save_info">
                                    <label class="form-check-label" for="save_info">Conservez ces informations pour la prochaine fois</label>
                                </div>

                                <hr class="my-4">

                                <h4 class="mb-3">Paiement</h4>

                                <div class="my-3">

                                    <div class="form-check">
                                        <input id="credit_cart" name="paymentMethod" type="radio" class="form-check-input" checked required>
                                        <?php if (!preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4))) { ?>
                                            <label class="form-check-label" for="credit_cart">Carte de crédit</label>
                                        <?php } else { ?>
                                            <label class="form-check-label" for="credit_cart">Google Play Abonnement</label>
                                        <?php } ?>
                                    </div>

                                </div>

                                <div class="row gy-3">

                                    <input type="hidden" value="Abonnement LPE Pro - 1 mois - <?= '39,99 €' . ' - ' . date('d/m/Y H:i:s') ?>" id="description">

                                    <div id="card-element">
                                        <!--Stripe.js injects the Card Element-->
                                    </div>

                                </div>

                                <hr class="my-4">

                                <button class="w-100 btn btn-primary btn-lg" type="submit" id="submit_card">Continuer à payer</button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</main>

<!-- Footer-->
<?php include('modules/footer.php'); ?>