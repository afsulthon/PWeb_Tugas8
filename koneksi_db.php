<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "crud_upload";

try {
  $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Koneksi Gagal " . $e->getMessage();
}
