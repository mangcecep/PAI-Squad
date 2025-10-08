<?php include "db/koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Guru</title>
  <link rel="stylesheet" href="style/tambah.css">
</head>
<body>
  <div class="form-container">
    <h2>Tambah Guru</h2>
    <form action="db/guru.php" method="post" enctype="multipart/form-data">
      <label>NIP</label>
      <input type="text" name="nip" required>

      <label>Nama</label>
      <input type="text" name="nama" required>

      <label>Mata Pelajaran</label>
      <input type="text" name="mapel" required>

      <label>Jenis Kelamin</label>
      <select name="gender" required>
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
      </select>

      <label>Alamat</label>
      <textarea name="alamat"></textarea>

      <label>Foto</label>
      <input type="file" name="foto">

      <button type="submit" class="btn">Simpan</button>
      <a href="guru.php" class="btn-back">Kembali</a>
    </form>
  </div>
</body>
</html>
