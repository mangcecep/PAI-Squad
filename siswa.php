<?php
session_start();
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = ['name' => 'Admin'];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Siswa</title>
  <link href="style/siswa.css" rel="stylesheet">
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
      <a href="logout.php" class="btn-logout">
        <i class="fa-solid fa-right-from-bracket"></i> Logout
      </a>
    </div>
  </header>

  <aside class="sidebar" id="sidebar">
    <div class="sidebar-section">
      <h4>Home</h4>
      <a href="dasboard.php"><i class="fa-solid fa-house"></i> Dashboard</a>
    </div>
    <div class="sidebar-section">
      <h4>Admin</h4>
      <a href="user.php"><i class="fa-solid fa-user"></i> User</a>
      <a href="password.php"><i class="fa-solid fa-key"></i> Ganti Password</a>
    </div>
    <div class="sidebar-section">
      <h4>Data</h4>
      <a href="siswa.php" class="active"><i class="fa-solid fa-users"></i> Siswa</a>
      <a href="guru.php"><i class="fa-solid fa-chalkboard-teacher"></i> Guru</a>
    </div>
    <div class="sidebar-footer">
      Logged in as: <strong><?php echo $_SESSION['user']['name']; ?></strong>
    </div>
  </aside>

  <main class="content">
    <div class="content-header">
      <h2>Siswa</h2>
      <button class="btn-add"><i class="fa-solid fa-plus"></i> Tambah Siswa</button>
    </div>

    <table class="data-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Foto</th>
          <th>NIS</th>
          <th>Nama</th>
          <th>Kelas</th>
          <th>Jurusan</th>
          <th>Alamat</th>
          <th>Operasi</th>
        </tr>
      </thead>
      <tbody>
        <?php for ($i = 1; $i <= 5; $i++): ?>
        <tr>
          <td><?= $i ?></td>
          <td><img src="profile.png" class="profile-img"></td>
          <td>00<?= $i ?></td>
          <td>Siswa <?= $i ?></td>
          <td>Kelas <?= $i ?></td>
          <td>Jurusan <?= $i ?></td>
          <td>Alamat Siswa <?= $i ?></td>
          <td>
            <button class="btn-edit"><i class="fa-solid fa-pen"></i></button>
            <button class="btn-delete"><i class="fa-solid fa-trash"></i></button>
          </td>
        </tr>
        <?php endfor; ?>
      </tbody>
    </table>
  </main>

  <script>
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    menuToggle.addEventListener('click', () => {
      sidebar.classList.toggle('open');
    });
  </script>
</body>
</html>
