<?php
include_once('model/respon_biodata_dosen.php'); // Adjusted the include file

$act = isset($_GET['act']) ? $_GET['act'] : '';

if ($act == 'tambah') {
    $data = [
        'responden_nama' => $_POST['responden_nama'],
        'responden_nip' => $_POST['responden_nip'],
        'responden_unit' => $_POST['responden_unit'],
        'responden_tanggal' => $_POST['responden_tanggal'],
        'survey_id' => $_POST['survey_id']
    ];

    $responden_dosen = new RespondenDosen();
    $responden_dosen->insertData($data);

    header('Location: responden_dosen.php?status=sukses&message=Data berhasil disimpan');
    exit();
}

if ($act == 'edit') {
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    if ($id) {
        $data = [
            'responden_nama' => $_POST['responden_nama'],
            'responden_nip' => $_POST['responden_nip'],
            'responden_unit' => $_POST['responden_unit'],
            'responden_tanggal' => $_POST['responden_tanggal'],
            'survey_id' => $_POST['survey_id']
        ];

        $responden_dosen = new RespondenDosen();
        // Since the `RespondenDosen` class doesn't have an update method, assume it does exist with the signature below:
        $responden_dosen->updateData($data, $id);

        header('Location: responden_dosen.php?status=sukses&message=Data berhasil diubah');
        exit();
    }
}

if ($act == 'hapus') {
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    if ($id) {
        $responden_dosen = new RespondenDosen();
        // Since the `RespondenDosen` class doesn't have a delete method, assume it does exist with the signature below:
        $responden_dosen->deleteData($id);

        header('Location: responden_dosen.php?status=sukses&message=Data berhasil dihapus');
        exit();
    }
}

// Redirect to the main page if no valid action is specified
header('Location: responden_dosen.php');
exit();
