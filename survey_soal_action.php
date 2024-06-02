<?php
include_once('model/survey_soal_model.php');

$act = $_GET['act'];

if ($act == 'simpan') {
    $data = [
        'survey_id' => $_POST['survey_id'],
        'kategori_id' => $_POST['kategori_id'],
        'soal_jenis' => $_POST['soal_jenis'], // Pastikan form memiliki input dengan name='soal_jenis'
        'soal_nama' => $_POST['soal_nama']
    ];

    $insert = new SurveySoal();
    $insert->insertData($data);

    header('location:survey_soal.php?status=sukses&message=Data berhasil disimpan');
}

if ($act == 'edit') {
    $id = $_GET['id'];
    $data = [
        'survey_id' => $_POST['survey_id'],
        'kategori_id' => $_POST['kategori_id'],
        'no_urut' => isset($_POST['no_urut']) ? $_POST['no_urut'] : 0, // Pastikan no_urut ada dan memiliki nilai default jika kosong
        'soal_jenis' => $_POST['soal_jenis'],
        'soal_nama' => $_POST['soal_nama']
    ];

    $survey_soal = new SurveySoal();
    $survey_soal->updateData($id, $data);

    header('location:survey_soal.php?status=sukses&message=Data berhasil diubah');
}

if ($act == 'hapus') {
    $id = $_GET['id'];

    $hapus = new SurveySoal();
    $hapus->deleteData($id);

    header('location: survey_soal.php?status=sukses&message=Data berhasil dihapus');
}
