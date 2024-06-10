<?php
$username = 'root';
$password = '';
$database = 'db_survey3';
try {
    $db = new mysqli('localhost', $username, $password, $database);

    if ($db->connect_error) {
        die('Connection failed: ' . $db->connect_error);
    }
} catch (Exception $e) {
    die($e->getMessage());
}

include_once('model/session.php');
include_once('model/koneksi.php'); // Make sure this file exists and contains the database connection code

// Function to get count from a table, with error handling
function getCountFromTable($tableName)
{
    global $db;
    $query = "SELECT COUNT(*) as count FROM $tableName";
    $result = mysqli_query($db, $query);
    if ($result) {
        $data = mysqli_fetch_assoc($result);
        return $data['count'];
    } else {
        return 0; // Return 0 if there's an error
    }
}

// Fetch counts from database
$DosenCount = getCountFromTable('t_responden_dosen');
$mahasiswaCount = getCountFromTable('t_responden_mahasiswa'); // Replace with actual table for mahasiswa
$tendikCount = getCountFromTable('t_responden_tendik'); // Replace with actual table for tendik
$alumniCount = getCountFromTable('t_responden_alumni'); // Replace with actual table for alumni
$orangTuaCount = getCountFromTable('t_responden_ortu'); // Replace with actual table for orang tua
$industryCount = getCountFromTable('t_responden_industri'); // Replace with actual table for industry
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
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
    .info-box-icon {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .info-box-number {
        font-size: 2em;
    }

    .chart-container {
        position: relative;
        margin: auto;
        height: 40vh;
        width: 80vw;
    }
    </style>
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
                                <span class="info-box-icon bg-info elevation-1"><i
                                        class="fas fa-chalkboard-teacher"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Jawaban Dosen</span>
                                    <span class="info-box-number"><?php echo $DosenCount; ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i
                                        class="fas fa-user-graduate"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Jawaban Mahasiswa</span>
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
                                    <span class="info-box-text">Total Jawaban Tendik</span>
                                    <span class="info-box-number"><?php echo $tendikCount; ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i
                                        class="fas fa-user-graduate"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Jawaban Alumni</span>
                                    <span class="info-box-number"><?php echo $alumniCount; ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-primary elevation-1"><i
                                        class="fas fa-user-friends"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Jawaban Orang Tua</span>
                                    <span class="info-box-number"><?php echo $orangTuaCount; ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-secondary elevation-1"><i
                                        class="fas fa-building"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Jawaban Industri</span>
                                    <span class="info-box-number"><?php echo $industryCount; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Chart.js -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Grafik Respons Survei</h3>
                                </div>
                                <div class="card-body">
                                    <div class="chart-container">
                                        <canvas id="responseChart"></canvas>
                                    </div>
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

    <script>
    var ctx = document.getElementById('responseChart').getContext('2d');
    var responseChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Dosen', 'Mahasiswa', 'Tendik', 'Alumni', 'Orang Tua', 'Industry'],
            datasets: [{
                label: 'Jumlah Respons',
                data: [<?php echo $DosenCount; ?>, <?php echo $mahasiswaCount; ?>,
                    <?php echo $tendikCount; ?>, <?php echo $alumniCount; ?>,
                    <?php echo $orangTuaCount; ?>, <?php echo $industryCount; ?>
                ],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(201, 203, 207, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>
</body>

</html>