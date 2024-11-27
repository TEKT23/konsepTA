<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../authentication/login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/dashboard.css">
</head>
<body>
    <div class="container">
        <h2>Selamat Datang, <?php echo $_SESSION['username']; ?>!</h2>
        
        <nav>
            <a href="../crud/index.php">
                <button>Lihat Data Biodata</button>
            </a>
            <a href="../crud/create.php">
                <button>Tambah Data</button>
            </a>
            <a href="../authentication/logout.php">
                <button>Logout</button>
            </a>
        </nav>
    </div>
</body>
</html>
