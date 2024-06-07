<?php
include_once('model/respon_biodata_dosen.php');

$act = $_GET['act'];

if ($act == 'tambah') {
    // Set the default timezone to "Asia/Jakarta"
    date_default_timezone_set('Asia/Jakarta');

    // Get the current date and time
    $current_datetime = date("Y-m-d H:i:s");

    $data = [
        'responden_nama' => $_POST['responden_nama'],
        'responden_nip' => $_POST['responden_nip'],
        'responden_unit' => $_POST['responden_unit'],
        'responden_tanggal' => $current_datetime, // Use the current date and time
        'survey_id' => $_POST['survey_id'],
    ];

    $insert = new RespondenDosen();
    $id = $insert->insertData($data);

    header('location: soal_dosen.php?responden_dosen_id=' . $id);
}
