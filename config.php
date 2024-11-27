<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud_db";

// Membuat koneksi
$koneksi = new mysqli($servername, $username, $password, $dbname);
// Mengecek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
