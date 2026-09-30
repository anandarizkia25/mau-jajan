<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Model OrderDetail: Menghubungkan aplikasi dengan tabel rincian pesanan (order_details) 
// untuk mencatat menu apa saja, jumlah, dan subtotal dari setiap pesanan.
class OrderDetail extends Model
{
    use HasFactory; // Fitur untuk membuat data dummy/palsu (biasanya buat testing)

    protected $guarded = ['id']; // Melindungi kolom 'id' agar aman, sisanya boleh diisi massal

    // Relasi food(): Menghubungkan detail pesanan kembali ke data makanan (Food) 
    // untuk mengetahui detail menu yang dipesan.
    public function food()
    {
        return $this->belongsTo(Food::class, 'food_id'); // Mengambil data makanan berdasarkan kolom 'food_id'
    }

    // Relasi order(): Menghubungkan detail pesanan kembali ke data utama pesanan (Order) 
    // untuk mengetahui pesanan induk dari rincian menu ini.
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id'); // Mengambil data order berdasarkan kolom 'order_id'
    }
}