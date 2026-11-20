# Kasus 03 — Pencarian dan Filter Buku

**Level:** Menengah–Lanjut  
**Fokus:** Request, query string, Eloquent, where, orWhere, LIKE, filter kategori, Blade.

## Tujuan
Mahasiswa memperbaiki pencarian buku berdasarkan judul/penulis dan filter kategori.

## Instalasi
Buat proyek Laravel baru dan salin isi folder kasus ini ke proyek.
Buat database `bug_battle_case_03`, sesuaikan `.env`, lalu jalankan:
```bash
php artisan optimize:clear
php artisan migrate
php artisan db:seed
php artisan serve
```
Buka `http://127.0.0.1:8000/books`.

## Gejala yang harus diselidiki
1. Kata kunci dari form tidak terbaca oleh Controller.
2. Pencarian hanya menemukan kecocokan persis.
3. Filter kategori tidak bekerja.
4. Variabel hasil pencarian tidak tersedia di Blade.
5. Input pencarian tidak dipertahankan setelah submit.

## Tugas
- Samakan nama parameter form dan Controller.
- Gunakan pencarian parsial dengan LIKE.
- Gabungkan kondisi judul dan penulis secara benar.
- Terapkan filter kategori jika dipilih.
- Kirim hasil dan nilai filter ke View.
- Tampilkan pesan ketika hasil kosong.
