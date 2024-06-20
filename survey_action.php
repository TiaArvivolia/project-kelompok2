<?php
include_once('model/survey.php');
include_once('model/pengguna.php');

$act = $_GET['act'];

if ($act == 'simpan') {
    $data = [
        'survey_jenis' => $_POST['survey_jenis'],
        'survey_kode' => $_POST['survey_kode'],
        'survey_nama' => $_POST['survey_nama'],
        'survey_deskripsi' => $_POST['survey_deskripsi'],
        'survey_tanggal' => $_POST['survey_tanggal'],
        'user_id' => $_POST['user_id']
    ];

    $insert = new Survey();
    $insert->insertData($data);

    header('location: survey.php?status=sukses&message=Data berhasil disimpan');
}

if ($act == 'edit') {
    $id = $_GET['id'];

    $survey = new Survey();
    $old_data = $survey->getDataById($id);
    $old_data = $old_data->fetch_assoc();

    $data = [
        'survey_jenis' => $_POST['survey_jenis'],
        'survey_kode' => $_POST['survey_kode'],
        'survey_nama' => $_POST['survey_nama'],
        'survey_deskripsi' => $_POST['survey_deskripsi'],
        'survey_tanggal' => $_POST['survey_tanggal'],
        'user_id' => $_POST['user_id']
    ];

    $survey->updateData($id, $data);

    header('location: survey.php?status=sukses&message=Data berhasil diubah');
}

if ($act == 'hapus') {
    $id = $_GET['id'];

    $hapus = new Survey();

    try {
        $hapus->deleteData($id);
        header('location: survey.php?status=sukses&message=Data berhasil dihapus');
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1451) {
            header('location: survey.php?status=gagal&message=Data tidak bisa dihapus karena sedang digunakan di table lain');
        } else {
            throw $e;
        }
    }
}
?>