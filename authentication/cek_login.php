<?php 
session_start();

// Menghubungkan dengan koneksi
include '../config.php';

// Menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Menggunakan prepared statement untuk keamanan
$stmt = mysqli_prepare($koneksi, "SELECT * FROM users WHERE username=? AND password=?");
mysqli_stmt_bind_param($stmt, "ss", $username, $password);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Mengecek jumlah data yang ditemukan
$cek = mysqli_num_rows($result);

if ($cek > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("Location: ../pages/dashboard.php");
} else {
    header("Location: login.php?pesan=gagal");
}
?>
