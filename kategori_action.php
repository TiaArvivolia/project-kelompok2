<?php
include_once('model/kategori.php');

$act = $_GET['act'];

if ($act == 'simpan') {
    $data = [
        'kategori_nama' => $_POST['kategori_nama']
    ];

    $insert = new Kategori();
    $insert->insertData($data);

    header('location: kategori.php?status=sukses&message=Data berhasil disimpan');
}

if ($act == 'edit') {
    $id = $_GET['id'];

    $kategori = new Kategori();
    $old_data = $kategori->getDataById($id);
    $old_data = $old_data->fetch_assoc();

    $data = [
        'kategori_nama' => $_POST['kategori_nama']
    ];

    $kategori->updateData($id, $data);

    header('location: kategori.php?status=sukses&message=Data berhasil diubah');
}

if ($act == 'hapus') {
    $id = $_GET['id'];

    $hapus = new Kategori();
    $hapus->deleteData($id);

    header('location: kategori.php?status=sukses&message=Data berhasil dihapus');
}
?>