<?php
include "koneksi.php";

$nis     = $_POST['nis'];
$nama    = $_POST['nama'];
$kelas   = $_POST['kelas'];
$jurusan = $_POST['jurusan'];
$gender  = $_POST['gender'];
$alamat  = $_POST['alamat'];

// upload foto
$foto = "";
if (!empty($_FILES['foto']['name'])) {
    $foto = "uploads/" . time() . "_" . $_FILES['foto']['name'];
    move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
}

$query = "INSERT INTO siswa (nis, nama, kelas, jurusan, gender, alamat, foto) 
          VALUES ('$nis','$nama','$kelas','$jurusan','$gender','$alamat','$foto')";

if (mysqli_query($koneksi, $query)) {
    header("Location: siswa.php");
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
