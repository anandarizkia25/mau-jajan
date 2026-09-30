<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    // Fungsi index(): Menampilkan daftar semua data makanan di halaman admin
    // (dilengkapi fitur paginasi 10 data per halaman).
    public function index()
    {
        $foods = Food::latest()->paginate(10); // Mengambil data makanan baru, dibatasi 10 biji per halaman
        return view('admin.foods.index', compact('foods')); // Tampilkan ke halaman tabel admin
    }

    // Fungsi create(): Membuka halaman formulir/form 
    // untuk memasukkan data makanan yang baru.
    public function create()
    {
        return view('admin.foods.create'); // Tampilkan halaman form buat nambah makanan baru
    }

    // Fungsi store(): Menerima data dari form tambah, memvalidasinya, 
    // lalu menyimpan data makanan baru (beserta fotonya jika ada) ke database.
    public function store(Request $request)
    {
        $request->validate([ // Cek dulu, inputan dari form udah bener belum?
            'name'        => 'required|string|max:255',
            'category'    => 'required|in:Makanan,Minuman,Cemilan',
            'price'       => 'required|integer|min:0',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null; // Siapin variabel buat nyimpen lokasi gambar
        if ($request->hasFile('image')) { // Kalau user upload gambar    
            $imagePath = $request->file('image')->store('foods', 'public'); // Gambar tersimpan ke folder public/foods
        }

        Food::create([ // Masukin semua data ke database
            'name'        => $request->name,
            'category'    => $request->category,
            'price'       => $request->price,
            'description' => $request->description,
            'image'       => $imagePath,
        ]);

        return redirect()->route('foods.index')->with('success', 'Data makanan berhasil ditambahkan!'); // Kembali ke halaman utama sambil bawa pesan sukses
    }

    // Fungsi edit(): Menampilkan halaman form edit 
    // dengan membawa data makanan yang dipilih untuk diubah.
    public function edit(Food $food)
    {
        return view('admin.foods.edit', compact('food')); // Tampilkan form edit dengan data makanan yang mau diubah
    }

    // Fungsi update(): Memproses perubahan data makanan yang diedit, 
    // mengganti foto lama dengan foto baru jika ada, lalu menyimpannya ke database.
    public function update(Request $request, Food $food)
    {
        $request->validate([ // Validasi lagi inputan dari form edit
            'name'        => 'required|string|max:255',
            'category'    => 'required|in:Makanan,Minuman,Cemilan',
            'price'       => 'required|numeric|min:0',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $food->image; // Pake foto yang lama dulu sebagai default

        if ($request->hasFile('image')) { // Kalau user upload foto baru...
            if ($food->image && Storage::disk('public')->exists($food->image)) { // Cek apakah foto lama beneran ada
                Storage::disk('public')->delete($food->image); // Kalau ada, hapus foto lama biar ga menuh-menuhin server
            }
            $imagePath = $request->file('image')->store('foods', 'public'); // Simpan foto yang baru
        }

        $food->update([ // Update data yang ada di database
            'name'        => $request->name,
            'category'    => $request->category,
            'price'       => $request->price,
            'description' => $request->description,
            'image'       => $imagePath,
        ]);

        return redirect()->route('foods.index')->with('success', 'Data makanan berhasil diperbarui!'); // Balik ke halaman utama dengan pesan sukses
    }

    // Fungsi destroy(): Menghapus data makanan tertentu dari database 
    // sekaligus menghapus file foto terkait dari penyimpanan server.
    public function destroy(Food $food)
    {
        if ($food->image && Storage::disk('public')->exists($food->image)) { // Cek apakah makanan ini punya file foto
            Storage::disk('public')->delete($food->image); // Kalau punya, hapus fotonya dari folder
        }

        $food->delete(); // Hapus data makanan dari database

        return redirect()->route('foods.index')->with('success', 'Data makanan berhasil dihapus!'); // Balik ke halaman utama dengan pesan sukses
    }
}