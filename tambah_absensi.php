<?php
include "db/koneksi.php";

// jika submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $tanggal = $_POST['tanggal'];
  foreach ($_POST['status'] as $siswa_id => $status) {
    $sql = "INSERT INTO absensi (siswa_id, tanggal, status)
            VALUES ('$siswa_id', '$tanggal', '$status')
            ON DUPLICATE KEY UPDATE status='$status'";
    $koneksi->query($sql);
  }
  header("Location: absensi.php?tanggal=".$tanggal);
  exit;
}

$siswa = $koneksi->query("SELECT * FROM siswa ORDER BY nama ASC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Absensi</title>
  <link href="style/absensi.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
  <!-- Navbar -->
  <header class="navbar">
    <div class="navbar-left">
      <button class="menu-toggle" id="menuToggle"><i class="fa-solid fa-bars"></i></button>
      <img src="logo.png" alt="Logo" class="logo">
      <span class="app-name">Kurikulum PI</span>
    </div>
    <div class="navbar-right">
      <span class="user-info"><i class="fa-solid fa-user"></i> Admin</span>
      <a href="logout.php" class="btn-logout">Logout</a>
    </div>
  </header>

  <!-- Sidebar -->
  <aside class="sidebar" id="sidebar">
    <h4>Home</h4>
    <a href="index.php"><i class="fa-solid fa-house"></i> Dashboard</a>
    <h4>Data</h4>
    <a href="siswa.php"><i class="fa-solid fa-users"></i> Siswa</a>
    <a href="guru.php"><i class="fa-solid fa-chalkboard-teacher"></i> Guru</a>
    <a href="absensi.php" class="active"><i class="fa-solid fa-clipboard-check"></i> Absensi</a>
  </aside>

  <div class="overlay" id="overlay"></div>

  <!-- Content -->
  <main class="content">
    <h2>Tambah Absensi</h2>

    <form method="post" class="absensi-form">
      <label for="tanggal">Tanggal:</label>
      <input type="date" name="tanggal" id="tanggal" value="<?= date('Y-m-d') ?>" required>
      
      <table class="data-table">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; while($row = $siswa->fetch_assoc()): ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['kelas'] ?></td>
            <td>
              <select name="status[<?= $row['id'] ?>]">
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Sakit">Sakit</option>
                <option value="Alpha">Alpha</option>
              </select>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
      <button type="submit" class="btn-add"><i class="fa-solid fa-save"></i> Simpan</button>
    </form>
  </main>

  <script>
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    menuToggle.addEventListener('click', () => {
      sidebar.classList.toggle('open');
      overlay.classList.toggle('active');
    });
    overlay.addEventListener('click', () => {
      sidebar.classList.remove('open');
      overlay.classList.remove('active');
    });
  </script>
</body>
</html>
