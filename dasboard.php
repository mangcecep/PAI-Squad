<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit;
}

$jumlah_siswa = 5;
$jumlah_guru = 8;
$siswa_tidak_hadir = 5;
$siswa_hadir = 0;
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Mobile</title>
  <link href="style/dasboard.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>
<body>

  <div class="header">
  <div class="header-left">
    <i class="fa-solid fa-bars menu-btn" id="menuBtn"></i>
    <img src="img/logo.png" alt="logo">
    <span>Kurikulum PI</span>
  </div>
  <div class="logout">
    <a href="logout.php" style="color:white; text-decoration:none;">
      <i class="fa-solid fa-sign-out-alt"></i> Logout
    </a>
  </div>
</div>


<div class="sidebar" id="sidebar">
  <button class="btn-close" id="btnClose">
    <i class="fa-solid fa-arrow-left"></i> Back
  </button>
 <div class="profile">
  <img src="img/user.png" alt="user">
  <p><?php echo $_SESSION['user']['name'] ?? 'Admin'; ?></p>
  <small><?php echo $_SESSION['user']['email'] ?? 'admin@gmail.com'; ?></small>
</div>

  <a href="dashboard.php"><i class="fa-solid fa-gauge"></i> Dashboard</a>
  <a href="ganti_password.php"><i class="fa-solid fa-key"></i> Ganti Password</a>
  <hr>
  <a href="siswa.php"><i class="fa-solid fa-user-graduate"></i> Data Siswa</a>
  <a href="guru.php"><i class="fa-solid fa-chalkboard-teacher"></i> Data Guru</a>
</div>

  <div class="overlay" id="overlay"></div>

  <div class="content">
    <h2>Dashboard</h2>
    <p>Home</p>

    <div class="cards">
      <div class="card blue">
        Jumlah Siswa
        <span><?php echo $jumlah_siswa; ?> Orang</span>
      </div>
      <div class="card yellow">
        Jumlah Guru
        <span><?php echo $jumlah_guru; ?> Orang</span>
      </div>
      <div class="card green">
        Jumlah Siswa Yang Tidak Hadir
        <span><?php echo $siswa_tidak_hadir; ?> Orang</span>
      </div>
      <div class="card red">
        Jumlah Siswa Yang Hadir
        <span><?php echo $siswa_hadir; ?> Orang</span>
      </div>
    </div>
  </div>
  <script>
    const menuBtn = document.getElementById("menuBtn");
    const sidebar = document.getElementById("sidebar");
    const btnClose = document.getElementById("btnClose");
    const overlay = document.getElementById("overlay");

    menuBtn.addEventListener("click", () => {
      sidebar.classList.add("active");
      overlay.classList.add("active");
    });

    btnClose.addEventListener("click", () => {
      sidebar.classList.remove("active");
      overlay.classList.remove("active");
    });

    overlay.addEventListener("click", () => {
      sidebar.classList.remove("active");
      overlay.classList.remove("active");
    });
  </script>

</body>
</html>
