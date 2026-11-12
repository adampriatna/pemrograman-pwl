Laravel 12 REST API – Manajemen Buku

1. Deskripsi Proyek
Proyek ini merupakan aplikasi REST API Manajemen Buku yang dibangun menggunakan Laravel 12. Aplikasi ini digunakan untuk mengelola data buku melalui layanan API, mulai dari menambahkan, melihat, mengubah, hingga menghapus data buku.
Aplikasi juga dilengkapi dengan sistem autentikasi pengguna menggunakan Laravel Sanctum. Setiap pengguna dapat melakukan registrasi, login, melihat profil, dan logout menggunakan token autentikasi.
Dokumentasi dan pengujian API tersedia melalui Swagger UI sehingga setiap endpoint dapat dicoba secara langsung melalui browser.

2. Tujuan Proyek
Tujuan pembuatan aplikasi ini adalah:
- Membangun REST API menggunakan Laravel 12.
- Menerapkan autentikasi menggunakan Laravel Sanctum.
- Mengimplementasikan operasi CRUD (Create, Read, Update, Delete) pada data buku.
- Menggunakan validasi data pada setiap proses permintaan API.
- Membuat dokumentasi API menggunakan OpenAPI dan Swagger.
- Menguji endpoint API melalui Swagger UI.

3. Teknologi yang Digunakan
Teknologi| Kegunaan
PHP 8.4| Bahasa pemrograman
Laravel 12| Framework backend
Laravel Sanctum| Autentikasi berbasis token
MySQL/SQLite| Database, sesuai konfigurasi ".env"
Composer| Dependency manager PHP
OpenAPI| Standar dokumentasi API
L5-Swagger| Integrasi Swagger dengan Laravel
Swagger UI| Dokumentasi dan pengujian API
Visual Studio Code| Editor kode

4. Fitur Aplikasi
A. Autentikasi Pengguna
1. Register: membuat akun pengguna baru.
2. Login: masuk menggunakan email dan password.
3. Melihat Profil: menampilkan informasi pengguna yang sedang login.
4. Logout: menghapus token aktif pengguna.
5. Hapus Akun: menghapus akun pengguna yang sedang login beserta seluruh token miliknya.

B. Manajemen Buku
1. Menampilkan seluruh data buku.
2. Menambahkan data buku.
3. Melihat detail buku berdasarkan ID.
4. Mengubah data buku.
5. Menghapus data buku.

C. Dokumentasi API
Dokumentasi API menggunakan Swagger UI untuk melihat daftar endpoint, parameter, format permintaan, dan respons API.

5. Struktur Data Buku
Data buku memiliki beberapa atribut berikut:

Field| Keterangan
id| ID buku
title| Judul buku
author| Nama penulis
publisher| Nama penerbit
isbn| Nomor ISBN
published_year| Tahun terbit
stock| Jumlah stok buku
description| Deskripsi buku
created_at| Waktu data dibuat
updated_at| Waktu data diperbarui

6. Instalasi dan Konfigurasi
Persyaratan

Pastikan perangkat sudah memiliki:
- PHP 8.2 atau lebih baru.
- Composer.
- Database MySQL atau SQLite sesuai konfigurasi proyek.
- Git (jika menggunakan repository GitHub).

Langkah Instalasi
1. Clone repository
git clone URL_REPOSITORY

2. Masuk ke folder proyek
cd laravel12-resapi-buku

3. Install dependency
composer install

4. Salin file konfigurasi
Windows PowerShell:
Copy-Item .env.example .env

5. Generate application key
php artisan key:generate

6. Konfigurasi database
Sesuaikan pengaturan database pada file ".env" dengan database yang digunakan.

7. Jalankan migrasi
php artisan migrate
Jika proyek menyediakan seeder dan ingin mengisi data awal:
php artisan db:seed

8. Generate dokumentasi Swagger
php artisan l5-swagger:generate

9. Jalankan server Laravel
php artisan serve

Aplikasi secara default dapat diakses melalui:
http://127.0.0.1:8000

7. Daftar Endpoint API
Semua endpoint menggunakan prefix "/api".

A. Autentikasi
Method| Endpoint| Keterangan| Autentikasi
POST| "/api/register"| Registrasi akun| Tidak
POST| "/api/login"| Login pengguna| Tidak
GET| "/api/me"| Melihat profil pengguna| Ya
POST| "/api/logout"| Logout pengguna| Ya
DELETE| "/api/account"| Menghapus akun sendiri| Ya

B. Manajemen Buku
Method| Endpoint| Keterangan| Autentikasi
GET| "/api/books"| Menampilkan semua buku| Ya
POST| "/api/books"| Menambahkan buku| Ya
GET| "/api/books/{book}"| Melihat detail buku| Ya
PUT/PATCH| "/api/books/{book}"| Mengubah data buku| Ya
DELETE| "/api/books/{book}"| Menghapus buku| Ya

Keterangan:
- Ya berarti endpoint membutuhkan token autentikasi Sanctum.
- "{book}" merupakan ID buku yang ingin diakses.

8. Contoh Penggunaan API
A. Registrasi

Endpoint:
POST /api/register

Contoh JSON:
{
    "name": "Admin Perpustakaan",
    "email": "admin@example.com",
    "password": "password123",
    "password_confirmation": "password123"
}

(BIKIN SAJA YG BARU)

B. Login
Endpoint:
POST /api/login

Contoh JSON:
{
    "email": "admin@example.com",
    "password": "password123",
    "device_name": "Laptop"
}

Login akan menghasilkan token yang digunakan untuk mengakses endpoint yang membutuhkan autentikasi.

C. Menambahkan Buku
Endpoint:
POST /api/books

Contoh JSON:
{
    "title": "Belajar Laravel 12",
    "author": "Admin",
    "publisher": "Penerbit Buku",
    "isbn": "9786020000001",
    "published_year": 2025,
    "stock": 10,
    "description": "Buku pembelajaran Laravel."
}

D. Mengubah Buku
Endpoint:
PUT /api/books/{book}

Data yang dikirim disesuaikan dengan field yang ingin diperbarui.

E. Menghapus Buku
Endpoint:
DELETE /api/books/{book}

ID buku disesuaikan dengan data yang akan dihapus.

F. Menghapus Akun
Endpoint:
DELETE /api/account

Endpoint ini digunakan oleh pengguna yang sudah login untuk menghapus akun miliknya sendiri. Seluruh token pengguna juga dihapus sehingga akun tidak dapat digunakan kembali untuk login.

9. Autentikasi Menggunakan Sanctum
Aplikasi menggunakan Laravel Sanctum untuk mengamankan endpoint API.

Cara penggunaannya:
1. Pengguna melakukan login.
2. Sistem menghasilkan token autentikasi.
3. Token dimasukkan melalui tombol Authorize pada Swagger UI.
4. Token digunakan untuk mengakses endpoint yang membutuhkan autentikasi.
5. Jika token tidak valid atau sudah dicabut, sistem mengembalikan respons "401 Unauthorized".

10. Dokumentasi Swagger
Swagger digunakan untuk melihat dan menguji dokumentasi API.

Setelah server berjalan, buka:
http://127.0.0.1:8000/api/documentation

Untuk melihat dokumentasi OpenAPI dalam format JSON:
http://127.0.0.1:8000/docs

Jika dokumentasi perlu diperbarui setelah perubahan kode, jalankan:
php artisan l5-swagger:generate

11. Pengujian API
Pengujian dilakukan melalui Swagger UI dengan tahapan:
1. Menguji registrasi pengguna.
2. Menguji login dan mendapatkan token.
3. Menguji autentikasi melalui Authorize.
4. Menguji endpoint profil pengguna.
5. Menguji penambahan data buku.
6. Menguji daftar dan detail buku.
7. Menguji perubahan data buku.
8. Menguji penghapusan data buku.
9. Menguji logout.
10. Menguji akses endpoint setelah logout.
11. Menguji penghapusan akun pengguna.

Hasil pengujian yang diharapkan:
Kode HTTP| Keterangan
200| Permintaan berhasil
201| Data berhasil dibuat
401| Pengguna belum terautentikasi
404| Data tidak ditemukan
422| Validasi gagal

12. Catatan Keamanan
- Jangan membagikan token autentikasi kepada orang lain.
- Jangan mengunggah file ".env" ke repository publik.
- Gunakan password yang aman.
- Gunakan akun percobaan untuk menguji fitur hapus akun karena penghapusan bersifat permanen.
- Pastikan konfigurasi database sudah benar sebelum menjalankan migrasi.

13. Penutup
Proyek Laravel 12 REST API Manajemen Buku ini dibuat untuk menerapkan konsep pengembangan REST API, autentikasi pengguna, pengelolaan data menggunakan CRUD, validasi permintaan, serta dokumentasi API menggunakan OpenAPI dan Swagger.
Dengan adanya Swagger UI, proses dokumentasi dan pengujian endpoint dapat dilakukan dengan lebih mudah tanpa harus menggunakan aplikasi tambahan.

---

Proyek: Laravel 12 REST API Manajemen Buku
Framework: Laravel 12
Dokumentasi: OpenAPI / Swagger UI