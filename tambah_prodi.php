<?php
require_once 'auth.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include 'koneksi.php';

  $kode_prodi = $_POST['kode_prodi'];
  $nama_prodi = $_POST['nama_prodi'];
  $akreditasi = $_POST['akreditasi'];

  $query = "INSERT INTO program_studi (kode_prodi, nama_prodi, akreditasi) VALUES (?, ?, ?)";

  $stmt = mysqli_prepare($koneksi, $query);
  mysqli_stmt_bind_param($stmt, "sss", $kode_prodi, $nama_prodi, $akreditasi);

  if (mysqli_stmt_execute($stmt)) {
    header("Location: index.php#prodi-tab-pane");
    exit();
  } else {
    echo "Error: " . mysqli_error($koneksi);
  }
  mysqli_stmt_close($stmt);
  mysqli_close($koneksi);
}
?>

<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Tambah Program Studi | SIAKAD</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"><link href="assets/style.css" rel="stylesheet"></head><body><div class="app-shell"><aside class="sidebar"><div class="brand"><div class="brand-icon">🎓</div><div>SIAKAD<small>Manajemen Akademik</small></div></div><nav class="nav-menu"><a class="nav-link-custom" href="index.php">🏠 <span>Dashboard</span></a><a class="nav-link-custom" href="index.php#mahasiswa-tab-pane">👨‍🎓 <span>Mahasiswa</span></a><a class="nav-link-custom active" href="index.php#prodi-tab-pane">📚 <span>Program Studi</span></a></nav><div class="sidebar-footer">Sistem Informasi Akademik<br><strong>Junior Web Programming</strong></div></aside><main class="main"><header class="topbar"><div><div class="page-title">Tambah Program Studi</div><div class="page-subtitle">Manajemen Data Akademik</div></div><div class="user-chip"><div class="avatar">A</div><span>Administrator</span></div></header><section class="content"><div class="form-page"><div class="form-card"><div class="form-head"><h2>Tambah Program Studi</h2><p>Tambahkan program studi baru ke sistem.</p></div><div class="form-body"><form action="tambah_prodi.php" method="POST"><div class="row g-4"><div class="col-md-6"><label class="form-label">Kode Prodi</label><input type="text" class="form-control" name="kode_prodi" maxlength="2" value=""  required></div><div class="col-md-6"><label class="form-label">Nama Program Studi</label><input type="text" class="form-control" name="nama_prodi" value="" required></div><div class="col-md-6"><label class="form-label">Akreditasi</label><input type="text" class="form-control" name="akreditasi" maxlength="1" value="" required></div></div><div class="form-actions"><button type="submit" class="btn btn-primary">Simpan Program Studi</button><a href="index.php" class="btn btn-light border">Batal</a></div></form></div></div></div></section></main></div></body></html>