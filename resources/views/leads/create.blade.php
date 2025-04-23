<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Lead Baru') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto py-6 px-4">
        <div class="bg-[#fdfcf9] shadow-md rounded-lg p-8">
            <form action="{{ route('leads.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="mt-1 block w-full border border-gray-300 p-3 rounded-md bg-white shadow-sm focus:ring-amber-400 focus:border-amber-400"
                        required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="mt-1 block w-full border border-gray-300 p-3 rounded-md bg-white shadow-sm focus:ring-amber-400 focus:border-amber-400">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Telepon</label>
                    <input type="text" name="phone" value="{{ old('phone') }}"
                        class="mt-1 block w-full border border-gray-300 p-3 rounded-md bg-white shadow-sm focus:ring-amber-400 focus:border-amber-400">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Alamat</label>
                    <textarea name="address" rows="3"
                        class="mt-1 block w-full border border-gray-300 p-3 rounded-md bg-white shadow-sm focus:ring-amber-400 focus:border-amber-400">{{ old('address') }}</textarea>
                </div>

                <div class="flex justify-end gap-4 pt-4 border-t border-gray-200">
                    <a href="{{ route('leads.index') }}"
                        class="text-gray-600 hover:text-gray-900 px-4 py-2 rounded-md transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="bg-[#f3e8d8] hover:bg-[#e9ddcb] text-gray-800 px-6 py-3 rounded-md shadow-sm border border-gray-300 transition focus:ring-2 focus:ring-amber-200">
                        ➕ Simpan Lead
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
