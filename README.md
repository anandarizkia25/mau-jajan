# 🍔 Mau Jajan

**Mau Jajan** adalah aplikasi e-commerce/pesan-antar berbasis web yang dibangun menggunakan framework **Laravel**. Aplikasi ini dirancang untuk memudahkan pengguna dalam memesan berbagai macam jajanan secara online, lengkap dengan panel manajemen untuk admin.

---

## ✨ Fitur & Dokumentasi CRUD

Aplikasi ini dibagi menjadi dua hak akses utama, yaitu **Pelanggan (User)** dan **Admin**. Berikut adalah detail fitur CRUD (Create, Read, Update, Delete) yang tersedia:

### 1. 👤 Pelanggan (User)
- **Autentikasi:** Register akun baru, Login, dan Logout.
- **Katalog Jajanan (Read):** Melihat daftar menu jajanan berdasarkan kategori lengkap dengan harga, gambar, dan deskripsi produk.
- **Pencarian & Filter (Read):** Mencari jajanan favorit dengan cepat.
- **Keranjang Belanja (Create, Read, Update, Delete):**
  - **Create:** Menambahkan menu jajanan ke keranjang.
  - **Read:** Melihat daftar item yang ada di keranjang.
  - **Update:** Mengubah jumlah (quantity) pesanan.
  - **Delete:** Menghapus item dari keranjang.
- **Checkout & Riwayat Pesanan (Create & Read):** Membuat pesanan baru dan memantau status pesanan (Pending, Diproses, Selesai).

### 2. 🛠️ Admin Panel
- **Manajemen Produk / Jajanan (CRUD Lengkap):**
  - **Create:** Menambahkan menu jajanan baru (nama, harga, stok, gambar, kategori).
  - **Read:** Melihat daftar seluruh menu makanan.
  - **Update:** Mengedit informasi atau harga menu jajanan.
  - **Delete:** Menghapus menu jajanan dari sistem.
- **Manajemen Kategori (CRUD Lengkap):** Mengelola kategori makanan (misal: Minuman, Makanan Berat, Snack).
- **Manajemen Pesanan (Update & Read):** Melihat daftar pesanan masuk dari pelanggan dan memperbarui status pesanan (misalnya mengubah dari "Pending" ke "Diproses").

---

## 🛠️ Teknologi yang Digunakan
- **Backend:** [Laravel](https://laravel.com/) (PHP Framework)
- **Database:** MySQL
- **Frontend:** Blade Templating, Bootstrap / Tailwind CSS
- **Package Manager:** Composer & NPM

---

## ⚙️ Cara Instalasi & Menjalankan Project

Ikuti langkah-langkah di bawah ini untuk menjalankan project ini di komputer lokal:

### 1. Clone Repository
Buka terminal atau command prompt, lalu jalankan perintah berikut:
```bash
git clone [https://github.com/anandarizkia25/mau-jajan.git](https://github.com/anandarizkia25/mau-jajan.git)
cd mau-jajan

2. Install Dependensi PHP (Composer)
Bash
composer install
