<?php
// Konfigurasi koneksi ke database
$db_host = 'localhost'; // Nama host database
$db_user = 'root';      // Username database (default XAMPP adalah 'root')
$db_pass = '';          // Password database (default XAMPP kosong)
$db_name = 'db_materi'; // Nama database yang sudah diimpor

// Membuat koneksi
$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Cek koneksi
if (!$koneksi) {
    // Jika koneksi gagal, hentikan skrip dan tampilkan pesan error
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>