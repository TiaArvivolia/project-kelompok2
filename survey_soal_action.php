<?php
include_once('model/survey_soal_model.php');

$act = $_GET['act'];

if ($act == 'tambah') {
    $data = [
        'survey_id' => $_POST['survey_id'],
        'soal_nama' => $_POST['soal_nama'],
        'kategori_id' => $_POST['kategori_id'],
        'no_urut' => $_POST['no_urut'],
        'soal_jenis' => $_POST['soal_jenis']
    ];

    $insert = new SurveySoal();
    if ($insert->insertData($data)) {
        header('location: survey_soal.php?status=sukses&message=Data berhasil disimpan');
    } else {
        header('location: survey_soal.php?status=gagal&message=Data gagal disimpan');
    }
}

if ($act == 'edit') {
    $id = $_GET['id'];

    $data = [
        'survey_id' => $_POST['survey_id'],
        'soal_nama' => $_POST['soal_nama'],
        'kategori_id' => $_POST['kategori_id'],
        'no_urut' => $_POST['no_urut'],
        'soal_jenis' => $_POST['soal_jenis']
    ];

    $survey_soal = new SurveySoal();
    if ($survey_soal->updateData($id, $data)) {
        header('location: survey_soal.php?status=sukses&message=Data berhasil diubah');
    } else {
        header('location: survey_soal.php?status=gagal&message=Data gagal diubah');
    }
}

if ($act == 'hapus') {
    $id = $_GET['id'];

    $hapus = new SurveySoal();

    try {
        $hapus->deleteData($id);
        header('location: survey_soal.php?status=sukses&message=Data berhasil dihapus');
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1451) {
            header('location: survey_soal.php?status=gagal&message=Data tidak bisa dihapus karena sedang digunakan di table lain');
        } else {
            throw $e;
        }
    }
}
?>