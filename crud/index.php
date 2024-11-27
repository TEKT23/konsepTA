<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <!-- Link DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <!-- Link DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <title>CRUD System</title>
</head>
<body>
    <div class="container">
        <h2>Daftar Pengguna</h2>
        
        <!-- Form Pencarian -->
        <form method="GET" action="" class="search-form">
            <input type="text" name="search" placeholder="Cari pengguna berdasarkan nama">
            <button type="submit">Cari</button>
        </form>
        
        <a href="create.php" class="btn">Tambah Pengguna Baru</a>
        <div class="table-container">
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Status</th>
                        <th>Pesan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Koneksi ke database
                    $conn = new mysqli("localhost", "root", "", "crud_db");
                    if ($conn->connect_error) {
                        die("Koneksi gagal: " . $conn->connect_error);
                    }

                    // Logika Pencarian
                    if (isset($_GET['search']) && !empty($_GET['search'])) {
                        $search = $_GET['search'];
                        // Menggunakan prepared statement untuk keamanan
                        $stmt = $conn->prepare("SELECT * FROM pendaftar WHERE name LIKE ?");
                        $searchTerm = "%" . $search . "%";
                        $stmt->bind_param("s", $searchTerm);
                    } else {
                        // Query default jika tidak ada pencarian
                        $stmt = $conn->prepare("SELECT * FROM pendaftar");
                    }

                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row["id"] . "</td>
                                    <td>" . $row["name"] . "</td>
                                    <td>" . $row["email"] . "</td>
                                    <td>" . $row["phone"] . "</td>
                                    <td>" . $row["dob"] . "</td>
                                    <td>" . $row["alamat"] . "</td>
                                    <td>" . $row["jekel"] . "</td>
                                    <td>" . $row["status"] . "</td>
                                    <td>" . $row["pesan"] . "</td>
                                    <td>
                                        <a href='update.php?id=" . $row["id"] . "' class='btn-edit'>Edit</a>
                                         <a href='#' onclick='confirmDelete(" . $row["id"] . ")' class='btn-delete'>Hapus</a>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='10'>Pengguna tidak ditemukan</td></tr>";
                    }

                    $stmt->close();
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <script>
        // Mengaktifkan DataTables pada tabel dengan ID 'myTable'
        $(document).ready(function() {
            $('#myTable').DataTable({
                "paging": true,         // Mengaktifkan pagination
                "searching": true,     // Menonaktifkan pencarian
                "ordering": false,       // Mengaktifkan sorting jika diinginkan
                "pageLength": 5,        // Menentukan jumlah data per halaman
                "info": true,            // Menampilkan info jumlah data di bawah tabel
            });
        });
    </script>
    <script>
    // Fungsi untuk menampilkan popup konfirmasi penghapusan data
    function confirmDelete(id) {
        var confirmation = confirm("Apakah Anda yakin ingin menghapus data ini?");
        if (confirmation) {
            // Jika konfirmasi diterima, redirect ke halaman delete.php dengan parameter id
            window.location.href = "delete.php?id=" + id;
        }
    }
</script>
</body>
</html>
