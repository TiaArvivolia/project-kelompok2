<?php
// session_start();
if (isset($_SESSION['nama'])) {
    header('Location: home.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'] ?? '';
    $jenisuser = $_POST['jenis_user'] ?? '';
    // Save user data in session
    $_SESSION['nama'] = $nama;
    $_SESSION['jenis_user'] = $jenisuser;

    if (isset($_POST['jenis_user'])) {
        $pilihkatogori = $_POST['jenis_user'];

        if ($pilihkatogori == 'Dosen') {
            header('location:biodata_dosen.php');
            exit();
        } else if ($pilihkatogori == 'Mahasiswa') {
            header('location:biodata_mahasiswa.php');
            exit();
        } else if ($pilihkatogori == 'Tendik') {
            header('location:biodata_tendik.php');
            exit();
        } else if ($pilihkatogori == 'Alumni') {
            header('location: biodata_alumni.php');
            exit();
        } else if ($pilihkatogori == 'Orang Tua') {
            header('location:biodata_ortu.php');
            exit();
        } else if ($pilihkatogori == 'Industri') {
            header('location:biodata_industri.php');
            exit();
        }
    }
}