<?php
include "koneksi_db.php";

$id = $_GET['id'];

$query = $pdo->prepare("SELECT * FROM siswa WHERE id=:id");
$query->bindParam(':id', $id);
$query->execute();
$data = $query->fetch();

if (is_file("uploads/" . $data['foto'])) {
  unlink("uploads/" . $data['foto']);
}

$query = $pdo->prepare("DELETE FROM siswa WHERE id=:id");
$query->bindParam(":id", $id);
$query->execute();

if ($query) {
  header("location: index.php");
} else {
  echo "Gagal menghapus data";
  header("location: hapus.php?id=" . $id);
}
