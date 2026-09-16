# Manajemen Data Akademik (SIAKAD Sederhana)

Aplikasi web sederhana untuk pengelolaan data akademik kampus, dibangun menggunakan **PHP Native**. Aplikasi ini memiliki fitur CRUD (Create, Read, Update, Delete) untuk data mahasiswa dan program studi.

## 📸 Tampilan Aplikasi
<img width="1366" height="653" alt="image" src="https://github.com/user-attachments/assets/49474c97-0564-48f0-b689-5f4aba09b8bb" />
<img width="1366" height="653" alt="image" src="https://github.com/user-attachments/assets/c790ca5f-caaa-4c2c-ba97-2c2ec1e7f890" />


## 🛠️ Teknologi yang Digunakan

- **Bahasa:** PHP (Native / Tanpa Framework)
- **Database:** MySQL
- **Server:** Apache (via Laragon/XAMPP)
- **Frontend:** HTML, CSS (Bootstrap)

## 📂 Struktur File

- `index.php` - Halaman utama (Dashboard)
- `koneksi.php` - Konfigurasi koneksi ke database
- `tambah.php` / `edit.php` / `hapus.php` - Fitur CRUD Mahasiswa
- `tambah_prodi.php` / `edit_prodi.php` / `hapus_prodi.php` - Fitur CRUD Program Studi
- `db_materi.sql` - File database (Import file ini ke PHPMyAdmin)

## 🚀 Cara Instalasi & Menjalankan

1.  **Clone atau Download** repository ini.
2.  Pastikan kamu memiliki web server lokal (seperti **Laragon** atau **XAMPP**).
3.  **Import Database:**
    - Buka PHPMyAdmin.
    - Buat database baru (misalnya: `materi`).
    - Import file `db_materi.sql` yang ada di dalam folder project ini.
4.  **Konfigurasi Koneksi:**
    - Buka file `koneksi.php`.
    - Sesuaikan nama database, username, dan password jika berbeda dengan settingan lokal kamu.
5.  Buka browser dan akses `localhost/data` (atau sesuaikan dengan nama folder kamu).

---

Dibuat oleh:
            Nama    : **[Junianto Chandra Kusuma ]**
            NIM     : **[B22042 ]**
            Kelas   : ** [TRPL B]**
        
