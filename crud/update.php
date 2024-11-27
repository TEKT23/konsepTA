<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/cssform.css">
    <title>Edit Data User</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-container">
                    <h2 class="text-center mb-4">Edit Data User</h2>

                    <?php
                    $configPath = '../config.php';

                    if (file_exists($configPath)) {
                        include $configPath;
                    } else {
                        die("<div class='alert alert-danger'>Error: File konfigurasi tidak ditemukan.</div>");
                    }

                    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

                    if ($id > 0) {
                        $stmt = $koneksi->prepare("SELECT * FROM pendaftar WHERE id = ?");
                        $stmt->bind_param("i", $id);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            $user = $result->fetch_assoc();
                        } else {
                            die("<div class='alert alert-danger'>Data pengguna tidak ditemukan.</div>");
                        }
                        $stmt->close();
                    } else {
                        die("<div class='alert alert-danger'>ID tidak valid.</div>");
                    }
                    ?>

                    <form action="update_process.php?id=<?= $user['id'] ?>" method="POST">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($user['name']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Telepon</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="<?= htmlspecialchars($user['phone']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="dob">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="dob" name="dob" value="<?= htmlspecialchars($user['dob']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= htmlspecialchars($user['alamat']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="jekel">Jenis Kelamin</label>
                            <select class="form-control" name="jekel" id="jekel" required>
                                <option value="">Pilih</option>
                                <option value="Laki-laki" <?= $user['jekel'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                                <option value="Perempuan" <?= $user['jekel'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <div class="d-flex">
                                <div class="form-check mr-3">
                                    <input type="radio" class="form-check-input" id="status_pelajar" name="status" value="Pelajar" <?= $user['status'] == 'Pelajar' ? 'checked' : '' ?>>
                                    <label for="status_pelajar" class="form-check-label">Pelajar</label>
                                </div>
                                <div class="form-check mr-3">
                                    <input type="radio" class="form-check-input" id="status_mahasiswa" name="status" value="Mahasiswa" <?= $user['status'] == 'Mahasiswa' ? 'checked' : '' ?>>
                                    <label for="status_mahasiswa" class="form-check-label">Mahasiswa</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="status_pekerja" name="status" value="Pekerja" <?= $user['status'] == 'Pekerja' ? 'checked' : '' ?>>
                                    <label for="status_pekerja" class="form-check-label">Pekerja</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pesan">Pesan</label>
                            <textarea class="form-control" id="pesan" name="pesan" required><?= htmlspecialchars($user['pesan']) ?></textarea>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="index.php" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Pesan Sukses -->
    <?php if (isset($_GET['update_success']) && $_GET['update_success'] == 'true'): ?>
        <div class="modal" tabindex="-1" role="dialog" id="successModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Data Berhasil Diperbarui</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Data pengguna telah berhasil diperbarui.</p>
                    </div>
                    <div class="modal-footer">
                        <a href="index.php" class="btn btn-primary">OK</a>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#successModal').modal('show');
            });
        </script>
    <?php endif; ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        if (window.location.search.indexOf('update_success=true') !== -1) {
            $('#successModal').modal('show');
        }
    });
</script>
</body>
</html>
