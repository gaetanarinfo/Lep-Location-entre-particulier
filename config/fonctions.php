<?php

// API et librairies
use PHPMailer\PHPMailer\PHPMailer;

// Requêtes

$config = $dbh->query('
SELECT C.title AS title_site, C.meta_title, C.description AS description_site, C.meta_description, C.favicon, CM.active, CM.title AS menu_title, CM.icon AS menu_icon, CM.url AS menu_url 
FROM config AS C LEFT JOIN menu AS CM ON C.id = CM.id_site WHERE C.id = 1');

$header = $dbh->query('SELECT * FROM header WHERE id_site = 1');
$marketing = $dbh->query('SELECT * FROM marketing WHERE id_site = 1 ORDER BY ordre DESC');
$mission = $dbh->query('SELECT * FROM mission WHERE id_site = 1 ORDER BY ordre DESC');
$temoignages = $dbh->query('SELECT * FROM temoignages WHERE id_site = 1');
$blogs = $dbh->query('SELECT * FROM blog WHERE id_site = 1 LIMIT 0,6');
$ville_populaire = $dbh->query('SELECT * FROM ville_populaire WHERE id_site = 1');
$presentation = $dbh->query('SELECT * FROM presentation WHERE id_site = 1');
$regions = $dbh->query('SELECT * FROM regions WHERE id_site = 1 ORDER BY title ASC');

$appartements_last = $dbh->query('SELECT A.*, AT.title AS title_type FROM locations AS A LEFT JOIN locations_type AS AT ON AT.id = A.type WHERE A.id_site = 1 AND A.verification >= 1 AND A.abonnement_expire = 0 AND type <= 6 ORDER BY A.created_at DESC LIMIT 0,6');
$maisons_last = $dbh->query('SELECT A.*, AT.title AS title_type FROM locations AS A LEFT JOIN locations_type AS AT ON AT.id = A.type WHERE A.id_site = 1 AND A.verification >= 1 AND A.abonnement_expire = 0 AND type >= 7 ORDER BY A.created_at DESC LIMIT 0,6');

$locationsCols1 = $dbh->query('SELECT * FROM regions WHERE id_site = 1 AND colonne = 1');
$locationsCols2 = $dbh->query('SELECT * FROM regions WHERE id_site = 1 AND colonne = 2');

$blogs_all = $dbh->query('SELECT * FROM blog WHERE id_site = 1 ORDER BY created_at DESC LIMIT 0,9');

if (basename($_SERVER['PHP_SELF']) == "location.php") {
	$locations_req = $dbh->prepare('SELECT L.*, LT.title AS title_type FROM locations AS L LEFT JOIN locations_type AS LT ON L.type = LT.id WHERE L.url = :url AND L.abonnement_expire = 0 ');
	$locations_req->execute(array('url' => $_GET['url']));
	$location_req = $locations_req->fetch();

	$locations_duree_req = $dbh->prepare('SELECT * FROM locations_duree WHERE id = "' . $location_req['duree'] . '"');
	$locations_duree_req->execute();
	$ocations_duree = $locations_duree_req->fetch();

	// Location vues
	if ($_SERVER['REMOTE_ADDR'] != "31.33.145.219") {
		$update = $dbh->query('UPDATE `locations` SET `views` = `views` + 1 WHERE id = "' . $location_req['id'] . '"');

		$insert_annonce = $dbh->query('INSERT INTO `locations_views` (
			`location_id`,
			`ip`
		) VALUES (
			"' . $location_req['id'] . '",
			"' . $_SERVER['REMOTE_ADDR'] . '"
	)');
	}
}

if (basename($_SERVER['PHP_SELF']) == "actualite.php") {
	$actualite = $dbh->prepare('SELECT url FROM blog WHERE url = :url');
	$actualite->execute(array('url' => $_GET['url']));
	$actualite_url = $actualite->fetch();
}

if (!empty($actualite_url)) {
	$actualite_req = $dbh->prepare('SELECT B.* FROM blog AS B WHERE B.url = :url');
	$actualite_req->execute(array('url' => $_GET['url']));
	$actualite = $actualite_req->fetch();

	// Article vues
	if ($_SERVER['REMOTE_ADDR'] != "31.33.145.219") {
		$update = $dbh->query('UPDATE `blog` SET `views` = `views` + 1 WHERE id = "' . $actualite['id'] . '"');
	}

	$last_actualites = $dbh->prepare('SELECT * FROM blog WHERE url != :url AND id_site = 1 ORDER BY created_at DESC LIMIT 0,20');
	$last_actualites->execute(array('url' => $_GET['url']));
	$last_actualite = $last_actualites->fetchAll();
}

$loc_counts = $dbh->prepare('SELECT id FROM locations WHERE verification = 1 AND type <= 6 AND abonnement_expire = 0');
$loc_counts->execute();
$loc_count = $loc_counts->fetchAll();

$loc_counts2 = $dbh->prepare('SELECT id FROM locations WHERE verification = 1 AND type >= 7 AND abonnement_expire = 0');
$loc_counts2->execute();
$loc_count2 = $loc_counts2->fetchAll();

$locations_req = $dbh->query('SELECT L.*, LT.title as title_type FROM locations AS L LEFT JOIN locations_type AS LT ON L.type = LT.id WHERE L.id_site = 1 AND L.verification = 1 AND L.abonnement_expire = 0 AND L.prix <= 2500 AND L.chambres <= 1 AND L.pieces <= 1 ORDER BY L.created_at DESC');
$locations = $locations_req->fetchAll();

$locations_req_m = $dbh->query('SELECT L.*, LT.title as title_type FROM locations AS L LEFT JOIN locations_type AS LT ON L.type = LT.id WHERE L.id_site = 1 AND L.type >= 7 AND L.verification = 1 AND L.abonnement_expire = 0 AND L.prix <= 2500 AND L.chambres <= 1 AND L.pieces <= 1 ORDER BY L.created_at DESC');
$locations_maisons = $locations_req_m->fetchAll();

$locations_req_a = $dbh->query('SELECT L.*, LT.title as title_type FROM locations AS L LEFT JOIN locations_type AS LT ON L.type = LT.id WHERE L.id_site = 1 AND L.type <= 6 AND L.verification = 1 AND L.abonnement_expire = 0 AND L.prix <= 2500 AND L.chambres <= 1 AND L.pieces <= 1 ORDER BY L.created_at DESC');
$locations_appartements = $locations_req_a->fetchAll();

if (basename($_SERVER['PHP_SELF']) == "locations-populaires.php") {

	// Comparaison avec la table villes et le get url
	$villes_france_req = $dbh->prepare('SELECT ville_slug, ville_nom_reel FROM villes_france WHERE ville_slug = "' . $_GET['url'] . '"');
	$villes_france_req->execute();
	$villes_france = $villes_france_req->fetch();

	$locations_req_populaires = $dbh->query('SELECT L.*, LT.title as title_type FROM locations AS L LEFT JOIN locations_type AS LT ON L.type = LT.id WHERE L.id_site = 1 AND L.abonnement_expire = 0 AND L.location LIKE "' . $villes_france['ville_slug'] . '%" AND L.verification = 1 AND L.prix <= 2500 AND L.chambres <= 1 AND L.pieces <= 1 ORDER BY L.created_at DESC');
	$locations_populaires = $locations_req_populaires->fetchAll();
}

$config_row = $config->fetch(PDO::FETCH_ASSOC);
$menu_row = $config->fetchAll();
$header_row = $header->fetch(PDO::FETCH_ASSOC);
$marketing_row = $marketing->fetchAll();
$mission_row = $mission->fetchAll();
$temoignages_row = $temoignages->fetch(PDO::FETCH_ASSOC);
$blogs_row = $blogs->fetchAll();
$blogs_rows = $blogs_all->fetchAll();
$ville_populaire_row = $ville_populaire->fetchAll();
$presentation_row = $presentation->fetch(PDO::FETCH_ASSOC);
$appartements_last_row = $appartements_last->fetchAll();
$maisons_last_row = $maisons_last->fetchAll();
$locationsCols1_last_row = $locationsCols1->fetchAll();
$locationsCols2_last_row = $locationsCols2->fetchAll();

// User

if (isset($_SESSION['user_id'])) {
	$req_user = $dbh->prepare('SELECT * FROM users WHERE id_site = 1 AND id = :id');
	$req_user->execute(array('id' => $_SESSION['user_id']));
	$users = $req_user->fetch();
}

// -------- //

// Refund

if (basename($_SERVER['PHP_SELF']) == "refund.php") {

	$refund_req = $dbh->prepare('SELECT * FROM contact_location_history WHERE token = "' . $_GET['token'] . '"');
	$refund_req->execute();
	$refund = $refund_req->fetch();
}

if (basename($_SERVER['PHP_SELF']) == "refund-pro.php") {

	$refund_req = $dbh->prepare('SELECT * FROM subscriptions WHERE token = "' . $_GET['token'] . '"');
	$refund_req->execute();
	$refund = $refund_req->fetch();
}

// -------- //

// User logged

if (isset($_SESSION['user_id'])) {
	$locations_user_req = $dbh->query('SELECT L.*, LT.title as title_type FROM locations AS L LEFT JOIN locations_type AS LT ON L.type = LT.id WHERE L.id_site = 1 AND L.user_id = "' . $_SESSION['user_id'] . '" ORDER BY L.created_at DESC LIMIT 0,8');
	$locations_user_req->execute();
	$locations_user = $locations_user_req->fetchAll();

	$locations_user_req_all = $dbh->query('SELECT L.*, LT.title as title_type FROM locations AS L LEFT JOIN locations_type AS LT ON L.type = LT.id WHERE L.id_site = 1 AND L.user_id = "' . $_SESSION['user_id'] . '" AND L.abonnement_expire = 0 ORDER BY L.created_at DESC');
	$locations_user_req_all->execute();
	$locations_user_all = $locations_user_req_all->fetchAll();

	$locations_user_req_all2 = $dbh->query('SELECT L.*, LT.title as title_type FROM locations AS L LEFT JOIN locations_type AS LT ON L.type = LT.id WHERE L.id_site = 1 AND L.user_id = "' . $_SESSION['user_id'] . '" AND L.disponibilite = 0 ORDER BY L.created_at DESC');
	$locations_user_req_all2->execute();
	$locations_user_all2 = $locations_user_req_all2->fetchAll();

	$subscription_req = $dbh->prepare('SELECT * FROM subscriptions WHERE user_id = "' . $_SESSION['user_id'] . '" ORDER BY created_at DESC LIMIT 0,6');
	$subscription_req->execute();
	$subscriptions = $subscription_req->fetchAll();

	$ubscriptions_all_req = $dbh->prepare('SELECT * FROM subscriptions WHERE user_id = "' . $_SESSION['user_id'] . '" ORDER BY created_at DESC');
	$ubscriptions_all_req->execute();
	$subscriptions_all = $ubscriptions_all_req->fetchAll();

	if (!empty($_GET['url']) && basename($_SERVER['PHP_SELF']) == "location-statistiques.php" OR basename($_SERVER['PHP_SELF']) == "modification-location.php") {
		$location_req_user = $dbh->prepare('SELECT * FROM locations WHERE user_id = "' . $_SESSION['user_id'] . '" AND url = "' . $_GET['url'] . '" ORDER BY created_at DESC');
		$location_req_user->execute();
		$location_user = $location_req_user->fetch();

		$months_req = $dbh->prepare('SELECT * FROM months');
		$months_req->execute();
		$months = $months_req->fetchAll();
	}
}

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

$presentation_config = [
	'title' => $presentation_row['title'],
	'description' => $presentation_row['description'],
	'image' => $presentation_row['image']
];

// -------- //

// Envoi de mails

function sendMail($from, $from_name, $to, $to_name, $reply, $reply_name, $subject, $content, $dbh, $attachments = array())
{

	$return = '';

	if (!empty($to)) {

		if (!class_exists('PHPMailer\PHPMailer\Exception')) {
			require __DIR__ . '/../mail/src/Exception.php';
			require __DIR__ . '/../mail/src/PHPMailer.php';
			require __DIR__ . '/../mail/src/SMTP.php';
		}

		$config_req = $dbh->query('SELECT * FROM config WHERE id = 1');
		$config = $config_req->fetch(PDO::FETCH_ASSOC);

		$mail = new PHPMailer();
		$mail->SMTPDebug = 0;
		$mail->CharSet = PHPMailer::CHARSET_UTF8;
		$mail->isHTML();
		$mail->isSMTP();
		$mail->SMTPAuth = true;

		$mail->Host = $config['mail_Host'];
		$mail->Username = $config['mail_Username'];
		$mail->Password = $config['mail_Password'];
		$mail->SMTPSecure = $config['mail_SMTPSecure'];
		$mail->Port = $config['mail_Port'];

		$mail->setFrom($from, $from_name);

		if (!empty($reply) or $reply == '0') {
			if (!empty($$reply_name)) {
				$mail->addReplyTo($reply, $reply_name);
			} else {
				$mail->addReplyTo($reply, $reply);
			}
		}

		$mail->addAddress($to, $to_name);

		if (!empty($attachments)) {
			$mail->addStringAttachment(file_get_contents($attachments['url']), $attachments['name']);
		}

		$mail->Subject = $subject;
		$mail->msgHTML($content);
		$mail->AltBody = $content;

		if ($mail->send()) {
			$return = "Votre message a bien été envoyé";
		}
	} else {
		$return = "to empty";
	}

	return $return;
}

// -------- //

// Transforme l'url //

function makeUrl($url)
{
	$return = mb_strtolower($url, 'UTF-8');
	$return = str_replace(array('é', 'è', 'ê', 'ë', 'à', 'â', 'î', 'ï', 'ô', 'ù', 'û', 'ç', 'ñ'), array('e', 'e', 'e', 'e', 'a', 'a', 'i', 'i', 'o', 'u', 'u', 'c', 'n'), $return);
	$return = preg_replace('/\W+/', '-', strtolower($return));
	$return = urlencode($return);
	$return = trim(preg_replace("![^a-z0-9]+!i", "-", $return), '-');
	return $return;
}

// -------- //

// Générer nombre et lettre aléatoire //

function genererChaineAleatoire($longueur = 10)
{
	$caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$longueurMax = strlen($caracteres);
	$chaineAleatoire = '';

	for ($i = 0; $i < $longueur; $i++) {
		$chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
	}

	return $chaineAleatoire;
}

// -------- //
