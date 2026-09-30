# 🍽️ Mau Jajan - Sistem Pemesanan Restoran Berbasis Laravel

Aplikasi pemesanan makanan untuk restoran / kantin berbasis web. Customer bisa pilih menu, input nama & no meja, dan pesanan langsung masuk ke sistem kasir dengan konsep Header-Detail.

Repository: https://github.com/anandarizkia25/mau-jajan

### Tech Stack
- Laravel 10 / 11
- PHP 8.2
- MySQL / MariaDB (XAMPP)
- Blade + Tailwind / Bootstrap
- Eloquent ORM

### Fitur Utama
- CRUD Menu Makanan (`foods` table)
- Keranjang & Checkout Customer
- Validasi Form Checkout
- Relasi Database Header & Detail (orders & order_details)
- Database Transaction (DB::beginTransaction) untuk keamanan pesanan
- Dashboard Admin untuk melihat pesanan masuk

### Struktur Database
1.  **foods**: id, name, price, stock, image
2.  **orders (Header)**: id, customer_name, table_number, total_price, status
3.  **order_details (Detail)**: id, order_id (FK), food_id (FK), quantity, price

**Relasi:**
- `Order` -> `hasMany(OrderDetail::class)`
- `OrderDetail` -> `belongsTo(Order::class)`

### Cara Install di Lokal

1. Clone repo
```bash
git clone https://github.com/anandarizkia25/mau-jajan.git
cd mau-jajan
