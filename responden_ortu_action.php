<?php
include_once('model/respon_biodata_ortu.php');

$act = isset($_GET['act']) ? $_GET['act'] : '';

if ($act == 'tambah') {
    $data = [
        'survey_id' => $_POST['survey_id'],
        'responden_tanggal' => $_POST['responden_tanggal'],
        'responden_nama' => $_POST['responden_nama'],
        'responden_jk' => $_POST['responden_jk'],
        'responden_umur' => $_POST['responden_umur'],
        'responden_hp' => $_POST['responden_hp'],
        'responden_pendidikan' => $_POST['responden_pendidikan'],
        'responden_pekerjaan' => $_POST['responden_pekerjaan'],
        'responden_penghasilan' => $_POST['responden_penghasilan'],
        'mahasiswa_nim' => $_POST['mahasiswa_nim'],
        'mahasiswa_nama' => $_POST['mahasiswa_nama'],
        'mahasiswa_prodi' => $_POST['mahasiswa_prodi']
    ];

    $responden_ortu = new RespondenOrtu();
    $responden_ortu->insertData($data);

    header('Location: responden_ortu.php?status=sukses&message=Data berhasil disimpan');
    exit();
}

if ($act == 'edit') {
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    if ($id) {
        $data = [
            'survey_id' => $_POST['survey_id'],
            'responden_tanggal' => $_POST['responden_tanggal'],
            'responden_nama' => $_POST['responden_nama'],
            'responden_jk' => $_POST['responden_jk'],
            'responden_umur' => $_POST['responden_umur'],
            'responden_hp' => $_POST['responden_hp'],
            'responden_pendidikan' => $_POST['responden_pendidikan'],
            'responden_pekerjaan' => $_POST['responden_pekerjaan'],
            'responden_penghasilan' => $_POST['responden_penghasilan'],
            'mahasiswa_nim' => $_POST['mahasiswa_nim'],
            'mahasiswa_nama' => $_POST['mahasiswa_nama'],
            'mahasiswa_prodi' => $_POST['mahasiswa_prodi']
        ];

        $responden_ortu = new RespondenOrtu();
        $responden_ortu->updateData($data, $id);

        header('Location: responden_ortu.php?status=sukses&message=Data berhasil diubah');
        exit();
    }
}

if ($act == 'hapus') {
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    if ($id) {
        $responden_ortu = new RespondenOrtu();
        $responden_ortu->deleteData($id);

        header('Location: responden_ortu.php?status=sukses&message=Data berhasil dihapus');
        exit();
    }
}

// Redirect to the main page if no valid action is specified
header('Location: responden_ortu.php');
exit();