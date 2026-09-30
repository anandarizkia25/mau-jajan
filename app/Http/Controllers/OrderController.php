<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    // Fungsi index(): Menampilkan halaman menu/katalog utama untuk pelanggan.
    public function index()
    {
        $foods = Food::all(); // Ambil semua data makanan dari database
        return view('customer.index', compact('foods')); // Tampilkan halaman katalog ke pelanggan
    }

    // Fungsi store(): Memproses pesanan/checkout yang dikirim oleh pelanggan.
    public function store(Request $request)
    {
        // 1. Validasi data pemesan dan item yang dipilih
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',   // Nama pesanan wajib diisi
            'table_number'  => 'required|string|max:20',    // Nomor meja wajib diisi
            'items'         => 'required|array',            // Daftar item harus berupa array
            'items.*'       => 'nullable|integer|min:0',    // Jumlah tiap item harus angka minimal 0
        ]);

        // Saring item, ambil yang jumlah pesanannya lebih dari 0 saja
        $orderedItems = array_filter($validated['items'], fn($quantity) => $quantity > 0);

        //  Kalau tidak ada satupun menu yang dipilih, tolak dan kembalikan pesan error
        if (empty($orderedItems)) {
            return back()->with('error', 'Pilih minimal satu menu makanan!');
        }

        // 3. Gunakan DB Transaction agar transaksi aman
        DB::beginTransaction();
        try {
            // Buat data pesanan utama (Header Order) dengan status awal 'Pending'
            $order = Order::create([
                'customer_name' => $validated['customer_name'],
                'table_number'  => $validated['table_number'],
                'total_price'   => 0, // Total harga di-nolkan dulu
                'status'        => 'Pending',
            ]);

            $totalPrice = 0; // Siapkan variabel untuk menghitung total harga keseluruhan

            // Simpan detail setiap makanan yang dipesan sekaligus hitung harganya
            foreach ($orderedItems as $foodId => $quantity) {
                $food = Food::findOrFail($foodId); // Cari data makanan berdasarkan ID
                $subtotal = $food->price * $quantity; // Hitung subtotal (harga x jumlah)
                $totalPrice += $subtotal; // Tambahkan ke total harga keseluruhan

                // Simpan rincian pesanan ke tabel order_details
                OrderDetail::create([
                    'order_id' => $order->id,
                    'food_id'  => $food->id,
                    'quantity' => $quantity,
                    'subtotal' => $subtotal,
                ]);
            }

            // Update total harga yang sebenarnya ke tabel utama pesanan
            $order->update(['total_price' => $totalPrice]);

            DB::commit(); // Simpan permanen ke database karena semua proses lancar

            // Redirect langsung ke Dashboard agar pesanan terlihat di daftar pesanan masuk
            return redirect()->route('dashboard')->with('success', 'Pesanan #' . $order->id . ' berhasil dikirim!');

        } catch (\Exception $e) {
            DB::rollBack(); // Kalau ada error di tengah jalan, batalkan semua perubahan data
            return back()->with('error', 'Gagal memproses pesanan: ' . $e->getMessage()); // Tampilkan pesan error
        }
    }

    // Fungsi checkout(): Jalan pintas/alias jika route memanggil method checkout.
    public function checkout(Request $request)
    {
        return $this->store($request); // Lempar tugasnya ke method store di atas
    }

    // Fungsi adminDashboard(): Menampilkan daftar rekap pesanan masuk untuk admin.
    public function adminDashboard()
    {
        $orders = Order::with('orderDetails.food')->latest()->get(); // Ambil data pesanan terbaru beserta detail makanannya
        return view('dashboard', compact('orders')); // Tampilkan ke halaman dashboard admin
    }

    // Fungsi updateStatus(): Mengubah status pesanan (Pending/Diproses/Selesai) oleh Admin.
    public function updateStatus(Request $request, $id)
    {
        // Validasi status baru, harus sesuai pilihan yang diizinkan
        $validated = $request->validate([
            'status' => ['required', Rule::in(['Pending', 'Diproses', 'Selesai'])],
        ]);

        $order = Order::findOrFail($id); // Cari data pesanan berdasarkan ID
        $order->update(['status' => $validated['status']]); // Perbarui status pesanannya

        return back()->with('success', 'Status pesanan #' . $order->id . ' berhasil diperbarui!'); // Kembali dengan pesan sukses
    }
}