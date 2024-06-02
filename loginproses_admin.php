<?php
include "model/koneksi.php";
session_start();

if (isset($_SESSION['username'])) {
    header('Location: home.php');
    exit();
}

// Check if form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch and validate user input
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    // Hash the password using BCRYPT
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Prepare statement for query
    $query = $db->prepare("SELECT * FROM m_user WHERE username = ?");
    $query->bind_param('s', $username);

    // Execute query
    $query->execute();
    $result = $query->get_result();

    // Check if any result is found
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify hashed password
        if (password_verify($password, $user['password'])) {
            if (isset($_POST["remember"])) {
                setcookie('username', $username, time() + 3600 * 24 * 5);
            }
            // Set session and redirect to home.php
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Login berhasil!";
            header('Location: home.php');
            exit();
        } else {
            // Redirect back to login page with error message
            $_SESSION['error'] = "Username atau password salah.";
            header('Location: login_admin.php');
            exit();
        }
    } else {
        // Redirect back to login page with error message
        $_SESSION['error'] = "Username atau password salah.";
        header('Location: login_admin.php');
        exit();
    }
}
?>