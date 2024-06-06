<?php
// $menu = 'index';
include_once('model/session.php');
include_once('model/koneksi.php'); // Make sure this file exists and contains the database connection code

// Function to get count from a table, with error handling
function getCountFromTable($tableName) {
    global $conn;
    $query = "SELECT COUNT(*) as count FROM $tableName";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $data = mysqli_fetch_assoc($result);
        return $data['count'];
    } else {
        return 0; // Return 0 if there's an error
    }
}

// Fetch counts from database
$jawabanDosenCount = getCountFromTable('t_jawaban_dosen');
$mahasiswaCount = getCountFromTable('t_jawaban_mahasiswa'); // Replace with actual table for mahasiswa
$tendikCount = getCountFromTable('t_jawaban_tendik'); // Replace with actual table for tendik
$alumniCount = getCountFromTable('t_jawaban_alumni'); // Replace with actual table for alumni
$orangTuaCount = getCountFromTable('t_jawaban_ortu'); // Replace with actual table for orang tua
$industryCount = getCountFromTable('t_jawaban_industri'); // Replace with actual table for industry
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php include('layouts/header.php') ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include('layouts/sidebar.php') ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-comments"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Jawaban Dosen</span>
                                    <span class="info-box-number"><?php echo $jawabanDosenCount; ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i
                                        class="fas fa-user-graduate"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Mahasiswa</span>
                                    <span class="info-box-number"><?php echo $mahasiswaCount; ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i
                                        class="fas fa-user-tie"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Tendik</span>
                                    <span class="info-box-number"><?php echo $tendikCount; ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i
                                        class="fas fa-user-friends"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Alumni</span>
                                    <span class="info-box-number"><?php echo $alumniCount; ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-child"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Orang Tua</span>
                                    <span class="info-box-number"><?php echo $orangTuaCount; ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-secondary elevation-1"><i
                                        class="fas fa-industry"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Industry</span>
                                    <span class="info-box-number"><?php echo $industryCount; ?></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include('layouts/footer.php') ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
</body>

</html>