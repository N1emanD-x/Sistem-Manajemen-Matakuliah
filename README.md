# Sistem Manajemen Mata Kuliah

Tugas Pemrograman Web II — IF403 PJJ Informatika Universitas Siber Asia

## Deskripsi
Website sistem manajemen mata kuliah berbasis CodeIgniter 4 dan MySQL yang memiliki fitur CRUD lengkap, validasi form, dan notifikasi sukses/gagal.

## Tools
- PHP & CodeIgniter 4
- MySQL & phpMyAdmin
- Bootstrap 5
- Laragon (Local Server)
- Visual Studio Code

## Fitur
- Tambah data mata kuliah
- Lihat daftar mata kuliah
- Edit data mata kuliah
- Hapus data mata kuliah
- Validasi form (field wajib, angka, batas karakter)
- Notifikasi sukses dan gagal

## Struktur Database
- Tabel `matakuliah` — menyimpan data kode_mk, nama_mk, sks, semester

## Cara Menjalankan
1. Import file `db_matakuliah.sql` di phpMyAdmin
2. Letakkan folder project di `C:\laragon\www\`
3. Jalankan Laragon dan aktifkan Apache & MySQL
4. Buka browser dan akses `http://localhost/sistem-matakuliah/public/index.php/matakuliah`
