# Sistem Login, Register, Ganti Password & Ganti Username (PHP + MySQL)

[![Bahasa Indonesia](https://img.shields.io/badge/BAHASA%20INDONESIA-0969da?style=for-the-badge)](README.md)
[![English](https://img.shields.io/badge/ENGLISH-6e7681?style=for-the-badge)](README.en.md)

Tugas mata kuliah **Pemrograman Berbasis Obyek**.

| | |
|---|---|
| **Nama** | Muhammad Ghazwan Caesaryan |
| **NIM** | 25051204097 |
| **Kelas** | TI 2025 A |

---

## Deskripsi

Aplikasi web sederhana berbasis **PHP** dan **MySQL** (menggunakan `mysqli`) untuk mengelola akun pengguna: mendaftar, masuk, mengganti password, mengganti username, keluar, dan menghapus akun. Data disimpan di database `toko_madura`, tabel `users`.

---

## Soal Tugas

> ### 1. REGISTER
> Perlu dicek apakah sudah ada username yang sama.

> ### 2. GANTI PASSWORD
> Terdapat **3 input**:
> 1. Password lama
> 2. Password baru 1
> 3. Password baru 2
>
> ```
> [password lama anda]
> [masukkan password]
> [masukkan password]
> (ganti)
> ```

> ### 3. GANTI USERNAME
> Username sama? Maka digantikan.
>
> ```
> rifqia
>
> [rifqib] (cek) (ganti)
> Silahkan Cek Username terlebih dahulu
> ```

### Implementasi tiap soal

| Soal | File | Cara kerja |
|---|---|---|
| **1. Register** | `register.php` | Sebelum `INSERT`, program menjalankan `SELECT` untuk mencari username yang sama. Jika sudah ada, tampil **"Username sudah digunakan!"** dan akun tidak dibuat. Jika belum ada, akun disimpan dan tampil **"Pendaftaran berhasil!"**. |
| **2. Ganti Password** | `ganti.php` | Form memiliki 3 input: password lama, password baru, dan konfirmasi password baru. Password lama dicocokkan dengan data di database (jika salah: **"Password lama salah!"**). Kedua input password baru harus sama (jika beda: **"Konfirmasi password tidak sesuai!"**). Jika semua benar, password diperbarui dan pengguna kembali ke dashboard. |
| **3. Ganti Username** | `gantinama.php` | Tombol **Cek** memeriksa apakah username baru sudah dipakai (**"Nama sudah digunakan!"**) atau masih tersedia (**"Nama tersedia!..."**). Tombol **Ganti** hanya berhasil jika username sudah dicek terlebih dahulu; jika belum, tampil **"Silahkan cek ketersediaan nama terlebih dahulu!"**. Saat mengganti, username dicek sekali lagi sebelum `UPDATE`. |

---

## Struktur File

```
tugas_pbo/
├── database.php     # koneksi ke database MySQL
├── register.php     # halaman pendaftaran (soal 1)
├── login.php        # halaman login
├── dashboard.php    # halaman utama setelah login (logout, hapus akun, menu ganti)
├── ganti.php        # halaman ganti password (soal 2)
├── gantinama.php    # halaman ganti username (soal 3)
└── toko_madura.sql  # file database (tabel users dan produk)
```

---

## Prasyarat

- **WampServer** atau **XAMPP** (sudah termasuk Apache, MySQL, dan PHP)
- Browser (Chrome, Firefox, Edge, dll.)

---

## Panduan Menjalankan

### Langkah 1 — Nyalakan server

**WampServer**
1. Buka aplikasi **WampServer**.
2. Tunggu ikon WAMP di *system tray* (pojok kanan bawah) berubah menjadi **hijau**. Artinya Apache dan MySQL sudah berjalan.

**XAMPP**
1. Buka **XAMPP Control Panel**.
2. Klik **Start** pada modul **Apache** dan **MySQL**. Keduanya akan berwarna hijau jika berhasil.

### Langkah 2 — Siapkan database

1. Buka browser dan akses **http://localhost/phpmyadmin**.
   - Login dengan username `root` dan password kosong (bawaan WAMP dan XAMPP).
2. Klik **New / Baru** di panel kiri untuk membuat database baru.
3. Isi nama database: **`toko_madura`**, pilih collation **`utf8mb4_unicode_ci`**, lalu klik **Create / Buat**.
4. Pilih database `toko_madura`, buka tab **Import**.
5. Klik **Choose File / Pilih File**, pilih **`toko_madura.sql`**, lalu klik **Import** di bagian bawah.
6. Jika berhasil, di database `toko_madura` akan muncul dua tabel: **`users`** dan **`produk`**.

> Nama database harus persis `toko_madura` karena sudah ditulis di `database.php`.

### Langkah 3 — Buat folder proyek

Buat folder baru di dalam direktori web server. Pada panduan ini nama foldernya adalah `tugas_pbo` (boleh diganti sesuai keinginan).

**WampServer**

```
C:\wamp64\www\tugas_pbo
```

**XAMPP**

```
C:\xampp\htdocs\tugas_pbo
```

> Perbedaannya hanya pada lokasi: WAMP memakai folder **`www`**, sedangkan XAMPP memakai folder **`htdocs`**.

### Langkah 4 — Letakkan kode program

Salin file berikut ke dalam folder `tugas_pbo` yang sudah dibuat:

- `database.php`
- `register.php`
- `login.php`
- `dashboard.php`
- `ganti.php`
- `gantinama.php`

(File `toko_madura.sql` hanya dipakai untuk import database, tidak wajib dimasukkan ke folder web server.)

### Langkah 5 — Jalankan di browser

Buka browser lalu akses:

| Halaman | Alamat |
|---|---|
| Register | `http://localhost/tugas_pbo/register.php` |
| Login | `http://localhost/tugas_pbo/login.php` |

> Jika Apache kamu berjalan di port selain 80 (misalnya 8080), tambahkan port-nya, contoh: `http://localhost:8080/tugas_pbo/login.php`.

---

## Akun Percobaan

Data awal pada `toko_madura.sql` sudah berisi dua akun:

| Username | Password |
|---|---|
| `Caesaryan` | `123` |
| `Caesario` | `333` |

Kamu juga bisa membuat akun baru lewat halaman Register.

---

## Cara Menguji Tiap Soal

### 1. Register
1. Buka `register.php`.
2. Daftar dengan username yang **sudah ada** (misal `Caesaryan`) → muncul **"Username sudah digunakan!"**.
3. Daftar dengan username **baru** → muncul **"Pendaftaran berhasil!"**.

### 2. Ganti Password
1. Login, lalu klik **Ganti Password** di dashboard.
2. Isi password lama yang **salah** → muncul **"Password lama salah!"**.
3. Isi password lama benar, tetapi password baru dan konfirmasinya **berbeda** → muncul **"Konfirmasi password tidak sesuai!"**.
4. Isi password lama benar, password baru dan konfirmasinya **sama**, lalu klik **Ganti Password** → password berubah dan kembali ke dashboard.

### 3. Ganti Username
1. Login, lalu klik **Ganti Nama** di dashboard.
2. Ketik username baru lalu langsung klik **Ganti** (tanpa Cek) → muncul **"Silahkan cek ketersediaan nama terlebih dahulu!"**.
3. Ketik username yang **sudah dipakai** lalu klik **Cek** → muncul **"Nama sudah digunakan!"**.
4. Ketik username yang **masih tersedia** lalu klik **Cek** → muncul **"Nama tersedia!"**. Setelah itu klik **Ganti** → username berubah dan kembali ke dashboard.

---

## Pemecahan Masalah

| Masalah | Penyebab dan solusi |
|---|---|
| Muncul tulisan **"Gagal tersambung"** | MySQL belum menyala, atau database `toko_madura` belum dibuat/di-import. Pastikan MySQL sudah *Start* dan ulangi Langkah 2. |
| Halaman **404 / Not Found** | Folder atau nama file salah. Pastikan folder ada di `www` (WAMP) atau `htdocs` (XAMPP) dan alamat di browser sesuai nama folder. |
| Halaman tidak bisa dibuka sama sekali | Apache belum menyala atau port bentrok. Pastikan Apache sudah *Start*, dan coba tambahkan port pada alamat (misal `:8080`). |
| Tabel `users` tidak ditemukan | File `toko_madura.sql` belum di-import ke database `toko_madura`. |
| Koneksi database ditolak | Cek isi `database.php`. Bawaan: host `localhost`, user `root`, password kosong. Sesuaikan jika MySQL kamu memakai password. |

---

## Teknologi

- PHP 8 (`mysqli`, `session`)
- MySQL / MariaDB
- HTML
- WampServer / XAMPP, phpMyAdmin

---

## Catatan

Proyek ini dibuat untuk keperluan pembelajaran. Password pada database disimpan apa adanya (tanpa *hash*) dan query ditulis langsung tanpa *prepared statement*, sehingga belum disarankan untuk dipakai di lingkungan produksi.
