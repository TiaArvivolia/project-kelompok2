<?php
include_once("model/jawab/jawab_tendik_model.php");
$jawabTendik = new JawabTendik();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $responden_tendik_id = $_GET['responden_tendik_id'] ?? $id;

    if (!$responden_tendik_id) {
        die("Responden tendik ID tidak ditemukan.");
    }

    $data = [
        'soal_id' => $_POST['soal_id'],
        'jawaban' => $_POST['jawaban']
    ];

    $jawabTendik->insertJawaban($data, $responden_tendik_id);
    header("Location: terima_kasih.php");
}
?>