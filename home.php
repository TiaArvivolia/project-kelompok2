<?php
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
$jawabanDosenCount = getCountFromTable('t_responden_dosen');
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

    .card {
        margin-bottom: 20px;
    }

    .table-responsive {
        margin-top: 20px;
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
                                <li class="breadcrumb-item"><a href="landing-page.php">Home</a></li>
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
                        <!-- Small boxes (Stat box) -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?php echo $jawabanDosenCount; ?></h3>
                                    <p>Total Jawaban Dosen</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                </div>
                                <a href="responden_dosen.php" class="small-box-footer">Detail Lengkap <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?php echo $mahasiswaCount; ?></h3>
                                    <p>Total Jawaban Mahasiswa</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                                <a href="responden_mahasiswa.php" class="small-box-footer">Detail Lengkap <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?php echo $tendikCount; ?></h3>
                                    <p>Total Jawaban Tendik</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-tie"></i>
                                </div>
                                <a href="responden_tendik.php" class="small-box-footer">Detail Lengkap <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->

                        <!-- ./col -->
                    </div>
                    <!-- /.row -->

                    <!-- Second row with more boxes and charts -->
                    <div class="row">
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?php echo $alumniCount; ?></h3>
                                    <p>Total Jawaban Alumni</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                                <a href="responden_alumni.php" class="small-box-footer">Detail Lengkap <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3><?php echo $orangTuaCount; ?></h3>
                                    <p>Total Jawaban Orang Tua</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-friends"></i>
                                </div>
                                <a href="responden_ortu.php" class="small-box-footer">Detail Lengkap <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-secondary">
                                <div class="inner">
                                    <h3><?php echo $industryCount; ?></h3>
                                    <p>Total Jawaban Industri</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-building"></i>
                                </div>
                                <a href="responden_industri.php" class="small-box-footer">Detail Lengkap <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->

                    <!-- Charts and Table -->
                    <div class="row">
                        <div class="col-md-8">
                            <!-- Bar chart -->
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
                        <div class="col-md-4">
                            <!-- Pie chart -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Distribusi Respons</h3>
                                </div>
                                <div class="card-body">
                                    <div class="chart-container">
                                        <canvas id="distributionChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                    <!-- Table of responses -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Tabel Respons</h3>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th> Kategori
                                                </th>
                                                <th>Jumlah Respons</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Jawaban Dosen</td>
                                                <td><?php echo $jawabanDosenCount; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jawaban Mahasiswa</td>
                                                <td><?php echo $mahasiswaCount; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jawaban Tendik</td>
                                                <td><?php echo $tendikCount; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jawaban Alumni</td>
                                                <td><?php echo $alumniCount; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jawaban Orang Tua</td>
                                                <td><?php echo $orangTuaCount; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jawaban Industri</td>
                                                <td><?php echo $industryCount; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                </div><!-- /.container-fluid -->
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
    // Bar chart data
    var responseData = {
        labels: ["Dosen", "Mahasiswa", "Tendik", "Alumni", "Orang Tua", "Industri"],
        datasets: [{
            label: "Jumlah Respons",
            data: [<?php echo $jawabanDosenCount; ?>, <?php echo $mahasiswaCount; ?>,
                <?php echo $tendikCount; ?>, <?php echo $alumniCount; ?>, <?php echo $orangTuaCount; ?>,
                <?php echo $industryCount; ?>
            ],
            backgroundColor: [
                'rgba(40, 116, 166, 0.3)', // bg-info (Dosen)
                'rgba(40, 167, 69, 0.3)', // bg-success (Mahasiswa)
                'rgba(255, 193, 7, 0.3)', // bg-warning (Tendik)
                'rgba(220, 53, 69, 0.3)', // bg-danger (Alumni)
                'rgba(0, 123, 255, 0.3)', // bg-primary (Orang Tua)
                'rgba(108, 117, 125, 0.3)' // bg-secondary (Industry)
            ],
            borderColor: [
                'rgba(40, 116, 166, 1)', // Dosen
                'rgba(40, 167, 69, 1)', // Mahasiswa
                'rgba(255, 193, 7, 1)', // Tendik
                'rgba(220, 53, 69, 1)', // Alumni
                'rgba(0, 123, 255, 1)', // Orang Tua
                'rgba(108, 117, 125, 1)' // Industry
            ],
            borderWidth: 1
        }]
    };

    // Bar chart options
    var responseOptions = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    };

    // Create bar chart
    var responseChart = new Chart(document.getElementById('responseChart'), {
        type: 'bar',
        data: responseData,
        options: responseOptions
    });

    // Pie chart data
    var distributionData = {
        labels: ["Dosen", "Mahasiswa", "Tendik", "Alumni", "Orang Tua", "Industri"],
        datasets: [{
            label: "Distribusi Respons",
            data: [<?php echo $jawabanDosenCount; ?>, <?php echo $mahasiswaCount; ?>,
                <?php echo $tendikCount; ?>, <?php echo $alumniCount; ?>, <?php echo $orangTuaCount; ?>,
                <?php echo $industryCount; ?>
            ],
            backgroundColor: [
                'rgba(40, 116, 166, 0.3)', // bg-info (Dosen)
                'rgba(40, 167, 69, 0.3)', // bg-success (Mahasiswa)
                'rgba(255, 193, 7, 0.3)', // bg-warning (Tendik)
                'rgba(220, 53, 69, 0.3)', // bg-danger (Alumni)
                'rgba(0, 123, 255, 0.3)', // bg-primary (Orang Tua)
                'rgba(108, 117, 125, 0.3)' // bg-secondary (Industry)
            ],
            borderColor: [
                'rgba(40, 116, 166, 1)', // Dosen
                'rgba(40, 167, 69, 1)', // Mahasiswa
                'rgba(255, 193, 7, 1)', // Tendik
                'rgba(220, 53, 69, 1)', // Alumni
                'rgba(0, 123, 255, 1)', // Orang Tua
                'rgba(108, 117, 125, 1)' // Industry
            ],
            borderWidth: 1
        }]
    };

    // Create pie chart
    var distributionChart = new Chart(document.getElementById('distributionChart'), {
        type: 'pie',
        data: distributionData,
    });
    </script>


</body>

</html>