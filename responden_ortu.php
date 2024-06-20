<?php
$menu = 'ortu';
include_once('model/session.php');
include_once('model/respon_biodata_ortu.php'); // Sudah disesuaikan dengan model yang benar

$status = isset($_GET['status']) ? strtolower($_GET['status']) : null;
$message = isset($_GET['message']) ? strtolower($_GET['message']) : null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Responden Orang Tua</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                            <h1>Responden Orang Tua</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Responden Orang Tua</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <h3 class="card-title col">Data Responden Orang Tua</h3>
                                        <div class="card-tools col">
                                            <a href="excel_ortu.php" class="btn btn-success float-right">Cetak
                                                Excel</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body overflow-auto">

                                    <?php
                                    if ($status == 'sukses') {
                                        echo '<div class="alert alert-success">' . $message . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></div>';
                                    }
                                    ?>

                                    <div class="table-responsive">
                                        <table class="table table-sm table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>ID</th>
                                                    <th>Tanggal</th>
                                                    <th>Nama</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Umur</th>
                                                    <th>Nomor HP</th>
                                                    <th>Pendidikan</th>
                                                    <th>Pekerjaan</th>
                                                    <th>Penghasilan</th>
                                                    <th>NIM Mahasiswa</th>
                                                    <th>Nama Mahasiswa</th>
                                                    <th>Prodi Mahasiswa</th>
                                                    <th>Jawaban</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                    $responden_ortu = new RespondenOrtu();
                                    $list = $responden_ortu->getData();

                                    $i = 1;
                                    while ($row = $list->fetch_assoc()) {
                                        echo '<tr>
                            <td>' . $i . '</td>
                            <td>' . $row['survey_id'] . '</td>
                            <td>' . $row['responden_tanggal'] . '</td>
                            <td>' . $row['responden_nama'] . '</td>
                            <td>' . $row['responden_jk'] . '</td>
                            <td>' . $row['responden_umur'] . '</td>
                            <td>' . $row['responden_hp'] . '</td>
                            <td>' . $row['responden_pendidikan'] . '</td>
                            <td>' . $row['responden_pekerjaan'] . '</td>
                            <td>' . $row['responden_penghasilan'] . '</td>
                            <td>' . $row['mahasiswa_nim'] . '</td>
                            <td>' . $row['mahasiswa_nama'] . '</td>
                            <td>' . $row['mahasiswa_prodi'] . '</td>
                            <td>
                                <a title="Lihat Jawaban" href="jawaban_ortu.php?id=' . $row['responden_ortu_id'] . '" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>';

                                        $i++;
                                    }
                                    ?>
                                            </tbody>
                                        </table>
                                    </div>
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
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- jQuery Validation -->
    <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="plugins/jquery-validation/additional-methods.min.js"></script>
</body>

</html>