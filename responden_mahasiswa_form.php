<?php
$menu = 'mahasiswa';
include_once('model/respon_biodata_mahasiswa.php');

$act = isset($_GET['act']) ? $_GET['act'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

$responden_mahasiswa = new RespondenMahasiswa();
$data = [];

if ($act == 'edit' && $id) {
    $result = $responden_mahasiswa->getDataById($id);
    $data = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Responden Mahasiswa Form</title>
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
                            <h1>Responden Mahasiswa Form</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Responden Mahasiswa Form</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Responden Mahasiswa</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="responden_mahasiswa_action.php?act=<?= $act ?>&id=<?= $id ?>">
                            <div class="form-group">
                                <label for="survey_id">Survey ID</label>
                                <input type="text" class="form-control" id="survey_id" name="survey_id"
                                    value="<?= isset($data['survey_id']) ? $data['survey_id'] : '' ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="responden_tanggal">Tanggal</label>
                                <input type="date" class="form-control" id="responden_tanggal" name="responden_tanggal"
                                    value="<?= isset($data['responden_tanggal']) ? $data['responden_tanggal'] : '' ?>"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="responden_nim">NIM</label>
                                <input type="text" class="form-control" id="responden_nim" name="responden_nim"
                                    value="<?= isset($data['responden_nim']) ? $data['responden_nim'] : '' ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="responden_nama">Nama</label>
                                <input type="text" class="form-control" id="responden_nama" name="responden_nama"
                                    value="<?= isset($data['responden_nama']) ? $data['responden_nama'] : '' ?>"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="responden_prodi">Program Studi</label>
                                <input type="text" class="form-control" id="responden_prodi" name="responden_prodi"
                                    value="<?= isset($data['responden_prodi']) ? $data['responden_prodi'] : '' ?>"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="responden_email">Email</label>
                                <input type="email" class="form-control" id="responden_email" name="responden_email"
                                    value="<?= isset($data['responden_email']) ? $data['responden_email'] : '' ?>"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="responden_hp">Nomor HP</label>
                                <input type="text" class="form-control" id="responden_hp" name="responden_hp"
                                    value="<?= isset($data['responden_hp']) ? $data['responden_hp'] : '' ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="tahun_masuk">Tahun Masuk</label> <input type="text" class="form-control"
                                    id="tahun_masuk" name="tahun_masuk"
                                    value="<?= isset($data['tahun_masuk']) ? $data['tahun_masuk'] : '' ?>" required>
                            </div>
                            <button type="submit"
                                class="btn btn-primary"><?= $act == 'edit' ? 'Simpan Perubahan' : 'Simpan' ?></button>
                        </form>
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