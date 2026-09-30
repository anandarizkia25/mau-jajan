<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    // Fungsi edit(): Menampilkan halaman form untuk mengedit profil akun pengguna yang sedang login.
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(), // Ambil data user yang sedang login lalu kirim ke view profil
        ]);
    }

    // Fungsi update(): Menyimpan perubahan data profil (seperti nama atau email) yang dikirim dari form edit.
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated()); // Masukkan data baru yang sudah divalidasi ke data user

        if ($request->user()->isDirty('email')) { // Kalau emailnya diubah/diganti
            $request->user()->email_verified_at = null; // Status verifikasi email di-reset jadi null (belum verifikasi ulang)
        }

        $request->user()->save(); // Simpan perubahan datanya ke database

        return Redirect::route('profile.edit')->with('status', 'profile-updated'); // Balik ke halaman edit profil sambil bawa status berhasil
    }

    // Fungsi destroy(): Menghapus akun pengguna secara permanen setelah verifikasi password
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [ // Validasi password dulu untul memastikan yang hapus akun benar-benar pemiliknya
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user(); // Ambil data user yang mau dihapus

        Auth::logout(); // Keluarkan (logout) user dari sistes

        $user->delete(); // Hapus akun user dari database secara permanen

        $request->session()->invalidate(); // Hapus sesi yang aktif demi keamanan
        $request->session()->regenerateToken(); // Buat token CSRF baru

        return Redirect::to('/'); //Lempar user kembali ke halaman utama (welclome page)
    } 
}
