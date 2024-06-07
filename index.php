<?php
if (SESSION_STATUS() === PHP_SESSION_NONE) {
    SESSION_START();
}
// header('Location: login_pengguna.php');
header('Location: landing-page.php');
exit();