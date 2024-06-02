<?php
include_once('model/respon_biodata_tendik.php');

$act = $_GET['act'];

if ($act == 'tambah') {
    $data = [
        'responden_nama' => $_POST['responden_nama'],
        'responden_nopeg' => $_POST['responden_nopeg'],
        'responden_unit' => $_POST['responden_unit'],
        'responden_tanggal' => $_POST['responden_tanggal'],
        'survey_id' => $_POST['survey_id'],
    ];

    $insert = new RespondenTendik();
    $id = $insert->insertData($data);
    
    header('location: soal_tendik.php?responden_tendik_id='.$id);
}

?>