<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">Tambah Produk Baru</h2>
    </x-slot>

    <div class="max-w-3xl mx-auto py-10 px-6">
        <form action="{{ route('products.store') }}" method="POST" class="space-y-6 bg-white p-6 rounded-xl border shadow-sm">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
                <input name="name" type="text" value="{{ old('name') }}" class="w-full p-2 border rounded-md" required />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="description" rows="3" class="w-full p-2 border rounded-md">{{ old('description') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
                <input name="price" type="number" step="0.01" value="{{ old('price') }}" class="w-full p-2 border rounded-md" required />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Bandwidth</label>
                <input name="bandwidth" type="text" value="{{ old('bandwidth') }}" class="w-full p-2 border rounded-md" />
            </div>

            <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                <a href="{{ route('products.index') }}" class="bg-gray-200 text-gray-700 px-5 py-2 rounded hover:bg-gray-300">Batal</a>
                <button type="submit"
                    class="bg-[#f3e8d8] hover:bg-[#e9ddcb] text-gray-800 px-6 py-2 rounded-md shadow-sm border border-gray-300 transition">
                    ➕ Simpan Produk
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
