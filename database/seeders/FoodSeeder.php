<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Tambahkan ini

class FoodSeeder extends Seeder
{
    use WithoutModelEvents; // Fitur untuk menonaktifkan evemt model sementara saat seeding
    // Fungsi run(): Mengisi tabel 'foods' dengan data dummy/bawaan awal 
    // (berupa menu makanan, minuman, dan cemilan) ke dalam database.
    public function run(): void
    {
        DB::table('foods')->insert([ // Masukkan daftar data menu berikut secara sekaligus ke tabel 'foods'
            [
                'name' => 'Nasi Goreng Spesial',        // Nama menu makanan
                'category' => 'Makanan',                // Kategori menu
                'price' => 25000,                       // Harga menu
                'description' => 'Nasi goreng dengan telur, ayam suwir, dan kerupuk.', // Deskripsi singkat
                'image' => null,                        // Foto di kosongkan dulu (belum ada)
                'created_at' => now(),                  // Waktu data dibuat sekarang
                'updated_at' => now(),                  // Waktu data diperbarui sekarang
            ],
            [
                'name' => 'Es Teh Manis',               // Nama menu minuman
                'category' => 'Minuman',                // Kategori menu
                'price' => 5000,                        // Harga menu
                'description' => 'Es teh melati segar.',// Deskripsi singkat
                'image' => null,                        // Foto di kosongkan dulu (belum ada)
                'created_at' => now(),                  // Waktu data dibuat sekarang
                'updated_at' => now(),                  // Waktu data diperbarui sekarang
            ],
            [   
                'name' => 'Jus Alpukat',                // Nama menu minuman   
                'category' => 'Minuman',                // Kategori menu
                'price' => 15000,                       // Harga menu
                'description' => 'Jus alpukat dengan tambahan susu kental manis.', // Deskripsi singkat
                'image' => null,                        // Foto di kosongkan dulu (belum ada)
                'created_at' => now(),                  // Waktu data dibuat sekarang
                'updated_at' => now(),                  // Waktu data diperbarui sekarang
            ],
            [
                'name' => 'Kentang Goreng',             // Nama menu cemilan
                'category' => 'Cemilan',                // Kategori menu
                'price' => 12000,                       // Harga menu
                'description' => 'Kentang goreng renyah dengan saus sambal.', // Deskripsi singkat
                'image' => null,                        // Foto di kosongkan dulu (belum ada)
                'created_at' => now(),                  // Waktu data dibuat sekarang
                'updated_at' => now(),                  // Waktu data diperbarui sekarang
            ],
            [
                'name' => 'Ayam Bakar Taliawang',       // Nama menu makanan
                'category' => 'Makanan',                // Kategori menu
                'price' => 30000,                       // Harga menu
                'description' => 'Ayam bakar khas Lombok dengan bumbu pedas.', // Deskripsi singkat
                'image' => null,                        // Foto di kosongkan dulu (belum ada)
                'created_at' => now(),                  // Waktu data dibuat sekarang
                'updated_at' => now(),                  // Waktu data diperbarui sekarang
            ],
        ]);
    }
}
