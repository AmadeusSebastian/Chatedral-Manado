<?php
// Katedral/user/unduh_warta.php
require_once '../vendor/autoload.php';
require_once '../admin/includes/db_connect.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d');

$stmt = $conn->prepare("SELECT * FROM tbl_liturgi WHERE tanggal = ?");
$stmt->bind_param("s", $tanggal);
$stmt->execute();
$result = $stmt->get_result();
$liturgi = $result->fetch_assoc();

if (!$liturgi) {
    die("Data liturgi tidak ditemukan untuk tanggal ini.");
}

$nama_hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
$nama_bulan = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
$tgl_db = strtotime($tanggal);
$hari = $nama_hari[date('w', $tgl_db)];
$tgl_format = date('j', $tgl_db) . " " . $nama_bulan[date('n', $tgl_db)] . " " . date('Y', $tgl_db);

$html = '
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Warta Liturgi - '.$tgl_format.'</title>
    <style>
        body { font-family: Helvetica, Arial, sans-serif; line-height: 1.5; font-size: 14px; color: #333; margin: 0; padding: 0; }
        h1 { text-align: center; margin-bottom: 0; font-size: 24px; text-transform: uppercase; }
        .subtitle { text-align: center; color: #555; margin-top: 5px; margin-bottom: 20px; font-size: 16px; }
        .border-bottom { border-bottom: 2px solid #000; margin-bottom: 20px; }
        .pengantar { font-style: italic; text-align: center; margin-bottom: 30px; font-size: 16px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; page-break-inside: avoid; }
        th, td { padding: 8px; vertical-align: top; }
        .section-title { font-size: 16px; font-weight: bold; text-transform: uppercase; border-bottom: 1px solid #ccc; padding-bottom: 3px; margin-bottom: 10px; margin-top: 15px; }
        .renungan { border: 1px solid #000; padding: 15px; background-color: #f9f9f9; page-break-inside: avoid; margin-top: 30px; }
        .renungan h3 { margin-top: 0; text-align: center; font-size: 18px; }
        .text-justify { text-align: justify; }
        .avoid-break { page-break-inside: avoid; }
    </style>
</head>
<body>
    <div class="border-bottom">
        <h1>Warta Liturgi Katedral</h1>
        <div class="subtitle">'.$hari.', '.$tgl_format.'</div>
    </div>';

if (!empty($liturgi['kata_pengantar'])) {
    $html .= '<div class="pengantar avoid-break">"'.htmlspecialchars($liturgi['kata_pengantar']).'"</div>';
}

$html .= '<table style="width: 100%;">';

if (!empty($liturgi['bacaan_1'])) {
    $html .= '<tr class="avoid-break">
        <td style="width: 100%;">
            <div class="section-title">Bacaan Pertama</div>
            <div class="text-justify">'.nl2br(htmlspecialchars($liturgi['bacaan_1'])).'</div>
        </td>
    </tr>';
}

if (!empty($liturgi['mazmur_tanggapan'])) {
    $html .= '<tr class="avoid-break">
        <td style="width: 100%;">
            <div class="section-title">Mazmur Tanggapan</div>
            <div class="text-justify">'.nl2br(htmlspecialchars($liturgi['mazmur_tanggapan'])).'</div>
        </td>
    </tr>';
}

if (!empty($liturgi['bacaan_2'])) {
    $html .= '<tr class="avoid-break">
        <td style="width: 100%;">
            <div class="section-title">Bacaan Kedua</div>
            <div class="text-justify">'.nl2br(htmlspecialchars($liturgi['bacaan_2'])).'</div>
        </td>
    </tr>';
}

if (!empty($liturgi['bait_pengantar_injil'])) {
    $html .= '<tr class="avoid-break">
        <td style="width: 100%;">
            <div class="section-title">Bait Pengantar Injil</div>
            <div class="text-justify">'.nl2br(htmlspecialchars($liturgi['bait_pengantar_injil'])).'</div>
        </td>
    </tr>';
}

if (!empty($liturgi['bacaan_injil'])) {
    $html .= '<tr class="avoid-break">
        <td style="width: 100%;">
            <div class="section-title">Bacaan Injil</div>
            <div class="text-justify">'.nl2br(htmlspecialchars($liturgi['bacaan_injil'])).'</div>
        </td>
    </tr>';
}

$html .= '</table>';

if (!empty($liturgi['renungan'])) {
    $html .= '
    <div class="renungan avoid-break">
        <h3>Renungan Singkat</h3>
        <div class="text-justify">'.nl2br(htmlspecialchars($liturgi['renungan'])).'</div>
    </div>';
}

$html .= '
</body>
</html>';

$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);

$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

$filename = "Warta_Liturgi_" . date('Ymd', $tgl_db) . ".pdf";
$dompdf->stream($filename, ["Attachment" => true]);
?>
