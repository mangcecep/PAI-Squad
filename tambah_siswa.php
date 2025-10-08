<?php include "db/koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Siswa</title>
  <link rel="stylesheet" href="style/tambah.css">
</head>
<body>
  <div class="form-container">
    <h2>Tambah Siswa</h2>
    <form action="db/siswa.php" method="post" enctype="multipart/form-data">
      <label>NIS</label>
      <input type="text" name="nis" required>

      <label>Nama</label>
      <input type="text" name="nama" required>

      <label>Kelas</label>
      <input type="text" name="kelas" required>

      <label>Jurusan</label>
      <input type="text" name="jurusan">

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
      <a href="siswa.php" class="btn-back">Kembali</a>
    </form>
  </div>
</body>
</html>
