<?php
include_once("model/jawab/jawab_mahasiswa_model.php");
$jawabMahasiswa = new JawabMahasiswa(); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $responden_mahasiswa_id = $_GET['responden_mahasiswa_id'] ?? $id;

    if (!$responden_mahasiswa_id) {
        die("Responden Mahasiswa ID tidak ditemukan.");
    }

    $data = [
        'soal_id' => $_POST['soal_id'],
        'jawaban' => $_POST['jawaban']
    ];

    $jawabMahasiswa->insertJawaban($data, $responden_mahasiswa_id);
    header("Location: terima_kasih.php");
    exit();
}
?>