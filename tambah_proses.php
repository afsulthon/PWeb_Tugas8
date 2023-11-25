<?php
include "koneksi_db.php";

$nis = $_POST['nis'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$no_telp = $_POST['no_telp'];
$alamat = $_POST['alamat'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

$fotobaru = date('dmYHis') . $foto;

$path = "uploads/" . $fotobaru;

if (move_uploaded_file($tmp, $path)) {
  $query = $pdo->prepare("INSERT INTO siswa(nis, nama, jenis_kelamin, no_telp, alamat, foto) VALUES(:nis,:nama,:jenis_kelamin,:no_telp,:alamat,:foto)");
  $query->bindParam(":nis", $nis);
  $query->bindParam(":nama", $nama);
  $query->bindParam(":jenis_kelamin", $jenis_kelamin);
  $query->bindParam(":no_telp", $no_telp);
  $query->bindParam(":alamat", $alamat);
  $query->bindParam(":foto", $fotobaru);
  $query->execute();

  if ($query) {
    header("location: index.php");
  } else {
    echo "Gagal menyimpan data";
    header("location: tambah.php");
  }
} else {
  echo "Gagal upload gambar";
  header("location: tambah.php");
}
