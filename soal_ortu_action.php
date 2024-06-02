<?php
include_once("model/jawab/jawab_ortu_model.php");
$jawabOrtu = new JawabOrtu(); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $responden_ortu_id = $_GET['responden_ortu_id'] ?? $id;

    if (!$responden_ortu_id) {
        die("Responden Orang Tua ID tidak ditemukan.");
    }

    $data = [
        'soal_id' => $_POST['soal_id'],
        'jawaban' => $_POST['jawaban']
    ];

    $jawabOrtu->insertJawaban($data, $responden_ortu_id);
    header("Location: terima_kasih.php");
    exit();
}
?>