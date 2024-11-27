<?php
// Mengecek apakah form telah dikirim dengan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = preg_replace("/[^0-9]/", "", $_POST["phone"]); // Menghapus karakter non-numeric
    $tanggal_lahir = $_POST['dob'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jekel'];
    $status = isset($_POST['status']) ? $_POST['status'] : '';
    $pesan = $_POST['pesan'];

    // Membuat koneksi ke database
    $conn = new mysqli("localhost", "root", "", "crud_db");
    if ($conn->connect_error) { // Mengecek apakah koneksi gagal
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Menyusun query untuk memasukkan data ke tabel pendaftar
    $sql = "INSERT INTO pendaftar (name, email, phone, dob, alamat, jekel, status, pesan) 
            VALUES ('$name', '$email', '$phone', '$tanggal_lahir', '$alamat', '$jenis_kelamin', '$status', '$pesan')";

    // Menjalankan query dan mengecek apakah berhasil
    if ($conn->query($sql) === TRUE) { // Redirect ke halaman utama jika berhasil
        header("Location: ../pages/done.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error; // Menampilkan pesan kesalahan jika gagal
    }

    // Menutup koneksi
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/formulir.css">
    <title>Form Pengguna</title>
</head>
<body>

<div class="container">
    <button onclick="window.location.href='../home.php'" class="back-button">← Kembali ke Halaman Utama</button>
    <h2 class="form-title" style="text-align: center;">Tambah Data Biodata</h2>
    <form action="create.php" method="post">
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" required />

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required />

        <label for="phone">Nomor Telepon:</label>
        <input type="tel" id="phone" name="phone" required />

        <label for="dob">Tanggal Lahir:</label>
        <input type="date" id="dob" name="dob" />

        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" />

        <label for="jekel">Jenis Kelamin:</label>
        <select name="jekel" id="jekel">
            <option value="">Pilih</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>

        <div class="radio-group">
            <input type="radio" id="status_pelajar" name="status" value="Pelajar" />
            <label for="status_pelajar">Pelajar</label>

            <input type="radio" id="status_mahasiswa" name="status" value="Mahasiswa" />
            <label for="status_mahasiswa">Mahasiswa</label>

            <input type="radio" id="status_pekerja" name="status" value="Pekerja" />
            <label for="status_pekerja">Pekerja</label>
        </div>

        <label for="pesan">Pesan:</label>
        <textarea name="pesan"
          id="pesan"
          rows="4"
          placeholder="Masukkan komentar Anda"></textarea>

        <button type="submit">Kirim</button>
    </form>
</div>
</body>
</html>
