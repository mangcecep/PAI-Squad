<?php
session_start();
include "db/koneksi.php";

$tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d');

$query = "
    SELECT s.id, s.nama, s.kelas, a.status, a.tanggal 
    FROM siswa s
    LEFT JOIN absensi a 
      ON s.id = a.siswa_id AND a.tanggal = '$tanggal'
    ORDER BY s.nama ASC
";
$data = $koneksi->query($query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Absensi</title>
  <link href="style/absensi.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
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

  <aside class="sidebar" id="sidebar">
    <h4>Home</h4>
    <a href="index.php"><i class="fa-solid fa-house"></i> Dashboard</a>
    <h4>Admin</h4>
    <a href="user.php"><i class="fa-solid fa-user"></i> User</a>
    <a href="password.php"><i class="fa-solid fa-key"></i> Ganti Password</a>
    <h4>Data</h4>
    <a href="siswa.php"><i class="fa-solid fa-users"></i> Siswa</a>
    <a href="guru.php"><i class="fa-solid fa-chalkboard-teacher"></i> Guru</a>
    <a href="absensi.php" class="active"><i class="fa-solid fa-clipboard-check"></i> Absensi</a>
    <div class="sidebar-footer">
      Logged in as: <strong><?php echo $_SESSION['user']['name']; ?></strong>
    </div>
  </aside>

  <div class="overlay" id="overlay"></div>

  <main class="content">
    <h2>Absensi Siswa</h2>

    <form method="get" class="filter-form">
      <label for="tanggal">Pilih Tanggal:</label>
      <input type="date" name="tanggal" id="tanggal" value="<?= $tanggal ?>" required>
      <button type="submit" class="btn-add"><i class="fa-solid fa-search"></i> Cari</button>
    </form>

    <table class="data-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Kelas</th>
          <th>Status</th>
          <th>Tanggal</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $no=1; 
        while($row = $data->fetch_assoc()): 
        ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['kelas'] ?></td>
            <td><?= $row['status'] ? $row['status'] : '-' ?></td>
            <td><?= $row['tanggal'] ? $row['tanggal'] : '-' ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
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
