# 🚀 Aplikasi Manajemen Data Akademik (SIAKAD)

Aplikasi berbasis web untuk mengelola data akademis (Mahasiswa dan Program Studi). Dibuat sebagai proyek penilaian **Uji Kompetensi Keahlian (UJK) - Junior Web Programming**.

---

## 🛠️ Tech Stack & Requirements
- **PHP** 8.x
- **MySQL / MariaDB**
- **Bootstrap 5.3.3** (UI Component & Layouting)
- **Web Server:** XAMPP (Apache & MySQL)

---

## 📌 Fitur Utama
- **Otentikasi Login:** Keamanan akses menggunakan sistem *session*.
- **Manajemen Data Mahasiswa (CRUD):** Tambah, lihat, ubah, dan hapus data mahasiswa.
- **Manajemen Program Studi (CRUD):** Pengelolaan data program studi.
- **Pencarian Real-time:** Fitur filter data cepat di tabel antarmuka.

---

## 🗄️ Panduan Instalasi & Penggunaan

### 1. Database Setup
1. Buka `phpMyAdmin` (`http://localhost/phpmyadmin`).
2. Buat basis data baru dengan nama **`db_materi`**.
3. Impor atau jalankan berkas `db_materi.sql` ke dalam database tersebut.

### 2. Menjalankan Aplikasi
1. Salin folder proyek ini ke dalam folder `htdocs` XAMPP:
   ```text
   C:\xampp\htdocs\manajemen-data-akademik