<?php
include_once("model/jawab/jawab_alumni_model.php");
$jawabAlumni = new JawabAlumni(); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $responden_alumni_id = $_GET['responden_alumni_id'] ?? $id;

    if (!$responden_alumni_id) {
        die("Responden Alumni ID tidak ditemukan.");
    }

    $data = [
        'soal_id' => $_POST['soal_id'],
        'jawaban' => $_POST['jawaban']
    ];

    $jawabAlumni->insertJawaban($data, $responden_alumni_id);
    header("Location: terima_kasih.php");
    exit();
}
?>