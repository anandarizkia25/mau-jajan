<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents; // Fitur untuk menonaktifkan event model sementara saat seeding

    /**
     * Seed the application's database.
     */
        public function run(): void
    {
        // 1. Buat User Admin Bawaan
        User::create([ // Memasukkan data akun admin baru langsung ke database
            'name' => 'Admin Toko',              // Nama akun admin
            'email' => 'admin1@gmail.com',       // Email yang dipakai buat login admin   
            'password' => bcrypt('password123'), // Password admin yang otomatis dienkripsi (diacak)
        ]);

        // 2. Jalankan Seeder Makanan
        $this->call([
            FoodSeeder::class, // Memanggil file seeder lain khusus untuk mengisi data menu makanan
        ]);
    }
}
