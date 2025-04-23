<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Edit Produk
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto py-8 px-4">
        <form action="{{ route('products.update', $product->id_products) }}" method="POST" class="space-y-6 bg-[#fdfcf9] p-6 rounded-lg shadow border border-gray-200">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Produk</label>
                <input type="text" name="name" value="{{ $product->name }}"
                    required class="mt-1 w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-amber-400 focus:border-amber-400 bg-white" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="description" rows="3"
                    class="mt-1 w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-amber-400 focus:border-amber-400 bg-white">{{ $product->description }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="number" name="price" step="0.01" value="{{ $product->price }}"
                    required class="mt-1 w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-amber-400 focus:border-amber-400 bg-white" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Bandwidth</label>
                <input type="text" name="bandwidth" value="{{ $product->bandwidth }}"
                    class="mt-1 w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-amber-400 focus:border-amber-400 bg-white" />
            </div>

            <div class="flex justify-end pt-4 border-t border-gray-200">
                <button type="submit"
                    class="bg-[#f3e8d8] hover:bg-[#e9ddcb] text-gray-800 px-6 py-2 rounded-md border border-gray-300 shadow-sm transition">
                    💾 Update Produk
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
