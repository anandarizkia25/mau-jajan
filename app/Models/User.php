<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// Model User: Menghubungkan aplikasi dengan tabel 'users' di database 
// untuk mengelola data akun pengguna/admin yang bisa login ke sistem.
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable; // Fitur untul factory (data dummy) dan sistem notifikasi

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [ // Kolom-kolom yang boleh diisi secara massal
        'name',             // Nama lengkap pengguna
        'email',            // Alamat email pengguna (untuk login)
        'password',         // Kata sandi akun
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [ // Kolom-kolom rahasia yang disembunyikan saat data user diubah jadi format JSON/Aray
        'password',       // Sembunyikan password demi keamanan
        'remember_token', // Sembunyikan token "ingat saya"
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // Ubah kolom tanggal verifikasi email menjadi objek tanggal (datetime)
            'password' => 'hashed',            // Otomatis mengenkripsi (hashing) password sebelum disimpan ke database
        ];
    }
}
