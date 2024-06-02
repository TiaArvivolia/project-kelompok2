<?php
$menu = 'survey_soal_from';
include_once('model/kategori.php');
include_once('model/survey.php');
include_once('model/survey_soal_model.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Survey Soal</title>

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
        <?php include_once('layouts/header.php'); ?>
        <?php include_once('layouts/sidebar.php'); ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <?php
                    $soal_jenis = (isset($_GET['survey_nama'])) ? $_GET['survey_nama'] : '';

                    
                    $soal = new SurveySoal();
                    $soal = $soal->getSoalBySurvey($soal_jenis);

                    ?>
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Survey Soal
                                <?php
                                echo $soal[0]['survey_nama'];
                                ?>
                            </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Survey Soal</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Soal Survey</h3>
                    </div>
                    <div class="card-body">
                        <form action="survey_soal_action.php?act=simpan" method="post" id="form-tambah">
                            <?php

                            foreach ($soal as $key => $value)

                                if ($value['soal_jenis'] == 'pilihan') {
                                    echo "
                                    <div class='form-check'>
                                    <h2>{$value['soal_nama']}</h2>
                                    <div>
                                    <input class='form-check-input' type='radio' name='flexRadioDefault' id='flexRadioDefault1'>
                                    <label class='form-check-label' for='flexRadioDefault1'>Sangat Baik</label>
                                    </div>
                                    <div>
                                    <input class='form-check-input' type='radio' name='flexRadioDefault' id='flexRadioDefault1'>
                                    <label class='form-check-label' for='flexRadioDefault1'>Sangat Baik</label>
                                    </div>
                                    <div>
                                    <input class='form-check-input' type='radio' name='flexRadioDefault' id='flexRadioDefault1'>
                                    <label class='form-check-label' for='flexRadioDefault1'>Sangat Baik</label>
                                    </div>
                                    <div>
                                    <input class='form-check-input' type='radio' name='flexRadioDefault' id='flexRadioDefault1'>
                                    <label class='form-check-label' for='flexRadioDefault1'>Sangat Baik</label>
                                    </div>
                                    <div>
                                    <input class='form-check-input' type='radio' name='flexRadioDefault' id='flexRadioDefault1'>
                                    <label class='form-check-label' for='flexRadioDefault1'>Sangat Baik</label>
                                    </div>
                                    <div>
                                    <input class='form-check-input' type='radio' name='flexRadioDefault' id='flexRadioDefault1'>
                                    <label class='form-check-label' for='flexRadioDefault1'>Sangat Baik</label>
                                    </div>
                              </div>";
                                } else {
                                    echo "
                                    <div class='form-group'>
                                <label for='soal_id'>{$value['soal_nama']}</label>
                                <input type='text' name='soal_id' id='soal_id' class='form-control' placeholder='Masukkan Jawaban'>
                            </div>
                                    ";
                                }

                            ?>

                            <a href="" class="btn btn-primary mt-5">Soal Selanjutnya</a>
                        </form>
                    </div>
                </div>
                <?php  ?>
            </section>
        </div>
    </div>

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