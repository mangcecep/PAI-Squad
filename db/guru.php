<?php
include "koneksi.php";

$nip    = $_POST['nip'];
$nama   = $_POST['nama'];
$mapel  = $_POST['mapel'];
$gender = $_POST['gender'];
$alamat = $_POST['alamat'];

// upload foto
$foto = "";
if (!empty($_FILES['foto']['name'])) {
    $foto = "uploads/" . time() . "_" . $_FILES['foto']['name'];
    move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
}

$query = "INSERT INTO guru (nip, nama, mapel, gender, alamat, foto) 
          VALUES ('$nip','$nama','$mapel','$gender','$alamat','$foto')";

if (mysqli_query($koneksi, $query)) {
    header("Location: guru.php");
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
