<?php
include_once('model/survey.php');
include_once('model/pengguna.php');

$act = $_GET['act'];

if ($act == 'simpan') {
    $data = [
        // 'survey_id' => $_POST['survey_id'], // Assuming survey_id is auto-incremented
        'survey_jenis' => $_POST['survey_jenis'],
        'survey_kode' => $_POST['survey_kode'],
        'survey_nama' => $_POST['survey_nama'],
        'survey_deskripsi' => $_POST['survey_deskripsi'],
        'survey_tanggal' => $_POST['survey_tanggal'],
        'user_id' => $_POST['user_id'] // Add user_id if it's required
    ];

    $insert = new Survey();
    $insert->insertData($data);

    header('location: survey.php?status=sukses&message=Data berhasil disimpan');
}

if ($act == 'edit') {
    $id = $_GET['id'];

    // Digunakan untuk mengambil data lama
    $survey = new Survey();
    $old_data = $survey->getDataById($id);
    $old_data = $old_data->fetch_assoc();

    $data = [
        'survey_jenis' => $_POST['survey_jenis'],
        'survey_kode' => $_POST['survey_kode'],
        'survey_nama' => $_POST['survey_nama'],
        'survey_deskripsi' => $_POST['survey_deskripsi'],
        'survey_tanggal' => $_POST['survey_tanggal'],
        'user_id' => $_POST['user_id'] // Tambahkan user_id ke dalam data
    ];

    $survey->updateData($id, $data);

    header('location: survey.php?status=sukses&message=Data berhasil diubah');
}

if ($act == 'hapus') {
    $id = $_GET['id'];

    $hapus = new Survey();
    $hapus->deleteData($id);

    header('location: survey.php?status=sukses&message=Data berhasil dihapus');
}