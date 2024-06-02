<?php
$status = isset($_GET['status']) ? strtolower($_GET['status']) : null;
$message = isset($_GET['message']) ? strtolower($_GET['message']) : null;

// Define the Survey class if not already defined
if (!class_exists('Survey')) {
    include_once('model/survey.php');
}

$menu = 'survey';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Survey</title>

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
        <?php include_once('layouts/header.php'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include_once('layouts/sidebar.php'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Hasil Survey</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Survey</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Survey</h3>

                        <div class="card-tools">
                            <a href="survey_form.php?act=tambah" class="btn btn-sm btn-primary">Tambah</a>
                        </div>
                    </div>
                    <div class="card-body">

                        <?php
                        if ($status == 'sukses') {
                            echo '<div class="alert alert-success">
                                  ' . $message . '
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></div>';
                        }
                        ?>

                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Survey</th>
                                    <th>Nama Survey</th>
                                    <th>Jenis Survey</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                    <th>User</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $survey = new Survey();
                                $list = $survey->getData(); // Retrieve survey data

                                if ($list->num_rows > 0) { // Check if there are rows returned
                                    $i = 1;
                                    while ($row = $list->fetch_assoc()) {
                                        echo '<tr>
                                        <td>' . $i . '</td>
                                        <td>' . $row['survey_kode'] . '</td>
                                        <td>' . $row['survey_nama'] . '</td>
                                        <td>' . $row['survey_jenis'] . '</td>
                                        <td>' . $row['survey_deskripsi'] . '</td>
                                        <td>' . $row['survey_tanggal'] . '</td>
                                        <td>' . $row['user_name'] . '</td>'; // Use user_name instead of user_id

                                        echo '<td>
                                        <a title="Edit Data" href="survey_form.php?act=edit&id=' . $row['survey_id'] . '" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        <a onclick="return confirm(\'Apakah anda yakin menghapus data ini?\')" title="Hapus Data" href="survey_action.php?act=hapus&id=' . $row['survey_id'] . '" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        </td>
                                        </tr>';
                                        $i++;
                                    }
                                } else {
                                    echo '<tr><td colspan="8">No records found</td></tr>';
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        Footer
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include_once('layouts/footer.php'); ?>

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

    <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="plugins/jquery-validation/additional-methods.min.js"></script>

</body>

</html>