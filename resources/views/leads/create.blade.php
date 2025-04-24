<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">Tambah Lead Baru</h2>
    </x-slot>

    <div class="py-10 max-w-xl mx-auto px-4">
        <form action="{{ route('leads.store') }}" method="POST" class="space-y-6 bg-[#fdfcf9] shadow-sm rounded-xl p-6">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">Nama</label>
                <input name="name" type="text" value="{{ old('name') }}" required
                    class="w-full mt-1 border border-gray-200 p-3 rounded-md bg-white shadow-sm focus:ring-amber-300 focus:border-amber-300" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input name="email" type="email" value="{{ old('email') }}"
                    class="w-full mt-1 border border-gray-200 p-3 rounded-md bg-white shadow-sm focus:ring-amber-300 focus:border-amber-300" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Telepon</label>
                <input name="phone" type="text" value="{{ old('phone') }}"
                    class="w-full mt-1 border border-gray-200 p-3 rounded-md bg-white shadow-sm focus:ring-amber-300 focus:border-amber-300" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Alamat</label>
                <textarea name="address" rows="3"
                    class="w-full mt-1 border border-gray-200 p-3 rounded-md bg-white shadow-sm focus:ring-amber-300 focus:border-amber-300">{{ old('address') }}</textarea>
            </div>

            <div class="flex justify-end gap-4 pt-4 border-t border-gray-100">
                <a href="{{ route('leads.index') }}" class="text-gray-600 hover:text-gray-900 px-4 py-2 rounded-md transition">Batal</a>
                <button type="submit"
                    class="bg-[#f3e8d8] hover:bg-[#e9ddcb] text-gray-800 px-6 py-3 rounded-md shadow-sm border border-gray-300 transition focus:ring-2 focus:ring-amber-200">
                    ➕ Simpan Lead
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
