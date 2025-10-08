<?php
session_start();
include "db/koneksi.php";

if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = ['name' => 'Admin'];
}

$result = mysqli_query($koneksi, "SELECT * FROM guru ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Guru</title>
  <link rel="stylesheet" href="style/guru.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
  <header class="navbar">
    <div class="navbar-left">
      <button class="menu-toggle" id="menuToggle">
        <i class="fa-solid fa-bars"></i>
      </button>
      <img src="img/logo.png" alt="Logo" class="logo">
      <span class="app-name">Kurikulum PI</span>
    </div>
    <div class="navbar-right">
      <span class="user-info">
        <i class="fa-solid fa-user"></i> <?php echo $_SESSION['user']['name']; ?>
      </span>
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
    <a href="guru.php" class="active"><i class="fa-solid fa-chalkboard-teacher"></i> Guru</a>

    <h4>Absensi</h4>
    <a href="absensi.php" class="active"><i class="fa-solid fa-clipboard-check"></i> Absensi</a>

    <div class="sidebar-footer">
      Logged in as: <strong><?php echo $_SESSION['user']['name']; ?></strong>
    </div>
  </aside>

  <div class="overlay" id="overlay"></div>

  <main class="content">
    <div class="content-header">
      <h2>Data Guru</h2>
      <a href="tambah_guru.php" class="btn-add"><i class="fa fa-plus"></i> Tambah Guru</a>
    </div>

    <table class="data-table">
      <thead>
        <tr>
          <th>No</th>
          <th>NIP</th>
          <th>Nama</th>
          <th>Mata Pelajaran</th>
          <th>Gender</th>
          <th>Alamat</th>
          <th>Foto</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['nip']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['mapel']; ?></td>
            <td><?= $row['gender']; ?></td>
            <td><?= $row['alamat']; ?></td>
            <td>
              <?php if ($row['foto']) { ?>
                <img src="<?= $row['foto']; ?>" class="profile-img">
              <?php } ?>
            </td>
          </tr>
        <?php } ?>
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
