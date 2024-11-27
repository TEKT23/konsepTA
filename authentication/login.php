<?php
require '../config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/login.css">
    <!-- Tambahkan library SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="POST" action="cek_login.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>

    <!-- Script untuk menampilkan popup jika login gagal -->
    <script>
        <?php if (isset($_GET['pesan']) && $_GET['pesan'] == 'gagal') : ?>
        Swal.fire({
            icon: 'error',
            title: 'Login Gagal',
            text: 'Username atau password salah!',
            confirmButtonText: 'OK'
        });
        <?php endif; ?>
    </script>
</body>
</html>
