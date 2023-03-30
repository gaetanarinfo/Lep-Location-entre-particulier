<?php

// Requêtes

$config = $dbh->query('
SELECT C.title AS title_site, C.meta_title, C.description AS description_site, C.meta_description, C.favicon, CM.title AS menu_title, CM.icon AS menu_icon, CM.url AS menu_url 
FROM config AS C LEFT JOIN menu AS CM ON C.id = CM.id_site WHERE C.id = 1');

$header = $dbh->query('SELECT * FROM header WHERE id_site = 1');

$marketing = $dbh->query('SELECT * FROM marketing WHERE id_site = 1 ORDER BY ordre DESC');

$mission = $dbh->query('SELECT * FROM mission WHERE id_site = 1 ORDER BY ordre DESC');

$temoignages = $dbh->query('SELECT * FROM temoignages WHERE id_site = 1');

$blogs = $dbh->query('SELECT * FROM blog WHERE id_site = 1');

$config_row = $config->fetch(PDO::FETCH_ASSOC);
$menu_row = $config->fetchAll();
$header_row = $header->fetch(PDO::FETCH_ASSOC);
$marketing_row = $marketing->fetchAll();
$mission_row = $mission->fetchAll();
$temoignages_row = $temoignages->fetch(PDO::FETCH_ASSOC);
$blogs_row = $blogs->fetchAll();

// -------- //

// Variables

$site_config = [
    'meta_title' => $config_row['meta_title'],
    'meta_description' => $config_row['meta_description'],
    'title' => $config_row['title_site'],
    'description' => $config_row['description_site'],
    'favicon' => $config_row['favicon']
];

$header_config = [
    'title' => $header_row['title'],
    'description' => $header_row['description'],
    'image' => $header_row['image'],
    'image_2' => $header_row['image_2'],
    'image_3' => $header_row['image_3'],
    'position' => $header_row['position'],
    'title_bouton_1' => $header_row['title_bouton_1'],
    'url_bouton_1' => $header_row['url_bouton_1'],
    'color_bouton_1' => $header_row['color_bouton_1'],
    'bouton_1' => $header_row['bouton_1'],
    'title_bouton_2' => $header_row['title_bouton_2'],
    'url_bouton_2' => $header_row['url_bouton_2'],
    'color_bouton_2' => $header_row['color_bouton_2'],
    'bouton_2' => $header_row['bouton_2']
];

$temoignages_config = [
    'author' => $temoignages_row['author'],
    'title' => $temoignages_row['title'],
    'position' => $temoignages_row['position']
];

// -------- //