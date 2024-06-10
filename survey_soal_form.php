<?php
$menu = 'survey_soal';
include_once('model/session.php');
include_once('model/survey.php');
include_once('model/kategori.php');
include_once('model/survey_soal_model.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Survey Soal</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Survey Soal</h1>
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
                <?php
                $act = (isset($_GET['act'])) ? $_GET['act'] : '';

                if ($act == 'tambah') {
                ?>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Soal</h3>
                        </div>
                        <div class="card-body">
                            <form action="survey_soal_action.php?act=tambah" method="post" id="form-tambah">
                                <div class="form-group">
                                    <label for="soal_nama">Soal</label>
                                    <textarea required name="soal_nama" id="soal_nama" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="survey_id">Survey</label>
                                    <select required name="survey_id" id="survey_id" class="form-control">
                                        <option value="" disabled selected>Pilih Survey</option>
                                        <?php
                                        $survey = new Survey();
                                        $surveys = $survey->getData();
                                        while ($row = $surveys->fetch_assoc()) {
                                            echo '<option value="' . $row['survey_id'] . '">' . $row['survey_nama'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kategori_id">Kategori</label>
                                    <select required name="kategori_id" id="kategori_id" class="form-control">
                                        <option value="" disabled selected>Pilih Survey</option>
                                        <?php
                                        $kategori = new Kategori();
                                        $kategoris = $kategori->getData();
                                        while ($row = $kategoris->fetch_assoc()) {
                                            echo '<option value="' . $row['kategori_id'] . '">' . $row['kategori_nama'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="no_urut">No Urut</label>
                                    <input required type="number" name="no_urut" id="no_urut" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="soal_jenis">Jenis Soal</label>
                                    <select required name="soal_jenis" id="soal_jenis" class="form-control">
                                        <option value="Rating">Rating</option>
                                        <option value="Essay">Essay</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                    <a href="survey_soal.php" class="btn btn-warning">Kembali</a>
                                </div>
                            </form>



                        </div>
                    </div>
                <?php } else if ($act == 'edit') {
                    $id = $_GET['id'];
                    $survey_soal = new SurveySoal();
                    $data = $survey_soal->getDataById($id);
                    $data = $data->fetch_assoc();
                ?>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Soal</h3>
                        </div>
                        <div class="card-body">
                            <form action="survey_soal_action.php?act=edit&id=<?php echo $id ?>" method="post" id="form-edit">
                                <div class="form-group">
                                    <label for="soal_nama">Soal</label>
                                    <textarea required name="soal_nama" id="soal_nama" class="form-control"><?php echo $data['soal_nama'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="survey_id">Survey</label>
                                    <select required name="survey_id" id="survey_id" class="form-control">
                                        <?php
                                        $survey = new Survey();
                                        $surveys = $survey->getData();
                                        while ($row = $surveys->fetch_assoc()) {
                                            $selected = ($row['survey_id'] == $data['survey_id']) ? 'selected' : '';
                                            echo '<option value="' . $row['survey_id'] . '" ' . $selected . '>' . $row['survey_nama'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kategori_id">Kategori</label>
                                    <select required name="kategori_id" id="kategori_id" class="form-control">
                                        <?php
                                        $kategori = new Kategori();
                                        $kategoris = $kategori->getData();
                                        while ($row = $kategoris->fetch_assoc()) {
                                            $selected = ($row['kategori_id'] == $data['kategori_id']) ? 'selected' : '';
                                            echo '<option value="' . $row['kategori_id'] . '" ' . $selected . '>' . $row['kategori_nama'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="no_urut">No Urut</label>
                                    <input required type="number" name="no_urut" id="no_urut" class="form-control" value="<?php echo $data['no_urut'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="soal_jenis">Jenis Soal</label>
                                    <select required name="soal_jenis" id="soal_jenis" class="form-control">
                                        <option value="Rating" <?php echo $data['soal_jenis'] == 'Rating' ? 'selected' : '' ?>>Rating
                                        </option>
                                        <option value="Essay" <?php echo $data['soal_jenis'] == 'Essay' ? 'selected' : '' ?>>Essay</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                    <a href="survey_soal.php" class="btn btn-warning">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            </section>
        </div>
        <?php include_once('layouts/footer.php'); ?>
        <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="plugins/jquery-validation/additional-methods.min.js"></script>
    <script src="plugins/jquery-validation/localization/messages_id.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#form-tambah').validate({
                rules: {
                    survey_kode: {
                        required: true,
                        minlength: 3,
                        maxlength: 10
                    },
                    survey_nama: {
                        required: true,
                        minlength: 5,
                        maxlength: 255
                    }
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