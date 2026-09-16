<?php
require_once 'auth.php';
include 'koneksi.php';

// Proses update data jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $kode_prodi = $_POST['kode_prodi'];
  $nama_prodi = $_POST['nama_prodi'];
  $akreditasi = $_POST['akreditasi'];

  $query = "UPDATE program_studi SET nama_prodi=?, akreditasi=? WHERE kode_prodi=?";

  $stmt = mysqli_prepare($koneksi, $query);
  mysqli_stmt_bind_param($stmt, "sss", $nama_prodi, $akreditasi, $kode_prodi);

  if (mysqli_stmt_execute($stmt)) {
    header("Location: index.php#prodi-tab-pane");
    exit();
  } else {
    echo "Error: " . mysqli_error($koneksi);
  }
  mysqli_stmt_close($stmt);
}

// Ambil data prodi yang akan diedit dari database
$kode_to_edit = $_GET['kode'];
$query_prodi = "SELECT * FROM program_studi WHERE kode_prodi = ?";
$stmt_prodi = mysqli_prepare($koneksi, $query_prodi);
mysqli_stmt_bind_param($stmt_prodi, "s", $kode_to_edit);
mysqli_stmt_execute($stmt_prodi);
$result_prodi = mysqli_stmt_get_result($stmt_prodi);
$prodi = mysqli_fetch_assoc($result_prodi);
?>

<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Edit Program Studi | SIAKAD</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"><link href="assets/style.css" rel="stylesheet"></head><body><div class="app-shell"><aside class="sidebar"><div class="brand"><div class="brand-icon">🎓</div><div>SIAKAD<small>Manajemen Akademik</small></div></div><nav class="nav-menu"><a class="nav-link-custom" href="index.php">🏠 <span>Dashboard</span></a><a class="nav-link-custom" href="index.php#mahasiswa-tab-pane">👨‍🎓 <span>Mahasiswa</span></a><a class="nav-link-custom active" href="index.php#prodi-tab-pane">📚 <span>Program Studi</span></a></nav><div class="sidebar-footer">Sistem Informasi Akademik<br><strong>Junior Web Programming</strong></div></aside><main class="main"><header class="topbar"><div><div class="page-title">Edit Program Studi</div><div class="page-subtitle">Manajemen Data Akademik</div></div><div class="user-chip"><div class="avatar">A</div><span>Administrator</span></div></header><section class="content"><div class="form-page"><div class="form-card"><div class="form-head"><h2>Edit Program Studi</h2><p>Perbarui informasi program studi yang dipilih.</p></div><div class="form-body"><form action="edit_prodi.php" method="POST"><div class="row g-4"><div class="col-md-6"><label class="form-label">Kode Prodi</label><input type="text" class="form-control" name="kode_prodi" maxlength="2" value="<?php echo htmlspecialchars($prodi['kode_prodi'] ?? ''); ?>" readonly required></div><div class="col-md-6"><label class="form-label">Nama Program Studi</label><input type="text" class="form-control" name="nama_prodi" value="<?php echo htmlspecialchars($prodi['nama_prodi'] ?? ''); ?>" required></div><div class="col-md-6"><label class="form-label">Akreditasi</label><input type="text" class="form-control" name="akreditasi" maxlength="1" value="<?php echo htmlspecialchars($prodi['akreditasi'] ?? ''); ?>" required></div></div><div class="form-actions"><button type="submit" class="btn btn-primary">Simpan Perubahan</button><a href="index.php" class="btn btn-light border">Batal</a></div></form></div></div></div></section></main></div></body></html>