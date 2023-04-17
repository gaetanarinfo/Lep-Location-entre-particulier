<?php

$urlencoded_string = urlencode($_POST['address'] . ' ' . $_POST['cp'] . ' ' . $_POST['location']);

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
    $longitude = $decodedData["features"][0]["geometry"]["coordinates"][0];
    $latitude = $decodedData["features"][0]["geometry"]["coordinates"][1];

}

// Closing curl
curl_close($curl);
