<?php
$menu = 'kategori';
include_once('model/kategori.php');
include_once('model/session.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kategori</title>

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
                            <h1>Kategori</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Kategori</li>
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
                        <h3 class="card-title">Tambah Kategori</h3>
                    </div>
                    <div class="card-body">
                        <form action="kategori_action.php?act=simpan" method="post" id="form-tambah">
                            <div class="form-group">
                                <label for="kategori_nama">Nama Kategori</label>
                                <input required type="text" name="kategori_nama" id="kategori_nama"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="simpan" class="btn btn-primary"
                                    value="simpan">Simpan</button>
                                <a href="kategori.php" class="btn btn-warning">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
                <?php } else if ($act == 'edit') { ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Kategori</h3>
                    </div>
                    <div class="card-body">
                        <?php
                            $id = $_GET['id'];
                            $m_kategori = new Kategori();
                            $data = $m_kategori->getDataById($id);
                            $data = $data->fetch_assoc();
                            ?>
                        <form action="kategori_action.php?act=edit&id=<?php echo $id ?>" method="post" id="form-tambah">
                            <div class="form-group">
                                <label for="kategori_nama">Nama Kategori</label>
                                <input type="text" name="kategori_nama" id="kategori_nama" class="form-control"
                                    value="<?php echo $data['kategori_nama'] ?>">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                <a href="kategori.php" class="btn btn-warning">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
                <?php } ?>
            </section>
        </div>
        <?php include_once('layouts/footer.php'); ?>
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
                kategori_nama: {
                    required: true,
                    minlength: 3
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