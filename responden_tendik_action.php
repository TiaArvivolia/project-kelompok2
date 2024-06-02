<?php
include_once('model/respon_biodata_tendik.php'); // Adjusted the include file

$act = isset($_GET['act']) ? $_GET['act'] : '';

if ($act == 'tambah') {
    $data = [
        'responden_nama' => $_POST['responden_nama'],
        'responden_nopeg' => $_POST['responden_nopeg'],
        'responden_unit' => $_POST['responden_unit'],
        'responden_tanggal' => $_POST['responden_tanggal'],
        'survey_id' => $_POST['survey_id']
    ];

    $responden_tendik = new RespondenTendik();
    $responden_tendik->insertData($data);

    header('Location: responden_tendik.php?status=sukses&message=Data berhasil disimpan');
    exit();
}

if ($act == 'edit') {
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    if ($id) {
        $data = [
            'responden_nama' => $_POST['responden_nama'],
            'responden_nopeg' => $_POST['responden_nopeg'],
            'responden_unit' => $_POST['responden_unit'],
            'responden_tanggal' => $_POST['responden_tanggal'],
            'survey_id' => $_POST['survey_id']
        ];

        $responden_tendik = new RespondenTendik();
        $responden_tendik->updateData($data, $id);

        header('Location: responden_tendik.php?status=sukses&message=Data berhasil diubah');
        exit();
    }
}

if ($act == 'hapus') {
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    if ($id) {
        $responden_tendik = new RespondenTendik();
        $responden_tendik->deleteData($id);

        header('Location: responden_tendik.php?status=sukses&message=Data berhasil dihapus');
        exit();
    }
}

// Redirect to the main page if no valid action is specified
header('Location: responden_tendik.php');
exit();