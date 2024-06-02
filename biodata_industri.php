<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata Form</title>
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery Validation -->
    <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="plugins/jquery-validation/additional-methods.min.js"></script>
    <script src="plugins/jquery-validation/localization/messages_id.min.js"></script>
</head>

<body>
    <!-- Default box -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ISI BIODATA ANDA</h3>
                <div class="card-tools"></div>
            </div>
            <div class="card-body">
                <form action="biodata_industri_action.php?act=tambah" id="biodata" method="POST" class="form">
                    <div class="form-group">
                        <?php
                        $nama = $user->getNama();
                        ?>
                        <label for="nama">Nama</label>
                        <input type="text" name="responden_nama" class="form-control" value="<?php echo $nama ?>"
                            required placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="Jabatan">Jabatan</label>
                        <input type="text" name="responden_jabatan" class="form-control" required placeholder="Jabatan">
                    </div>
                    <div class="form-group">
                        <label for="Nama Perusahaan">Nama Instansi/Perusahaan Anda</label>
                        <input type="text" name="responden_perusahaan" class="form-control" required
                            placeholder="Misal D4 Sistem Informasi Bisnis ">
                    </div>
                    <div class="form-group">
                        <label for="responden_tanggal">Tanggal Mengisi Respon</label>
                        <input type="date" name="responden_tanggal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="responden_email">Alamat Email</label>
                        <input type="email" name="responden_email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="responden_hp">Masukkan No.Telpon</label>
                        <input type="text" name="responden_hp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="responden_kota">Mahasiswa Angkatan</label>
                        <input type="text" name="responden_kota" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="mahasiswa_nim">NIM Mahasiswa</label>
                        <input type="text" name="mahasiswa_nim" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="mahasiswa_prodi">Prodi Mahasiswa</label>
                        <input type="text" name="mahasiswa_prodi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="survey">Survey</label>
                        <p class="form-control-plaintext"
                            style="border: 1px solid #ced4da; padding: .375rem .75rem; border-radius: .25rem;">Survey
                            Industri</p>
                        <input type="hidden" name="survey_id" value="2">
                    </div>

                    <div class="form-group" style="text-align: right;">
                        <button type="submit" class="btn btn-primary">Selanjutnya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <aside class="control-sidebar control-sidebar-dark"></aside>

    <script>
    $(document).ready(function() {
        $('#biodata').validate({
            rules: {
                responden_nama: {
                    required: true,
                    minlength: 5
                },
                responden_jabatan: {
                    required: true,
                    minlength: 3
                },
                responden_perusahaan: {
                    required: true,
                    minlength: 3
                },
                responden_tanggal: {
                    required: true,
                    date: true
                },
                responden_email: {
                    required: true,
                    email: true
                },
                responden_hp: {
                    required: true,
                    minlength: 10,
                    digits: true
                },
                responden_kota: {
                    required: true,
                    minlength: 2
                },
                mahasiswa_nim: {
                    required: true,
                    minlength: 8,
                    digits: true
                },
                mahasiswa_prodi: {
                    required: true,
                    minlength: 2
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