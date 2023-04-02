<?php

// API et librairies
use PHPMailer\PHPMailer\PHPMailer;

// Requêtes

$config = $dbh->query('
SELECT C.title AS title_site, C.meta_title, C.description AS description_site, C.meta_description, C.favicon, CM.title AS menu_title, CM.icon AS menu_icon, CM.url AS menu_url 
FROM config AS C LEFT JOIN menu AS CM ON C.id = CM.id_site WHERE C.id = 1');

$header = $dbh->query('SELECT * FROM header WHERE id_site = 1');
$marketing = $dbh->query('SELECT * FROM marketing WHERE id_site = 1 ORDER BY ordre DESC');
$mission = $dbh->query('SELECT * FROM mission WHERE id_site = 1 ORDER BY ordre DESC');
$temoignages = $dbh->query('SELECT * FROM temoignages WHERE id_site = 1');
$blogs = $dbh->query('SELECT * FROM blog WHERE id_site = 1');
$ville_populaire = $dbh->query('SELECT * FROM ville_populaire WHERE id_site = 1');
$presentation = $dbh->query('SELECT * FROM presentation WHERE id_site = 1');

$appartements_last = $dbh->query('SELECT A.*, AT.title AS title_type FROM appartements AS A LEFT JOIN appartements_type AS AT ON AT.id = A.type WHERE A.id_site = 1 ORDER BY A.created_at DESC LIMIT 0,6');
$maisons_last = $dbh->query('SELECT M.*, MT.title AS title_type FROM maisons AS M LEFT JOIN maisons_type AS MT ON MT.id = M.type WHERE M.id_site = 1 ORDER BY M.created_at DESC LIMIT 0,6');

$locationsCols1 = $dbh->query('SELECT * FROM regions WHERE id_site = 1 AND colonne = 1');
$locationsCols2 = $dbh->query('SELECT * FROM regions WHERE id_site = 1 AND colonne = 2');

$config_row = $config->fetch(PDO::FETCH_ASSOC);
$menu_row = $config->fetchAll();
$header_row = $header->fetch(PDO::FETCH_ASSOC);
$marketing_row = $marketing->fetchAll();
$mission_row = $mission->fetchAll();
$temoignages_row = $temoignages->fetch(PDO::FETCH_ASSOC);
$blogs_row = $blogs->fetchAll();
$ville_populaire_row = $ville_populaire->fetchAll();
$presentation_row = $presentation->fetch(PDO::FETCH_ASSOC);
$appartements_last_row = $appartements_last->fetchAll();
$maisons_last_row = $maisons_last->fetchAll();
$locationsCols1_last_row = $locationsCols1->fetchAll();
$locationsCols2_last_row = $locationsCols2->fetchAll();

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

function sendMail($from, $from_name, $to, $to_name, $reply, $reply_name, $subject, $content, $config, $attachments = array())
{

	if (!empty($to)) {

		if (!class_exists('PHPMailer\PHPMailer\Exception')) {
			require __DIR__ . '/../mail/src/Exception.php';
			require __DIR__ . '/../mail/src/PHPMailer.php';
			require __DIR__ . '/../mail/src/SMTP.php';
		}

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
			foreach ($attachments as $attachment) {
				$mail->addStringAttachment(file_get_contents($attachment['url']), $attachment['name']);
			}
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
