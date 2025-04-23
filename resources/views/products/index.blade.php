<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Daftar Produk
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 px-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-gray-700">Produk</h1>
            <a href="{{ route('products.create') }}"
               class="bg-[#f3e8d8] hover:bg-[#e9ddcb] text-gray-800 px-4 py-2 rounded-md border border-gray-300 shadow-sm transition">
                + Tambah Produk
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-50 text-green-800 px-4 py-2 rounded border border-green-200 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-[#fdfcf9] shadow-sm rounded-lg overflow-x-auto border border-gray-200">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-[#f8f7f4] text-gray-600">
                    <tr>
                        <th class="px-6 py-3 text-left font-medium">Nama</th>
                        <th class="px-6 py-3 text-left font-medium">Harga</th>
                        <th class="px-6 py-3 text-left font-medium">Bandwidth</th>
                        <th class="px-6 py-3 text-left font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-[#ffffff] divide-y divide-gray-100">
                    @foreach ($products as $product)
                        <tr class="hover:bg-[#f9f7f3] transition">
                            <td class="px-6 py-4 text-gray-800">{{ $product->name }}</td>
                            <td class="px-6 py-4 text-gray-800">Rp{{ number_format($product->price, 2, ',', '.') }}</td>
                            <td class="px-6 py-4 text-gray-800">{{ $product->bandwidth }}</td>
                            <td class="px-6 py-4 space-x-2">
                                <a href="{{ route('products.edit', $product->id_products) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('products.destroy', $product->id_products) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin ingin menghapus?')" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
