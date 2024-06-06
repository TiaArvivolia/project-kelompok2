<?php
include "model/koneksi.php";
// include_once("loginprosess_pengguna.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Pengguna</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href=".../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href=".../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href=".../../dist/css/adminlte.min.css">

    <!-- Custom CSS -->
    <style>
    .logo-container {
        margin-bottom: 20px;
        /* Adjust the value as needed */
    }

    .card {
        border-radius: 15px;
        /* Adjust the value as needed */
    }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <?php
        if (isset($_SESSION['error'])) {
            echo "<div class='alert alert-danger mt-2'>" . $_SESSION['error'] . "</div>";
            unset($_SESSION['error']);
        }
        ?>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Survey Kepuasan Pelanggan</p>
                <main class="form-signin">
                    <div class="container">
                        <form action="" method="post">
                            <div class="text-center logo-container">
                                <img class="b-4" src="img/polinema.png" alt="" width="100" height="100">
                            </div>
                            <div class="input-group mb-3">
                                <select name="jenis_user" class="form-control" required>
                                    <option value="">Login Sebagai</option>
                                    <option>Mahasiswa</option>
                                    <option>Dosen</option>
                                    <option>Tendik</option>
                                    <option>Orang Tua</option>
                                    <option>Industri</option>
                                    <option>Alumni</option>
                                </select>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                </div>
                                <!-- /.col -->
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                    </div>
                </main>
                <p class="mb-1">
                    <a href="login_admin.php">Login Sebagai Admin</a>

                </p>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>