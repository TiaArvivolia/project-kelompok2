<?php
include_once('model/respon_biodata_alumni.php'); // Adjusted the include file

$act = isset($_GET['act']) ? $_GET['act'] : '';

if ($act == 'tambah') {
    $data = [
        'responden_nama' => $_POST['responden_nama'],
        'responden_nim' => $_POST['responden_nim'],
        'responden_prodi' => $_POST['responden_prodi'],
        'responden_email' => $_POST['responden_email'],
        'responden_hp' => $_POST['responden_hp'],
        'tahun_lulus' => $_POST['tahun_lulus'],
        'responden_tanggal' => $_POST['responden_tanggal'],
        'survey_id' => $_POST['survey_id']
    ];

    $responden_alumni = new RespondenAlumni();
    $responden_alumni->insertData($data);

    header('Location: responden_alumni.php?status=sukses&message=Data berhasil disimpan');
    exit();
}

if ($act == 'edit') {
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    if ($id) {
        $data = [
            'responden_nama' => $_POST['responden_nama'],
            'responden_nim' => $_POST['responden_nim'],
            'responden_prodi' => $_POST['responden_prodi'],
            'responden_email' => $_POST['responden_email'],
            'responden_hp' => $_POST['responden_hp'],
            'tahun_lulus' => $_POST['tahun_lulus'],
            'responden_tanggal' => $_POST['responden_tanggal'],
            'survey_id' => $_POST['survey_id']
        ];

        $responden_alumni = new RespondenAlumni();
        $responden_alumni->updateData($data, $id);

        header('Location: responden_alumni.php?status=sukses&message=Data berhasil diubah');
        exit();
    }
}

if ($act == 'hapus') {
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    if ($id) {
        $responden_alumni = new RespondenAlumni();
        $responden_alumni->deleteData($id);

        header('Location: responden_alumni.php?status=sukses&message=Data berhasil dihapus');
        exit();
    }
}

// Redirect to the main page if no valid action is specified
header('Location: responden_alumni.php');
exit();
