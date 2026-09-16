<?php
require_once 'auth.php';
include 'koneksi.php';

// Cek apakah nim ada di URL
if (isset($_GET['nim'])) {
  $nim = $_GET['nim'];

  // Query untuk menghapus data berdasarkan nim
  $query = "DELETE FROM mahasiswa WHERE nim = ?";

  $stmt = mysqli_prepare($koneksi, $query);
  mysqli_stmt_bind_param($stmt, "s", $nim);

  if (mysqli_stmt_execute($stmt)) {
    // Jika berhasil, redirect kembali ke halaman utama
    header("Location: index.php");
    exit();
  } else {
    echo "Error: " . mysqli_error($koneksi);
  }
  mysqli_stmt_close($stmt);
  mysqli_close($koneksi);
} else {
  // Jika tidak ada nim, redirect ke halaman utama
  header("Location: index.php");
  exit();
}
