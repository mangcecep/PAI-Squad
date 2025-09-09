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
  <title>Dashboard</title>
  <link href="style/dasboard.css" rel="stylesheet">
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
      <i class="fa-solid fa-user"></i> Admin
    </span>
    <a href="logout.php" class="btn-logout">Logout</a>
  </div>
</header>


  <aside class="sidebar" id="sidebar">
    <h4>Home</h4>
    <a href="dashboard.php" class="active"><i class="fa-solid fa-house"></i> Dashboard</a>

    <h4>Admin</h4>
    <a href="user.php"><i class="fa-solid fa-user"></i> User</a>
    <a href="password.php"><i class="fa-solid fa-key"></i> Ganti Password</a>

    <h4>Data</h4>
    <a href="siswa.php"><i class="fa-solid fa-users"></i> Siswa</a>
    <a href="guru.php"><i class="fa-solid fa-chalkboard-teacher"></i> Guru</a>

    <div class="sidebar-footer">
      Logged in as: <strong><?php echo $_SESSION['user']['name']; ?></strong>
    </div>
  </aside>

  <div class="overlay" id="overlay"></div>

  <main class="content">
    <h2>Dashboard</h2>
    <div class="cards">
      <div class="card blue">
        <h3>Jumlah Siswa</h3>
        <p>5 Orang</p>
      </div>
      <div class="card yellow">
        <h3>Jumlah Guru</h3>
        <p>8 Orang</p>
      </div>
      <div class="card green">
        <h3>Jumlah Siswa Tidak Hadir</h3>
        <p>5 Orang</p>
      </div>
      <div class="card red">
        <h3>Jumlah Siswa Hadir</h3>
        <p>0 Orang</p>
      </div>
    </div>
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
