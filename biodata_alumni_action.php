<?php
include_once('model/respon_biodata_alumni.php');

$act = $_GET['act'];

if ($act == 'tambah') {
    $data = [
        'responden_nama' => $_POST['responden_nama'],
        'responden_nim' => $_POST['responden_nim'],
        'responden_prodi' => $_POST['responden_prodi'],
        'responden_tanggal' => $_POST['responden_tanggal'],
        'responden_email' => $_POST['responden_email'],
        'responden_hp' => $_POST['responden_hp'],
        'tahun_lulus' => $_POST['tahun_lulus'],
        'survey_id' => $_POST['survey_id'],
    ];

    $insert = new RespondenAlumni();
    $id = $insert->insertData($data);
    
    header('location: soal_alumni.php?responden_alumni_id='.$id);
}

?>