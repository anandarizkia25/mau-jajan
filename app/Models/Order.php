<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Model Order: Menghubungkan aplikasi dengan tabel pesanan utama (orders) 
// untuk mengelola data pemesan, nomor meja, total harga, dan status pesanan.
class Order extends Model
{
    use HasFactory; // Fitur untuk membuat data dummy/palsu (biasanya buat testing)

    protected $fillable = [ // Kolom-kolom yang diizinkan untuk diisi secara massal (mass assignment)
        'customer_name',    // Nama pelanggan yang memesan
        'table_number',     // Nomor meja pelanggan
        'total_price',      // Total harga keseluruhan pesanan
        'status',           // Status pesanan (misal: Pending, Diproses, Selesai)
    ];

    // Relasi orderDetails(): Menghubungkan satu pesanan (Order) 
    // ke banyak detail pesanan (OrderDetail) karena satu struk bisa pesan banyak menu.
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class); // Menghubungkan ke model OrderDetail
    }
}