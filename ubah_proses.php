<?php
include "koneksi_db.php";

$id = $_GET['id'];

$nis = $_POST['nis'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$no_telp = $_POST['no_telp'];
$alamat = $_POST['alamat'];

$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

if (empty($foto)) {
  $query = $pdo->prepare("UPDATE siswa SET nis=:nis, nama=:nama, jenis_kelamin=:jenis_kelamin, no_telp=:no_telp, alamat=:alamat WHERE id=:id");
  $query->bindParam(":nis", $nis);
  $query->bindParam(":nama", $nama);
  $query->bindParam(":jenis_kelamin", $jenis_kelamin);
  $query->bindParam(":no_telp", $no_telp);
  $query->bindParam(":alamat", $alamat);
  $query->bindParam(":id", $id);
  $execute = $query->execute();

  if ($query) {
    header("location: index.php");
  } else {
    echo "Gagal menyimpan data";
    header("location: ubah.php?id=" . $id);
  }
} else {
  $fotobaru = date('dmYHis') . $foto;

  $path = "uploads/" . $fotobaru;

  if (move_uploaded_file($tmp, $path)) {
    $query = $pdo->prepare("SELECT * FROM siswa WHERE id=:id");
    $query->bindParam(':id', $id);
    $query->execute();
    $data = $query->fetch();

    if (is_file("uploads/" . $data['foto'])) {
      unlink("uploads/" . $data['foto']);
    }

    $query = $pdo->prepare("UPDATE siswa SET nis=:nis, nama=:nama, jenis_kelamin=:jenis_kelamin, no_telp=:no_telp, alamat=:alamat, foto=:foto WHERE id=:id");
    $query->bindParam(":nis", $nis);
    $query->bindParam(":nama", $nama);
    $query->bindParam(":jenis_kelamin", $jenis_kelamin);
    $query->bindParam(":no_telp", $no_telp);
    $query->bindParam(":alamat", $alamat);
    $query->bindParam(":foto", $fotobaru);
    $query->bindParam(":id", $id);
    $query->execute();

    if ($query) {
      header("location: index.php");
    } else {
      echo "Gagal menyimpan data";
      header("location: ubah.php?id=" . $id);
    }
  } else {
    echo "Gagal upload gambar";
    header("location: ubah.php?id=" . $id);
  }
}
