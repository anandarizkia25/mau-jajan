<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Daftar Makanan & Minuman') }}
            </h2>
            <a href="{{ route('foods.create') }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-xs rounded-md shadow-sm transition">
                + Tambah Makanan
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if(session('success'))
                <div class="p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded shadow-sm font-medium">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                <div class="p-6 text-gray-900 overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                            <tr>
                                <th class="p-4 border-b">#</th>
                                <th class="p-4 border-b">Gambar</th>
                                <th class="p-4 border-b">Nama Makanan</th>
                                <th class="p-4 border-b">Kategori</th>
                                <th class="p-4 border-b">Harga</th>
                                <th class="p-4 border-b">Deskripsi</th>
                                <th class="p-4 border-b text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y text-sm">
                            @forelse($foods as $food)
                                <tr class="hover:bg-gray-50">
                                    <td class="p-4 font-bold text-gray-600 align-middle">
                                        {{ $loop->iteration + ($foods->currentPage() - 1) * $foods->perPage() }}
                                    </td>
                                    <td class="p-4 align-middle">
                                        @if($food->image)
                                            <img src="{{ asset('storage/' . $food->image) }}" alt="{{ $food->name }}" class="w-14 h-14 object-cover rounded shadow-sm">
                                        @else
                                            <span class="bg-gray-200 text-gray-600 text-xs px-2.5 py-1 rounded font-medium">Tanpa Gambar</span>
                                        @endif
                                    </td>
                                    <td class="p-4 font-semibold text-gray-800 align-middle">{{ $food->name }}</td>
                                    <td class="p-4 align-middle">
                                        <span class="bg-blue-100 text-blue-800 text-xs font-bold px-2.5 py-1 rounded-full">
                                            {{ $food->category }}
                                        </span>
                                    </td>
                                    <td class="p-4 font-bold text-green-600 align-middle">
                                        Rp {{ number_format($food->price, 0, ',', '.') }}
                                    </td>
                                    <td class="p-4 text-gray-600 align-middle">
                                        {{ \Illuminate\Support\Str::limit($food->description, 40) }}
                                    </td>
                                    <td class="p-4 text-center align-middle">
                                        <div class="flex justify-center items-center gap-2">
                                            <a href="{{ route('foods.edit', $food->id) }}" class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white text-xs font-bold rounded transition">
                                                Edit
                                            </a>
                                            
                                            <form action="{{ route('foods.destroy', $food->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-xs font-bold rounded transition">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="p-6 text-center text-gray-500">Belum ada data makanan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-4">
                {{ $foods->links() }}
            </div>

        </div>
    </div>
</x-app-layout>