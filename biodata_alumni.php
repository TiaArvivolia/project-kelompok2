<?php
$menu = 'biodata';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/polinema.png">
    <title>Survey Alumni</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <style>
        .card-header {
            background-color: #007BFF;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-title {
            color: white;
            font-weight: bold;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #FFC107;
            border-color: #FFC107;
            color: black;
        }

        .btn-primary:hover {
            background-color: #e0a800;
            border-color: #d39e00;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <?php include_once('layouts/pengguna/header.php'); ?>
        <?php include_once('layouts/pengguna/sidebar.php'); ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Survey Kepuasan Alumni terhadap Polinema</h1>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> Silakan isi biodata Anda di bawah
                                ini.</h3>
                            <div class="card-tools"></div>
                        </div>
                        <div class="card-body">
                            <form action="biodata_alumni_action.php?act=tambah" id="biodata" method="POST" class="form">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="responden_nama" class="form-control" required placeholder="Nama Lengkap Anda">
                                </div>
                                <div class="form-group">
                                    <label for="Nim">NIM</label>
                                    <input type="text" name="responden_nim" class="form-control" required placeholder="NIM Anda">
                                </div>
                                <div class="form-group">
                                    <label for="Prodi">Program Studi</label>
                                    <input type="text" name="responden_prodi" class="form-control" required placeholder="Contoh: D4 Sistem Informasi Bisnis">
                                </div>
                                <div class="form-group">
                                    <label for="responden_email">Alamat Email</label>
                                    <input type="text" name="responden_email" class="form-control" required placeholder="Alamat Email Anda">
                                </div>
                                <div class="form-group">
                                    <label for="responden_hp">No. Telepon</label>
                                    <input type="text" name="responden_hp" class="form-control" required placeholder="No. Telepon Anda">
                                </div>
                                <div class="form-group">
                                    <label for="tahun_lulus">Tahun Lulus</label>
                                    <input type="year" name="tahun_lulus" class="form-control" required placeholder="Tahun Lulus Anda">
                                </div>
                                <div class="form-group">
                                    <label for="survey">Survey</label>
                                    <p class="form-control-plaintext" style="border: 1px solid #ced4da; padding: .375rem .75rem; border-radius: .25rem;">
                                        Survey Alumni</p>
                                    <input type="hidden" name="survey_id" value="4">
                                </div>

                                <div class="form-group" style="text-align: right;">
                                    <button type="submit" class="btn btn-primary">Selanjutnya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php include_once('layouts/pengguna/footer.php'); ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark"></aside>
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
    <script src="plugins/jquery-validation/localization/messages_id.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#biodata').validate({
                rules: {
                    responden_id: {
                        required: true,
                        minlength: 1
                    },
                    responden_nama: {
                        required: true,
                        minlength: 5
                    },
                    responden_nim: {
                        required: true,
                        minlength: 5
                    },
                    responden_prodi: {
                        required: true,
                        minlength: 5
                    },
                    responden_email: {
                        required: true,
                        minlength: 5
                    },
                    responden_hp: {
                        required: true,
                        minlength: 6
                    },
                    tahun_lulus: {
                        required: true,
                        minlength: 4
                    },

                    responden_tanggal: {
                        required: true
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
</body>

</html>