<?php
session_start();

// Ambil data dari form
$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');
$remember = isset($_POST['remember']);

if ($username === 'admin' && $password === '123') {
    $_SESSION['user'] = $username;
    
    // Set cookie jika remember me dicentang (7 hari)
    if ($remember) {
        setcookie('remember_user', $username, time() + (60 * 60 * 24 * 7), '/');
    }
    
    header('Location: ../index.php');
    exit;
} else {
    // Login gagal - redirect kembali dengan error (bisa pakai session flash)
    $_SESSION['error'] = 'Username atau password salah!';
    header('Location: ../login.php');
    exit;
}
?>

