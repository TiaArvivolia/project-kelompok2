<?php
$menu = 'industri';
include_once('model/session.php');
include_once('model/respon_biodata_industri.php');

$status = isset($_GET['status']) ? strtolower($_GET['status']) : null;
$message = isset($_GET['message']) ? strtolower($_GET['message']) : null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Responden Industri</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include_once('layouts/header.php'); ?>
        <?php include_once('layouts/sidebar.php'); ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Responden Industri</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Responden Industri</li>
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
                                    <h3 class="card-title">Data Responden Industri</h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if ($status == 'sukses') {
                                        echo '<div class="alert alert-success">' . htmlspecialchars($message) . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
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
                                                    <th>Jabatan</th>
                                                    <th>Perusahaan</th>
                                                    <th>Email</th>
                                                    <th>No. HP</th>
                                                    <th>Kota</th>
                                                    <th>Jawaban</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $responden_industri = new RespondenIndustri();
                                                $list = $responden_industri->getData();

                                                $i = 1;
                                                while ($row = $list->fetch_assoc()) {
                                                    echo '<tr>
                                                        <td>' . $i . '</td>
                                                        <td>' . htmlspecialchars($row['survey_id']) . '</td>
                                                        <td>' . htmlspecialchars($row['responden_tanggal']) . '</td>
                                                        <td>' . htmlspecialchars($row['responden_nama']) . '</td>
                                                        <td>' . htmlspecialchars($row['responden_jabatan']) . '</td>
                                                        <td>' . htmlspecialchars($row['responden_perusahaan']) . '</td>
                                                        <td>' . htmlspecialchars($row['responden_email']) . '</td>
                                                        <td>' . htmlspecialchars($row['responden_hp']) . '</td>
                                                        <td>' . htmlspecialchars($row['responden_kota']) . '</td>
                                                        <td>
                                                            <a title="Lihat Jawaban" href="jawaban_industri.php?id=' . $row['responden_industri_id'] . '" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
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
                        </div>
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
    <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="plugins/jquery-validation/additional-methods.min.js"></script>
</body>

</html>