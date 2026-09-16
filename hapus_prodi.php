<?php
require_once 'auth.php';
include 'koneksi.php';

if (isset($_GET['kode'])) {
  $kode_prodi = $_GET['kode'];

  $query = "DELETE FROM program_studi WHERE kode_prodi = ?";

  $stmt = mysqli_prepare($koneksi, $query);
  mysqli_stmt_bind_param($stmt, "s", $kode_prodi);

  if (mysqli_stmt_execute($stmt)) {
    header("Location: index.php#prodi-tab-pane");
    exit();
  } else {
    echo "Error: " . mysqli_error($koneksi);
  }
  mysqli_stmt_close($stmt);
  mysqli_close($koneksi);
} else {
  header("Location: index.php");
  exit();
}
