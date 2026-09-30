<div align="center">

# 🍔 Mau Jajan
### Sistem Pemesanan Makanan & Manajemen Restoran

[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com/)
[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)

</div>

---

Aplikasi web **pemesanan makanan dan manajemen restoran berbasis Laravel** yang dibuat untuk memudahkan pelanggan dalam melihat menu, melakukan pemesanan, dan menghitung total pembayaran secara otomatis.

Aplikasi ini juga dilengkapi dengan **panel admin/kasir** untuk mengelola data menu serta memantau dan memperbarui status pesanan yang masuk.

> 📌 Proyek ini disusun untuk memenuhi kriteria **Uji Kompetensi Keahlian (UKK)** skema **Junior Web Programmer**.

---

## ✨ Fitur & Dokumentasi CRUD

Aplikasi ini memiliki dua hak akses utama (Role), yaitu **Pelanggan (User)** dan **Admin**. Berikut adalah rincian fitur dan operasi CRUD (Create, Read, Update, Delete) yang tersedia:

### 1. 👤 Sisi Pelanggan (User)
- **Autentikasi:** Register akun baru, Login, dan Logout yang aman.
- **Katalog Jajanan (Read):** Menampilkan daftar menu makanan/jajanan lengkap dengan kategori, harga, gambar, dan deskripsi produk.
- **Pencarian & Filter (Read):** Memudahkan pengguna mencari menu jajanan favorit.
- **Keranjang Belanja (Cart) (CRUD Lengkap):**
  - **Create:** Menambahkan menu jajanan yang dipilih ke dalam keranjang.
  - **Read:** Melihat daftar item yang ada di dalam keranjang belanja.
  - **Update:** Mengubah jumlah (quantity) atau catatan pesanan.
  - **Delete:** Menghapus item tertentu dari keranjang.
- **Checkout & Riwayat Pesanan (Create & Read):** Melakukan proses pemesanan dan memantau status pesanan secara real-time (Pending, Diproses, Selesai).

### 2. 🛠️ Sisi Admin Panel
- **Manajemen Produk / Jajanan (CRUD Lengkap):**
  - **Create:** Menambahkan menu jajanan baru (input nama, harga, stok, gambar, dan kategori).
  - **Read:** Melihat daftar seluruh menu makanan yang tersedia.
  - **Update:** Mengedit informasi, harga, atau stok menu jajanan.
  - **Delete:** Menghapus menu jajanan yang sudah tidak dijual dari sistem.
- **Manajemen Kategori (CRUD Lengkap):** Mengelola kategori makanan (misal: Minuman, Makanan Berat, Snack).
- **Manajemen Pesanan (Read & Update):** Melihat daftar pesanan masuk dari pelanggan dan memperbarui status pesanan (misal: mengubah status dari "Pending" menjadi "Diproses" atau "Selesai").

---

## 🛠️ Teknologi yang Digunakan
- **Backend Framework:** Laravel (PHP)
- **Database:** MySQL
- **Frontend Templating:** Blade, Bootstrap / Tailwind CSS
- **Package Manager:** Composer & NPM

---

## ⚙️ Cara Instalasi & Menjalankan Project (Lokal)

Ikuti langkah-langkah di bawah ini secara berurutan untuk menjalankan project ini di komputer lokal:

1. **Clone Repository**
   Buka terminal atau command prompt, lalu jalankan:
   `git clone https://github.com/anandarizkia25/mau-jajan.git`
   `cd mau-jajan`

2. **Install Dependensi PHP (Composer)**
   Jalankan perintah: `composer install`

3. **Install Dependensi JavaScript (NPM)**
   Jalankan perintah: `npm install` lalu `npm run dev`

4. **Konfigurasi Environment (.env)**
   Salin file `.env.example` menjadi `.env`:
   - Windows (CMD): `copy .env.example .env`
   - Linux/Mac/Git Bash: `cp .env.example .env`
   Lalu generate key dengan: `php artisan key:generate`

5. **Konfigurasi Database**
   Buka file `.env` menggunakan text editor, lalu sesuaikan database:
   - `DB_DATABASE=mau_jajan`
   - `DB_USERNAME=root`
   - `DB_PASSWORD=`

6. **Jalankan Migrasi & Seeder Database**
   Jalankan perintah: `php artisan migrate --seed`

7. **Jalankan Server Lokal**
   Jalankan perintah: `php artisan serve`
   Buka link `http://127.0.0.1:8000` di browser.

---

## 👨‍‍💻 Kontributor
- **Ananda Rizkia Wulandari** - *Creator & Developer* - [@anandarizkia25](https://github.com/anandarizkia25)

---

## 📄 Lisensi
Project ini bersifat open-source di bawah lisensi MIT. Silakan gunakan untuk keperluan pembelajaran atau pengembangan lebih lanjut.
