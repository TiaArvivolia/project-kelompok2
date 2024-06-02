<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terima Kasih - Survei Kepuasan Pelanggan Polinema</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
    body {
        font-family: 'Poppins', sans-serif;
        background: url('background.jpg') no-repeat center center fixed;
        background-size: cover;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: white;
        text-align: center;
        overflow: hidden;
    }

    .container {
        background: #007BFF;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        animation: fadeIn 2s ease-in-out, slideUp 1s ease-out;
        max-width: 90%;
        width: 400px;
    }

    h1 {
        font-size: 2em;
        margin-bottom: 10px;
        animation: textPopUp 1.8s ease-out;
    }

    p {
        font-size: 1em;
        margin-bottom: 30px;
        animation: textPopUp 2s ease-out;
    }

    .btn {
        background: orchid;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 8px;
        text-decoration: none;
        font-size: 1em;
        transition: background 0.4s, transform 0.4s;
    }

    .btn:hover {
        background: #e68900;
        transform: scale(1.05);
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes slideUp {
        from {
            transform: translateY(50px);
        }

        to {
            transform: translateY(0);
        }
    }

    @keyframes textPopUp {
        0% {
            opacity: 0;
            transform: scale(0.5);
        }

        100% {
            opacity: 1;
            transform: scale(1);
        }
    }

    /* Media queries for responsiveness */
    @media (max-width: 1200px) {
        .container {
            width: 80%;
        }

        h1 {
            font-size: 2.5rem;
        }
    }

    @media (max-width: 992px) {
        .container {
            width: 90%;
        }

        h1 {
            font-size: 2.2rem;
        }
    }

    @media (max-width: 768px) {
        .container {
            width: 100%;
            padding: 15px;
        }

        h1 {
            font-size: 1.8rem;
        }

        p {
            font-size: 0.9em;
        }

        .btn {
            padding: 10px 15px;
            font-size: 0.9em;
        }
    }

    @media (max-width: 576px) {
        .container {
            width: 100%;
            padding: 10px;
        }

        h1 {
            font-size: 1.5rem;
        }

        p {
            font-size: 0.8em;
        }

        .btn {
            padding: 8px 12px;
            font-size: 0.8em;
        }
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>Terima Kasih!</h1>
        <p>Terima kasih telah menyelesaikan survei kepuasan pelanggan Polinema. Umpan balik Anda sangat berarti bagi
            kami.</p>
        <a href="logoutproses.php" class="btn" id="logout-btn">Keluar</a>
    </div>

    <script>
    document.getElementById('logout-btn').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default action
        fetch('logoutproses.php')
            .then(response => {
                if (response.ok) {
                    window.location.href = 'index.php';
                } else {
                    alert('Logout gagal. Silakan coba lagi.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan. Silakan coba lagi.');
            });
    });
    </script>
</body>

</html>