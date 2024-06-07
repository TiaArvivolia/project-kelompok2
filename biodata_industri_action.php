<?php
include_once('model/respon_biodata_industri.php');

$act = $_GET['act'];

if ($act == 'tambah') {
    // Set the default timezone to "Asia/Jakarta"
    date_default_timezone_set('Asia/Jakarta');

    // Get the current date and time
    $current_datetime = date("Y-m-d H:i:s");

    $data = [
        'responden_nama' => $_POST['responden_nama'],
        'responden_jabatan' => $_POST['responden_jabatan'],
        'responden_perusahaan' => $_POST['responden_perusahaan'],
        'responden_email' => $_POST['responden_email'],
        'responden_hp' => $_POST['responden_hp'],
        'responden_kota' => $_POST['responden_kota'],
        'responden_tanggal' => $current_datetime, // Use the current date and time
        'survey_id' => $_POST['survey_id'],
    ];

    $insert = new RespondenIndustri();
    $id = $insert->insertData($data);

    header('location: soal_industri.php?responden_industri_id=' . $id);
}
