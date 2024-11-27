<?php
// Menghubungkan ke file config.php untuk koneksi database
include '../config.php';

// Mengecek apakah data dikirimkan melalui metode POST dan apakah ID tersedia
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $alamat = $_POST['alamat'];
    $jekel = $_POST['jekel'];
    $status = $_POST['status'];
    $pesan = $_POST['pesan'];

    // Menyusun query untuk memperbarui data berdasarkan ID
    $sql = "UPDATE pendaftar SET name = ?, email = ?, phone = ?, dob = ?, alamat = ?, jekel = ?, status = ?, pesan = ? WHERE id = ?";

    // Menggunakan prepared statement untuk keamanan
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssssssssi", $name, $email, $phone, $dob, $alamat, $jekel, $status, $pesan, $id);

    // Mengeksekusi query dan mengecek apakah berhasil
    if ($stmt->execute()) {
        // Mengarahkan kembali ke halaman utama dengan parameter update_success=true
        header("Location: index.php?update_success=true");
        exit;
    } else {
        echo "Error: " . $stmt->error; // Menampilkan pesan kesalahan jika gagal
    }

    // Menutup statement
    $stmt->close();
}

// Menutup koneksi database
$conn->close();
?>
