<?php
$menu = 'ortu';
include_once('model/respon_biodata_ortu.php');

$act = isset($_GET['act']) ? $_GET['act'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

$responden_ortu = new RespondenOrtu();
$data = [];

if ($act == 'edit' && $id) {
    $result = $responden_ortu->getDataById($id);
    $data = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Responden Ortu Form</title>
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
                            <h1>Responden Ortu Form</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Responden Ortu Form</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Responden Ortu</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="responden_ortu_action.php?act=<?= $act ?>&id=<?= $id ?>">
                            <div class="form-group">
                                <label for="survey_id">Survey ID</label>
                                <input type="text" class="form-control" id="survey_id" name="survey_id"
                                    value="<?= isset($data['survey_id']) ? $data['survey_id'] : '' ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="responden_tanggal">Tanggal</label>
                                <input type="date" class="form-control" id="responden_tanggal" name="responden_tanggal"
                                    value="<?= isset($data['responden_tanggal']) ? date('Y-m-d\TH:i', strtotime($data['responden_tanggal'])) : '' ?>"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="responden_nama">Nama</label>
                                <input type="text" class="form-control" id="responden_nama" name="responden_nama"
                                    value="<?= isset($data['responden_nama']) ? $data['responden_nama'] : '' ?>"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="responden_jk">Jenis Kelamin</label>
                                <select class="form-control" id="responden_jk" name="responden_jk" required>
                                    <option value="L"
                                        <?= isset($data['responden_jk']) && $data['responden_jk'] == 'L' ? 'selected' : '' ?>>
                                        Laki-laki</option>
                                    <option value="P"
                                        <?= isset($data['responden_jk']) && $data['responden_jk'] == 'P' ? 'selected' : '' ?>>
                                        Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="responden_umur">Umur</label>
                                <input type="number" class="form-control" id="responden_umur" name="responden_umur"
                                    value="<?= isset($data['responden_umur']) ? $data['responden_umur'] : '' ?>"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="responden_hp">Nomor HP</label>
                                <input type="text" class="form-control" id="responden_hp" name="responden_hp"
                                    value="<?= isset($data['responden_hp']) ? $data['responden_hp'] : '' ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="responden_pendidikan">Pendidikan</label>
                                <input type="text" class="form-control" id="responden_pendidikan"
                                    name="responden_pendidikan"
                                    value="<?= isset($data['responden_pendidikan']) ? $data['responden_pendidikan'] : '' ?>"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="responden_pekerjaan">Pekerjaan</label>
                                <input type="text" class="form-control" id="responden_pekerjaan"
                                    name="responden_pekerjaan"
                                    value="<?= isset($data['responden_pekerjaan']) ? $data['responden_pekerjaan'] : '' ?>"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="responden_penghasilan">Penghasilan</label>
                                <input type="text" class="form-control" id="responden_penghasilan"
                                    name="responden_penghasilan"
                                    value="<?= isset($data['responden_penghasilan']) ? $data['responden_penghasilan'] : '' ?>"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="mahasiswa_nim">NIM Mahasiswa</label>
                                <input type="text" class="form-control" id="mahasiswa_nim" name="mahasiswa_nim"
                                    value="<?= isset($data['mahasiswa_nim']) ? $data['mahasiswa_nim'] : '' ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="mahasiswa_nama">Nama Mahasiswa</label>
                                <input type="text" class="form-control" id="mahasiswa_nama" name="mahasiswa_nama"
                                    value="<?= isset($data['mahasiswa_nama']) ? $data['mahasiswa_nama'] : '' ?>"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="mahasiswa_prodi">Program Studi Mahasiswa</label>
                                <input type="text" class="form-control" id="mahasiswa_prodi" name="mahasiswa_prodi"
                                    value="<?= isset($data['mahasiswa_prodi']) ? $data['mahasiswa_prodi'] : '' ?>"
                                    required>
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