<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap">
    <style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
        transition: background-color 0.5s ease;
    }

    .container {
        padding: 40px 20px;
    }

    .jumbotron {
        background-image: url('background.png');
        background-size: cover;
        background-position: center;
        color: #fff;
        text-align: center;
        padding: 100px 0;
        margin-bottom: 40px;
        transition: background-image 0.5s ease;
    }

    .jumbotron h1 {
        font-size: 36px;
        margin-bottom: 20px;
    }

    .jumbotron p {
        font-size: 18px;
        margin-bottom: 40px;
    }

    .btn-custom {
        padding: 10px 20px;
        font-size: 18px;
        border-radius: 5px;
        margin-top: 20px;
    }

    .survey-links {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }

    .survey-links a {
        color: #333;
        margin: 10px;
        padding: 15px 20px;
        border-radius: 10px;
        border: 1px solid #ccc;
        transition: all 0.3s ease;
        background-color: #fff;
        box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }

    .survey-links a:hover {
        border-color: #007bff;
        color: #007bff;
    }

    .survey-links i {
        margin-right: 10px;
    }
    </style>
</head>

<body>

    <div class="jumbotron" id="jumbotron">
        <div class="container">
            <h1>Selamat Datang di Survey Kepuasan Pelanggan POLINEMA</h1>
            <p>Bagikan pengalaman Anda dan bantu kami meningkatkan pelayanan kami</p>
            <a href="#survey" class="btn btn-primary btn-custom">Mulai Survey</a>
        </div>
    </div>

    <div class="container">
        <h2>Pilih Responden:</h2>
        <div class="survey-links">
            <a href="biodata_dosen.php"><i class="fas fa-chalkboard-teacher"></i> Dosen</a>
            <a href="biodata_mahasiswa.php"><i class="fas fa-user-graduate"></i> Mahasiswa</a>
            <a href="biodata_alumni.php"><i class="fas fa-user-graduate"></i> Alumni</a>
            <a href="biodata_ortu.php"><i class="fas fa-user-friends"></i> Orang Tua</a>
            <a href="biodata_tendik.php"><i class="fas fa-user-tie"></i> Tendik</a>
            <a href="biodata_industri.php"><i class="fas fa-building"></i> Industri</a>
        </div>
    </div>

    <div class="container">
        <h2>Login Admin:</h2>
        <div class="text-center">
            <a href="login_admin.php" class="btn btn-primary btn-custom">Admin Login</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    // Smooth scroll
    $(document).ready(function() {
        $('a[href^="#"]').on('click', function(event) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                event.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top
                }, 1000);
            }
        });
    });

    // Color change on scroll
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 300) {
            $("#jumbotron").css("background-image",
                "url('https://images.unsplash.com/photo-1573497490083-5ee7b9b4060d')");
            $("body").css("background-color", "#f2f2f2");
        } else {
            $("#jumbotron").css("background-image",
                "url('background.png')");
            $("body").css("background-color", "#f8f9fa");
        }
    });
    </script>
</body>

</html>