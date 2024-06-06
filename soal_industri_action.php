<?php
include_once("model/jawab/jawab_industri_model.php");
$jawabIndustri = new JawabIndustri();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $responden_industri_id = $_GET['responden_industri_id'] ?? $id;

    if (!$responden_industri_id) {
        die("Responden Industri ID tidak ditemukan.");
    }

    $data = [
        'soal_id' => $_POST['soal_id'],
        'jawaban' => $_POST['jawaban']
    ];

    $jawabIndustri->insertJawaban($data,$responden_industri_id);
    header("Location: terima_kasih.php");
}
?>