<?php
session_start();

// Hapus semua session
session_destroy();

// Hapus cookie remember
if (isset($_COOKIE['remember_user'])) {
    setcookie('remember_user', '', time() - 3600, '/');
}

header('Location: ../index.php');
exit;
?>

