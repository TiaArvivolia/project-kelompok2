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

    try {
        $hapus = new Kategori();
        $hapus->deleteData($id);
        header('location: kategori.php?status=sukses&message=Data berhasil dihapus');
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1451) { // Foreign key constraint error code
            header('location: kategori.php?status=error&message=Data tidak bisa dihapus karena sedang digunakan di table lain');
        } else {
            header('location: kategori.php?status=error&message=Terjadi kesalahan saat menghapus data');
        }
    }
}
?>