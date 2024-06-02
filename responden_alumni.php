<?php
$menu = 'alumni';
include_once('model/respon_biodata_alumni.php'); // Adjusted the include file

$status = isset($_GET['status']) ? strtolower($_GET['status']) : null;
$message = isset($_GET['message']) ? strtolower($_GET['message']) : null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Responden Alumni</title>
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
                            <h1>Responden Alumni</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Responden Alumni</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Responden Alumni</h3>
                        <div class="card-tools">
                            <a href="responden_alumni_form.php?act=tambah" class="btn btn-sm btn-primary">Tambah</a>
                        </div>
                    </div>
                    <div class="card-body">

                        <?php
                        if ($status == 'sukses') {
                            echo '<div class="alert alert-success">' . $message . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></div>';
                        }
                        ?>

                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Survey ID</th>
                                    <th>Tanggal</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Program Studi</th>
                                    <th>Email</th>
                                    <th>Nomor HP</th>
                                    <th>Tahun Lulus</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $responden_alumni = new RespondenAlumni();
                                $list = $responden_alumni->getData();

                                $i = 1;
                                while ($row = $list->fetch_assoc()) {
                                    echo '<tr>
                      <td>' . $i . '</td>
                      <td>' . $row['survey_id'] . '</td>
                      <td>' . $row['responden_tanggal'] . '</td>
                      <td>' . $row['responden_nim'] . '</td>
                      <td>' . $row['responden_nama'] . '</td>
                      <td>' . $row['responden_prodi'] . '</td>
                      <td>' . $row['responden_email'] . '</td>
                      <td>' . $row['responden_hp'] . '</td>
                      <td>' . $row['tahun_lulus'] . '</td>
                      <td>
                        <a title="Edit Data" href="responden_alumni_form.php?act=edit&id=' . $row['responden_alumni_id'] . '" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                        <a onclick="return confirm(\'Apakah anda yakin menghapus data ini?\')" title="Hapus Data" href="responden_alumni_action.php?act=hapus&id=' . $row['responden_alumni_id'] . '" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                      </td>
      
                    </tr>';

                                    $i++;
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
    <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="plugins/jquery-validation/additional-methods.min.js"></script>
</body>

</html>