<?php
include_once('model/koneksi.php');
include_once('model/session.php');
include_once('model/jawaban_industri_model.php');

$status = isset($_GET['status']) ? strtolower($_GET['status']) : null;
$message = isset($_GET['message']) ? strtolower($_GET['message']) : null;

// Memeriksa apakah parameter ID telah diberikan
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $responden_industri_id = $_GET['id'];

    // Membuat instance dari kelas JawabanIndustri
    $jawaban_industri = new JawabanIndustri();

    // Mendapatkan jawaban industri berdasarkan ID responden industri
    $result = $jawaban_industri->getJawabanById($responden_industri_id);
} else {
    // Jika parameter ID tidak diberikan, tampilkan pesan error
    $status = 'error';
    $message = 'Parameter ID tidak valid.';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jawaban Industri</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include_once('layouts/header.php'); ?>
        <!-- Main Sidebar Container -->
        <?php include_once('layouts/sidebar.php'); ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Jawaban Industri</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="responden_industri.php">Responden Industri</a></li>
                                <li class="breadcrumb-item active">Jawaban Industri</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Jawaban Industri</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Responden</th>
                                    <th>Pertanyaan</th>
                                    <th>Jawaban</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    $i = 1;
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<tr>
                                            <td>' . $i . '</td>
                                            <td>' . htmlspecialchars($row['responden_nama']) . '</td>
                                            <td>' . htmlspecialchars($row['soal_nama']) . '</td>
                                            <td>' . htmlspecialchars($row['jawaban']) . '</td>
                                        </tr>';
                                        $i++;
                                    }
                                } else {
                                    echo '<tr><td colspan="4">Tidak ada jawaban ditemukan.</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        Footer
                    </div>
                </div>
            </section>
        </div>
        <?php include_once('layouts/footer.php'); ?>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>