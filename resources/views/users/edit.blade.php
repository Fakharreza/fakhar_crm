<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-10 max-w-xl mx-auto px-4">
        <form action="{{ route('users.update', $user->id_users) }}" method="POST" class="space-y-6 bg-[#fdfcf9] shadow-sm rounded-xl p-8">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700">Nama</label>
                <input name="name" type="text" value="{{ $user->name }}"
                    class="mt-1 block w-full border border-gray-200 p-3 rounded-md bg-white shadow-sm focus:ring-amber-500 focus:border-amber-500"
                    required />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input name="email" type="email" value="{{ $user->email }}"
                    class="mt-1 block w-full border border-gray-200 p-3 rounded-md bg-white shadow-sm focus:ring-amber-500 focus:border-amber-500"
                    required />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Role</label>
                <select name="role"
                    class="mt-1 block w-full border border-gray-200 p-3 rounded-md bg-white shadow-sm focus:ring-amber-500 focus:border-amber-500">
                    <option value="sales" {{ $user->role == 'sales' ? 'selected' : '' }}>Sales</option>
                    <option value="manager" {{ $user->role == 'manager' ? 'selected' : '' }}>Manager</option>
                </select>
            </div>

            <div class="flex justify-end gap-4 pt-4 border-t border-gray-100">
                <a href="{{ route('users.index') }}"
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
</x-app-layout>
