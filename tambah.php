<?php
require_once 'auth.php';
include 'koneksi.php';

// Ambil data program studi untuk dropdown
$prodi_query = "SELECT * FROM program_studi";
$prodi_result = mysqli_query($koneksi, $prodi_query);

// Cek apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nim = $_POST['nim'];
  $nama = $_POST['nama_mahasiswa'];
  $kode_prodi = $_POST['kode_prodi'];

  // Query untuk insert data
  $query = "INSERT INTO mahasiswa (nim, nama_mahasiswa, kode_prodi) VALUES (?, ?, ?)";

  $stmt = mysqli_prepare($koneksi, $query);
  mysqli_stmt_bind_param($stmt, "sss", $nim, $nama, $kode_prodi);

  if (mysqli_stmt_execute($stmt)) {
    // Jika berhasil, redirect ke halaman utama
    header("Location: index.php");
    exit();
  } else {
    echo "Error: " . mysqli_error($koneksi);
  }
  mysqli_stmt_close($stmt);
}
mysqli_close($koneksi);
?>

<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Tambah Mahasiswa | SIAKAD</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"><link href="assets/style.css" rel="stylesheet"></head><body><div class="app-shell"><aside class="sidebar"><div class="brand"><div class="brand-icon">🎓</div><div>SIAKAD<small>Manajemen Akademik</small></div></div><nav class="nav-menu"><a class="nav-link-custom" href="index.php">🏠 <span>Dashboard</span></a><a class="nav-link-custom active" href="index.php#mahasiswa-tab-pane">👨‍🎓 <span>Mahasiswa</span></a><a class="nav-link-custom" href="index.php#prodi-tab-pane">📚 <span>Program Studi</span></a></nav><div class="sidebar-footer">Sistem Informasi Akademik<br><strong>Junior Web Programming</strong></div></aside><main class="main"><header class="topbar"><div><div class="page-title">Tambah Mahasiswa</div><div class="page-subtitle">Manajemen Data Akademik</div></div><div class="user-chip"><div class="avatar">A</div><span>Administrator</span></div></header><section class="content"><div class="form-page"><div class="form-card"><div class="form-head"><h2>Tambah Mahasiswa</h2><p>Tambahkan data mahasiswa baru ke sistem.</p></div><div class="form-body"><form action="tambah.php" method="POST"><div class="row g-4"><div class="col-md-6"><label for="nim" class="form-label">NIM</label><input type="text" class="form-control" id="nim" name="nim" value=""  required></div><div class="col-md-6"><label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label><input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" value=""  required></div><div class="col-md-6"><label for="kode_prodi" class="form-label">Program Studi</label><select class="form-select" id="kode_prodi" name="kode_prodi" required><option value="">-- Pilih Program Studi --</option><?php while ($prodi = mysqli_fetch_assoc($prodi_result)) { echo '<option value="'.htmlspecialchars($prodi['kode_prodi']).'" '.($prodi['kode_prodi']==($mhs['kode_prodi'] ?? '')?'selected':'').'>' . htmlspecialchars($prodi['nama_prodi']) . '</option>'; } ?></select></div></div><div class="form-actions"><button type="submit" class="btn btn-primary">Simpan Mahasiswa</button><a href="index.php" class="btn btn-light border">Batal</a></div></form></div></div></div></section></main></div></body></html>