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


if (!empty($_POST)) {

    $urlencoded_string = urlencode($_POST['value']);

    $url = "https://api-adresse.data.gouv.fr/search?q=" . $urlencoded_string;

    // Initializing curl
    $curl = curl_init();

    // Sending GET request to reqres.in
    // server to get JSON data
    curl_setopt(
        $curl,
        CURLOPT_URL,
        $url
    );

    // Telling curl to store JSON
    // data in a variable instead
    // of dumping on screen
    curl_setopt(
        $curl,
        CURLOPT_RETURNTRANSFER,
        true
    );

    // Executing curl
    $response = curl_exec($curl);

    // Checking if any error occurs
    // during request or not
    if ($e = curl_error($curl)) {
        echo $e;
    } else {

        // Decoding JSON data
        $decodedData =
            json_decode($response, true);

        // Outputting JSON data in
        // Decoded form
        // var_dump($decodedData["features"][0]['properties']);

        foreach ($decodedData["features"] as $value) {
            echo '<li class="clic-adresse-input" data-cp="' . $value['properties']['postcode'] . '" data-city="' . $value['properties']['city'] . '" data-adresse="' . $value['properties']['name'] . '">' . $value['properties']['name'] . ' ' . $value['properties']['postcode'] . ' ' . $value['properties']['city'] . '</li>';
        }
    }

    // Closing curl
    curl_close($curl);
}
