<?php
include_once('model/respon_biodata_ortu.php');

$act = $_GET['act'];

if ($act == 'tambah') {
    // Set the default timezone to "Asia/Jakarta"
    date_default_timezone_set('Asia/Jakarta');

    // Get the current date and time
    $current_datetime = date("Y-m-d H:i:s");

    $data = [
        'responden_nama' => $_POST['responden_nama'],
        'responden_jk' => $_POST['responden_jk'],
        'responden_umur' => $_POST['responden_umur'],
        'responden_tanggal' => $current_datetime, // Use the current date and time
        'responden_pendidikan' => $_POST['responden_pendidikan'],
        'responden_pekerjaan' => $_POST['responden_pekerjaan'],
        'responden_penghasilan' => $_POST['responden_penghasilan'],
        'responden_hp' => $_POST['responden_hp'],
        'mahasiswa_nim' => $_POST['mahasiswa_nim'],
        'mahasiswa_nama' => $_POST['mahasiswa_nama'],
        'mahasiswa_prodi' => $_POST['mahasiswa_prodi'],
        'survey_id' => $_POST['survey_id'],
    ];

    $insert = new RespondenOrtu();
    $id = $insert->insertData($data);

    header('location: soal_ortu.php?responden_ortu_id=' . $id);
}
