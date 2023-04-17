<?php

// Génération du pdf (Facture)
require('tfpdf.php');

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}else {
    $user_id = 0;
}

$bon_commandes = $dbh->query('INSERT INTO `factures`(
    `token`, 
    `user_id`, 
    `created_at`
) VALUES (
    "' . $token . '",
    "' . $user_id . '",
    "' . date('Y-m-d H:i:s') . '"
)');

$lastIdBon = $dbh->lastInsertId();

$facture_numero = $dbh->lastInsertId() . '-' . date('dmY');

class PDF extends FPDF
{
    /* Page header */
    function Header()
    {
        /* Logo */
        $this->Image('https://location-entre-particulier.fr/public/assets/images/favicon.png', 8, 3, 25, 0, null);
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial', '', 10);

// Ligne de séparation
$pdf->Ln(24);

$pdf->Cell(0, 5, 'Facture du ' . date('d/m/Y'), 0, 22, 'R');

$pdf->Cell(0, 6, mb_convert_encoding('N° ' . $facture_numero, 'ISO-8859-1', 'UTF-8'), 0, 24, 'R');

// Ligne de séparation
$pdf->Ln(10);


$pdf->Cell(0, 6, mb_convert_encoding('LEP - Location entre particulier', 'ISO-8859-1', 'UTF-8'), 0, 22, 'L');
$pdf->Cell(0, 6, mb_convert_encoding('Seigneur' . ' ' . 'Gaëtan', 'ISO-8859-1', 'UTF-8'), 0, 22, 'L');
$pdf->Cell(0, 6, mb_convert_encoding('125 avenue Félix Geneslay', 'ISO-8859-1', 'UTF-8'), 0, 22, 'L');
$pdf->Cell(0, 6, mb_convert_encoding('Le Mans' . ' ' . '72100', 'ISO-8859-1', 'UTF-8'), 0, 22, 'L');
$pdf->Cell(0, 6, mb_convert_encoding('France', 'ISO-8859-1', 'UTF-8'), 0, 22, 'L');
$pdf->Cell(0, 6, mb_convert_encoding('contact@location-entre-particulier.fr', 'ISO-8859-1', 'UTF-8'), 0, 22, 'L');

$pdf->Cell(0, 6, mb_convert_encoding($email, 'ISO-8859-1', 'UTF-8'), 0, 22, 'R');

// Ligne de séparation
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 10);

/*Heading Of the table*/
$pdf->Cell(75, 6, 'Produit', 1, 0, 'C');
$pdf->Cell(75, 6, 'Description', 1, 0, 'C');
$pdf->Cell(20, 6,  mb_convert_encoding('Qte', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
$pdf->Cell(18, 6, 'Prix ', 1, 1, 'C');
/*end of line*/

/*Heading Of the table end*/
$pdf->SetFont('Arial', '', 10);

$quantity = 1;

$pdf->Cell(150, 6, str_replace('&EACUTE;E', 'E', (strtoupper('LEP PRO - Abonnement' . ' - ' . '1 mois'))), 1, 0, 'L');
$pdf->Cell(20, 6, $quantity, 1, 0, 'R');

$pdf->Cell(18, 6, number_format(29.99, 2, ",", "") . ' ' . iconv('UTF-8', 'windows-1252', '€'), 1, 1, 'R');

$tva = round((29.99 * 20.00) / 100, 2);

// Total HT
$pdf->Cell(138, 6, '', 0, 0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(25, 6, 'Total HT 20%', 0, 0, 'R');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(25, 6, number_format(29.99, 2, ',', '') . ' ' . iconv('UTF-8', 'windows-1252', '€'), 1, 1, 'R');

// Total TTC
$pdf->Cell(138, 6, '', 0, 0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(25, 6, 'Total TTC', 0, 0, 'R');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(25, 6, number_format(round(29.99 + $tva, 2), 2, ',', ' ') . ' ' . iconv('UTF-8', 'windows-1252', '€'), 1, 1, 'R');

// Ligne de séparation
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 6, 'Instructions de paiement :', 0, 22, 'L');

$pdf->SetFont('Arial', '', 10);

$pdf->Cell(0, 6, mb_convert_encoding('Paiement par carte bancaire', 'ISO-8859-1', 'UTF-8'), 0, 22, 'L');
$pdf->Cell(0, 6, mb_convert_encoding('Sur site internet', 'ISO-8859-1', 'UTF-8'), 0, 22, 'L');

// Ligne de séparation
$pdf->Ln(10);

$pdf->Cell(0, 6, mb_convert_encoding('Nous vous remercions de votre confiance.', 'ISO-8859-1', 'UTF-8'), 0, 22, 'L');
$pdf->Cell(0, 6, mb_convert_encoding('Cordialement', 'ISO-8859-1', 'UTF-8'), 0, 22, 'L');

$bon_commandes = $dbh->query('UPDATE `factures` SET `file` = "' . $facture_numero . '.pdf' . '" WHERE `id` = "' . $lastIdBon . '"');

// Upload sur serveur
$filename = "pdf/paiements/" . $facture_numero . '.pdf';
$pdf->Output(__DIR__ . '/../../' . $filename, 'F', true);
