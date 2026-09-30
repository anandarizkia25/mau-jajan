<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Model Food: Menghubungkan aplikasi dengan tabel 'foods' di database 
// untuk mengelola data makanan, minuman, dan cemilan.
class Food extends Model
{
    use HasFactory; // Fitur untuk membuat data dummy/palsu (biasanya dipakai saat testing)

    protected $table = 'foods'; // Menentukan secara eksplisit bahwa model ini memakai tabel bernama 'foods'
    protected $guarded = ['id']; // Melindungi kolom 'id' agar tidak bisa diisi secara sembarangan, sisanya boleh diisi massal
}
