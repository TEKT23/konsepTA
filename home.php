<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pendaftaran Peserta Lomba E-Sports</title>
    <link rel="stylesheet" href="assets/csshome.css" />
  </head>
  <body>
    <section id="landing-page">
      <header>
        <h1>Web Pendaftaran Lomba E-Sports</h1>
        <nav>
          <a href="#landing-page">Home</a>
          <a href="#about">Tentang Lomba</a>
          <a href="javascript:void(0)" onclick="window.location.href='crud/create.php'">Daftar</a>
          <a href="#contact">Kontak</a>
          <a href="authentication/login.php">Login</a>
        </nav>
      </header>

      <main>
        <div class="landing-content">
          <h2>Bergabunglah dan Tunjukkan Skill Kalian!</h2>
          <p>
            Lomba yang kami buat terbuka untuk umum, ayo daftarkan tim kalian
            dan menangkan perlombaan
          </p>
          <button onclick="window.location.href='crud/create.php'" class="cta-button">
            Daftar Sekarang
          </button>
        </div>

        <section class="additional-info">
          <article>
            <h3>Jenis Olahraga yang Dilombakan</h3>
            <p>
              Kami menyelenggarakan berbagai jenis lomba olahraga, di antaranya:
            </p>
            <ul>
              <li>Mobile Legens</li>
              <li>PUBG Mobile</li>
              <li>E-Football</li>
              <li>Tekken-8</li>
              <li>Dead by Daylight</li>
            </ul>
          </article>

          <aside>
            <h3>Benefit Mengikuti Lomba</h3>
            <ul>
              <li>Menambah pengalaman</li>
              <li>Mengasah Skill</li>
              <li>Mendapatkan sertifikat</li>
              <li>
                Mendapatkan uang tunai + sertifikat juara jika memenangkan
                perlombaan
              </li>
            </ul>
            <p><strong>Tanggal Lomba:</strong> 21 Desember 2024</p>
            <p><strong>Lokasi:</strong> Senayan, Jakarta Selatan</p>
          </aside>
        </section>
      </main>
    </section>

    <!-- <section id="form-page" style="display: none">
      <button onclick="showLandingPage()" class="back-button">
        ← Kembali ke Halaman Utama
      </button>
      <h2 class="form-title">Formulir Pendaftaran</h2>
      <form action="" method="post">
        <label for="Nama">Nama:</label>
        <input type="text" id="Nama" name="Nama" required />

        <label for="Email">Email:</label>
        <input type="email" id="Email" name="Email" required />

        <label for="Nomor">Nomor Telepon:</label>
        <input type="tel" id="Nomor" name="Nomor" required />

        <label for="Tanggal">Tanggal Lahir:</label>
        <input type="date" id="Tanggal" name="Tanggal" />

        <label for="Alamat">Alamat:</label>
        <input type="text" id="Alamat" name="Alamat" />

        <label for="JenisKelamin">Jenis Kelamin:</label>
        <select name="JenisKelamin" id="JenisKelamin">
          <option value="">Pilih</option>
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>

        <div class="radio-group">
          <input type="radio" id="pelajar" name="status" />
          <label for="pelajar">Pelajar</label>

          <input type="radio" id="mahasiswa" name="status" />
          <label for="mahasiswa">Mahasiswa</label>

          <input type="radio" id="pekerja" name="status" />
          <label for="pekerja">Pekerja</label>
        </div>

        <label for="pesan">Pesan atau Komentar:</label>
        <textarea
          name="pesan"
          id="pesan"
          rows="4"
          placeholder="Masukkan komentar Anda"
        ></textarea>

        <button type="submit">Submit</button>
      </form>
    </section> -->

    <footer>
      <p>&copy; 2024 Pendaftaran Lomba Olahraga. All rights reserved.</p>
    </footer>

    <script>
      function showForm() {
        document.getElementById("landing-page").style.display = "none";
        document.getElementById("form-page").style.display = "block";
      }

      function showLandingPage() {
        document.getElementById("landing-page").style.display = "block";
        document.getElementById("form-page").style.display = "none";
      }
    </script>
  </body>
</html>
