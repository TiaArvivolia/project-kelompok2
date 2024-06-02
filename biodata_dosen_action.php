<?php
include_once('model/respon_biodata_dosen.php');

$act = $_GET['act'];

if ($act == 'tambah') {
    $data = [
        'responden_nama' => $_POST['responden_nama'],
        'responden_nip' => $_POST['responden_nip'],
        'responden_unit' => $_POST['responden_unit'],
        'responden_tanggal' => $_POST['responden_tanggal'],
        'survey_id' => $_POST['survey_id'],
    ];

    $insert = new RespondenDosen();
    $id = $insert->insertData($data);
    
    header('location: soal_dosen.php?responden_dosen_id='.$id);
}
?>