<?php
include_once('model/pengguna.php');

$act = $_GET['act'];

if ($act == 'simpan') {
    $data = [
        'username' => $_POST['username'],
        'nama' => $_POST['nama'],
        'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
    ];

    $insert = new Pengguna();
    $insert->insertData($data);

    header('location: user.php?status=sukses&message=Data berhasil disimpan');
    exit();
}

if ($act == 'edit') {
    $id = $_GET['id'];

    // Digunakan untuk mengambil data lama
    $user = new Pengguna();
    $old_data = $user->getDataById($id);
    $old_data = $old_data->fetch_assoc();

    // Hash new Password
    $new_password = '';
    if ($_POST['password'] !== "") {
        $new_password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    }

    $data = [
        'username' => $_POST['username'],
        'nama' => $_POST['nama'],
        'password' => $_POST['password'] == "" ? $old_data['password'] : $new_password
    ];

    $user->updateData($id, $data);

    header('location: user.php?status=sukses&message=Data berhasil diubah');
    exit();
}

if ($act == 'hapus') {
    $id = $_GET['id'];

    $hapus = new Pengguna();
    $hapus->deleteData($id);

    header('location: user.php?status=sukses&message=Data berhasil dihapus');
    exit();
}
?>