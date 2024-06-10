<?php
include_once("model/soal/soal_model.php");
$soalOrtu = new Soal();
$menu = 'soal';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/polinema.png">
    <title>Beranda</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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

    .survey-container {
        margin-top: 20px;
    }

    .survey-question {
        margin-bottom: 20px;
    }

    .survey-question h6 {
        margin-bottom: 14px;
        font-weight: popins;
    }

    .options {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: left;

    }

    .option {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-right: 30px;
        padding-left: 22px;

    }

    .option input[type="radio"] {
        margin-bottom: 2px;
        transform: scale(1.2);
    }

    .option span {
        font-size: 14px;
    }

    .btn-submit-container {
        display: flex;
        justify-content: flex-end;
        /* Align submit button to the right */
        margin-top: 20px;
    }

    .btn-submit {
        background-color: #007BFF;
        border-color: #007BFF;
        color: white;
        padding: 10px 20px;
        font-size: 15px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    @media (max-width: 768px) {
        .options {
            justify-content: center;
            /* Center-align options on smaller screens */
        }

        .option {
            margin-right: 10px;
            /* Reduce margin for smaller screens */
            padding-left: 5px;
            /* Reduce padding for smaller screens */
        }

        .btn-submit-container {
            justify-content: center;
        }
    }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Header and Sidebar -->
        <?php include_once('layouts/pengguna/header.php'); ?>
        <?php include_once('layouts/pengguna/sidebar.php'); ?>
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Survei Kepuasan Orang Tua terhadap Politeknik Negeri Malang Tahun
                                2024</h2>
                            <div class="card-tools"></div>
                        </div>
                        <div class="card-body">
                            <form
                                action="soal_ortu_action.php?act=simpan&responden_ortu_id=<?php echo $_GET['responden_ortu_id']; ?>"
                                method="post">
                                <div class="survey-container">
                                    <?php
                                    $options = ["Sangat kurang", "Kurang", "Cukup", "Baik", "Sangat Baik"];
                                    foreach ($soalOrtu->getSoalOrtu() as $soal) {
                                        echo "<div class='form-group survey-question'>";
                                        echo "<h6>{$soal['no_urut']}. {$soal['soal_nama']}</h6>";
                                        if ($soal['soal_jenis'] == 'Essay') {
                                            echo "<textarea name='jawaban[{$soal['soal_id']}]' class='form-control' rows='4' placeholder='Masukkan saran Anda disni' required></textarea>";
                                        } else {
                                            echo "<div class='options'>";
                                            foreach ($options as $jawaban) {
                                                echo "<div class='option'>";
                                                echo "<input type='radio' name='jawaban[{$soal['soal_id']}]' value='{$jawaban}' required>";
                                                echo "<span>{$jawaban}</span>";
                                                echo "</div>";
                                            }
                                            echo "</div>";
                                        }
                                        echo "<input type='hidden' name='soal_id[]' value='{$soal['soal_id']}'>";
                                        echo "</div>";
                                    }
                                    ?>
                                    <div class="btn-submit-container">
                                        <button type="submit" class="btn-submit">Submit</button>
                                    </div>
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
</body>

</html>