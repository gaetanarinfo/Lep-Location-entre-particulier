<?php

// Affichage des erreurs  -->
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Importation des différents fichiers  -->
require_once('config/config-google.php');
include_once('config/connexion.php');
include_once('config/fonctions.php');
include_once('config/public.php');

if (isset($_GET["code"])) {

  //It will Attempt to exchange a code for an valid authentication token.    
  $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

  //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/  
  if (!isset($token['error'])) {

    //Set the access token used for requests    
    $google_client->setAccessToken($token['access_token']);

    //Store "access_token" value in $_SESSION variable for future use.
    $_SESSION['access_token'] = $token['access_token'];

    //Create Object of Google Service OAuth 2 class   
    $google_service = new Google_Service_Oauth2($google_client);

    //Get user profile data from google   
    $data = $google_service->userinfo->get();

    $update = $dbh->query('UPDATE `users` SET 
      `nom` = "' . $data['family_name'] . '",
      `prenom` = "' . $data['given_name'] . '",
      `avatar` = "' . $data['picture'] . '",
      `google_id` = "' . $data['id'] . '"
    WHERE email = "' . $data['email'] . '"');

    $_SESSION['logged'] = 'true';

    $req = $dbh->prepare('SELECT * FROM users WHERE id_site = 1 AND email = "' . $data['email'] . '"');
    $req->execute();
    $user = $req->fetch();

    if (isset($user)) {
      $_SESSION['user_id'] = $user['id'];
      header('Location: /mon-espace');
    }else{
      header('Location: /register');
    }
  } else {
    header('Location: /login');
  }
} else {
  header('Location: /login');
}
