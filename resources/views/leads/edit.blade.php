<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Lead') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto py-6 px-4">
        <div class="bg-[#fdfcf9] shadow-md rounded-lg p-8">
            <form action="{{ route('leads.update', $lead->id_leads) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="name" value="{{ old('name', $lead->name) }}"
                        class="mt-1 block w-full border border-gray-300 p-3 rounded-md bg-white shadow-sm focus:ring-lime-500 focus:border-lime-500"
                        required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ old('email', $lead->email) }}"
                        class="mt-1 block w-full border border-gray-300 p-3 rounded-md bg-white shadow-sm focus:ring-lime-500 focus:border-lime-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Telepon</label>
                    <input type="text" name="phone" value="{{ old('phone', $lead->phone) }}"
                        class="mt-1 block w-full border border-gray-300 p-3 rounded-md bg-white shadow-sm focus:ring-lime-500 focus:border-lime-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Alamat</label>
                    <textarea name="address" rows="3"
                        class="mt-1 block w-full border border-gray-300 p-3 rounded-md bg-white shadow-sm focus:ring-lime-500 focus:border-lime-500">{{ old('address', $lead->address) }}</textarea>
                </div>

                <div class="flex justify-end gap-4 pt-4 border-t border-gray-200">
                    <a href="{{ route('leads.index') }}"
                        class="text-gray-600 hover:text-gray-900 px-4 py-2 rounded-md transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="bg-[#e1f0db] hover:bg-[#d5e7ce] text-gray-800 px-6 py-3 rounded-md shadow-sm border border-gray-300 transition focus:ring-2 focus:ring-lime-200">
                        💾 Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
