<?php
$menu = 'survey';
include_once('model/survey.php');
include_once('model/pengguna.php');
include_once('model/session.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Survey</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
                            <h1>Survey</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Survey</li>
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
                        <h3 class="card-title">Tambah Survey</h3>
                    </div>
                    <div class="card-body">
                        <form action="survey_action.php?act=simpan" method="post" id="form-tambah">
                            <div class="form-group">
                                <label for="survey_jenis">Jenis Survey</label>
                                <select required name="survey_jenis" id="survey_jenis" class="form-control">
                                    <option value="Dosen">Dosen</option>
                                    <option value="Mahasiswa">Mahasiswa</option>
                                    <option value="Tendik">Tendik</option>
                                    <option value="Alumni">Alumni</option>
                                    <option value="Orang Tua">Orang Tua</option>
                                    <option value="Industri">Industri</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="survey_kode">Kode Survey</label>
                                <input required type="text" name="survey_kode" id="survey_kode" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="survey_nama">Nama Survey</label>
                                <input required type="text" name="survey_nama" id="survey_nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="survey_deskripsi">Deskripsi Survey</label>
                                <textarea required name="survey_deskripsi" id="survey_deskripsi"
                                    class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="survey_tanggal">Tanggal Survey</label>
                                <input required type="date" name="survey_tanggal" id="survey_tanggal"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="user_id">User</label>
                                <select required name="user_id" id="user_id" class="form-control">
                                    <?php
                                        $survey = new Survey();
                                        $user_data = $survey->getUserData();
                                        foreach ($user_data as $user) {
                                            echo '<option value="' . $user['user_id'] . '">' . $user['nama'] . '</option>';
                                        }
                                        ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="simpan" class="btn btn-primary"
                                    value="simpan">Simpan</button>
                                <a href="survey.php" class="btn btn-warning">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
                <?php } else if ($act == 'edit') { ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Survey</h3>
                    </div>
                    <div class="card-body">
                        <?php
                            $id = $_GET['id'];
                            $m_survey = new Survey();
                            $data = $m_survey->getDataById($id);
                            $data = $data->fetch_assoc();
                            ?>
                        <form action="survey_action.php?act=edit&id=<?php echo $id ?>" method="post" id="form-tambah">
                            <div class="form-group">
                                <label for="survey_jenis">Jenis Survey</label>
                                <select required name="survey_jenis" id="survey_jenis" class="form-control">
                                    <option value="Dosen"
                                        <?php echo $data['survey_jenis'] == 'Dosen' ? 'selected' : '' ?>>
                                        Dosen</option>
                                    <option value="Mahasiswa"
                                        <?php echo $data['survey_jenis'] == 'Mahasiswa' ? 'selected' : '' ?>>
                                        Mahasiswa</option>
                                    <option value="Tendik"
                                        <?php echo $data['survey_jenis'] == 'Tendik' ? 'selected' : '' ?>>
                                        Tendik</option>
                                    <option value="Alumni"
                                        <?php echo $data['survey_jenis'] == 'Alumni' ? 'selected' : '' ?>>
                                        Alumni</option>
                                    <option value="Orang Tua"
                                        <?php echo $data['survey_jenis'] == 'Orang Tua' ? 'selected' : '' ?>>
                                        Orang Tua</option>
                                    <option value="Industri"
                                        <?php echo $data['survey_jenis'] == 'Industri' ? 'selected' : '' ?>>
                                        Industri</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="survey_kode">Kode Survey</label>
                                <input type="text" name="survey_kode" id="survey_kode" class="form-control"
                                    value="<?php echo $data['survey_kode'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="survey_nama">Nama Survey</label>
                                <input type="text" name="survey_nama" id="survey_nama" class="form-control"
                                    value="<?php echo $data['survey_nama'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="survey_deskripsi">Deskripsi Survey</label>
                                <textarea name="survey_deskripsi" id="survey_deskripsi"
                                    class="form-control"><?php echo $data['survey_deskripsi'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="survey_tanggal">Tanggal Survey</label>
                                <input type="date" name="survey_tanggal" id="survey_tanggal" class="form-control"
                                    value="<?php echo date('Y-m-d', strtotime($data['survey_tanggal'])) ?>">
                            </div>
                            <div class="form-group">
                                <label for="user_id">User</label>
                                <select required name="user_id" id="user_id" class="form-control">
                                    <?php
                                        $survey = new Survey();
                                        $user_data = $survey->getUserData();
                                        foreach ($user_data as $user) {
                                            $selected = ($user['user_id'] == $data['user_id']) ? 'selected' : '';
                                            echo '<option value="' . $user['user_id'] . '" ' . $selected . '>' . $user['nama'] . '</option>';
                                        }
                                        ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                <a href="survey.php" class="btn btn-warning">Kembali</a>
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