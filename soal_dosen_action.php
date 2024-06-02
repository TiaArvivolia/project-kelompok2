<?php
include_once("model/jawab/jawab_dosen_model.php");
$jawabDosen = new JawabDosen();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $responden_dosen_id = $_GET['responden_dosen_id'] ?? $id;

    if (!$responden_dosen_id) {
        die("Responden dosen ID tidak ditemukan.");
    }

    $data = [
        'soal_id' => $_POST['soal_id'],
        'jawaban' => $_POST['jawaban']
    ];

    $jawabDosen->insertJawaban($data, $responden_dosen_id);
    header("Location: terima_kasih.php");
}
?>