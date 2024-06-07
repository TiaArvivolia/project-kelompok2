<?php
include_once("loginproses_admin.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin</title>

    <!-- Google Font: Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href=".../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href=".../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href=".../../dist/css/adminlte.min.css">

    <!-- Custom CSS -->
    <style>
        body {
            background-image: url('background.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        .login-box {
            width: 360px;
            margin: 0 auto;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .card-body {
            padding: 2rem;
        }

        .login-box-msg {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #333;
            font-weight: 500;
            text-align: center;
        }

        .logo-container {
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .logo-container img {
            width: 80px;
            height: 80px;
        }

        .form-control {
            border-radius: 30px;
            padding-left: 1.5rem;
        }

        .input-group-text {
            border-radius: 30px;
            border-left: none;
        }

        .btn-primary {
            border-radius: 30px;
            background: #007bff;
            border: none;
            color: #fff;
            font-weight: bold;
            padding: 0.5rem 1.5rem;
        }

        .btn-primary:hover {
            background: #00c6ff;
        }

        .alert {
            text-align: center;
        }

        .icheck-primary label {
            padding-left: 1.5rem;
        }

        .icheck-primary input {
            margin-left: -1.5rem;
        }

        .additional-links {
            text-align: center;
            margin-top: 1rem;
        }

        .additional-links a {
            color: #007bff;
        }

        .additional-links a:hover {
            text-decoration: underline;
        }

        .footer {
            text-align: center;
            margin-top: 2rem;
            color: #555;
            font-size: 0.9rem;
        }
    </style>
</head>

<body class="hold-transition">
    <div class="login-box">
        <?php
        if (isset($_SESSION['error'])) {
            echo "<div class='alert alert-danger mt-2'>" . $_SESSION['error'] . "</div>";
            unset($_SESSION['error']);
        }
        ?>
        <div class="card">
            <div class="card-body login-card-body">
                <div class="logo-container">
                    <img src="img/polinema.png" alt="Logo">
                </div>
                <p class="login-box-msg">Selamat Datang</p>
                <main class="form-signin">
                    <div class="container">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="input-group mb-3">
                                <input type="text" name="username" class="form-control" placeholder="Username" value="<?php if (isset($_COOKIE["username"])) {
                                                                                                                            echo $_COOKIE['username'];
                                                                                                                        } ?>" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </main>
                <div class="footer">
                    &copy; Survey Kepuasan Pelanggan Polinema 2024
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>