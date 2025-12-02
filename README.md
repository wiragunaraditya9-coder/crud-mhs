1. Deskripsi

Aplikasi ini dibuat untuk memenuhi tugas mata kuliah Sistem Informasi.
Fungsinya adalah mengelola data Mahasiswa dengan operasi CRUD:

Create → tambah data mahasiswa

Read → tampilkan daftar mahasiswa

Update → edit data mahasiswa

Delete → hapus data mahasiswa

Setiap mahasiswa memiliki atribut:

Nama

NIM

Prodi

Angkatan

Status (active / inactive)

Foto (upload file gambar)

2. Spesifikasi Teknis

Bahasa: PHP 8.x

Database: MySQL / MariaDB

Driver: PDO

Validasi:

Semua field wajib diisi

NIM & Angkatan harus angka

File upload hanya JPG/PNG, maksimal 2 MB
Struktur folder:
/class
    Database.php
    Utility.php

/uploads
    (file foto mahasiswa disimpan di sini)

mhs.php
create.php
save.php
edit.php
update.php
delete.php
schema.sql
README.md

3. Cara Menjalankan

Import database:

Buka phpMyAdmin

Import file schema.sql

Atur koneksi database di:
/class/Database.php

Jalankan dengan XAMPP:
http://localhost/nama-folder/mhs.php

4. Akses aplikasi di browser:
http://localhost/user-mahasiswa/mhs.php

5. Skenario Uji CRUD
✔ Tambah Mahasiswa

Isi form di create.php, upload foto → simpan → data tampil di daftar.

✔ Tampilkan Mahasiswa

Lihat semua data di mhs.php.

✔ Edit Mahasiswa

Klik Edit, ubah field → simpan → data diperbarui.

✔ Hapus Mahasiswa

Klik Delete, konfirmasi → data terhapus.

6. Catatan

Foto lama tetap dipakai jika tidak diganti saat edit.

Path file foto disimpan di database, file fisik tersimpan di folder /uploads.