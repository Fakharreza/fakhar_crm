<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Manajemen User') }}
        </h2>
    </x-slot>

    <div class="py-8 px-4 max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-700">Daftar User</h1>
            <a href="{{ route('users.create') }}" class="bg-amber-400 hover:bg-amber-500 text-white px-5 py-2.5 rounded-md shadow-sm transition">
                + Tambah User
            </a>
        </div>

        @if(session('success'))
            <div class="bg-emerald-50 text-emerald-800 px-4 py-3 rounded-md border border-emerald-100 mb-4 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-[#fdfcf9] shadow-sm rounded-lg overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-[#f6f4ef]">
                    <tr>
                        <th class="text-left text-sm font-medium text-gray-600 px-6 py-3">Nama</th>
                        <th class="text-left text-sm font-medium text-gray-600 px-6 py-3">Email</th>
                        <th class="text-left text-sm font-medium text-gray-600 px-6 py-3">Role</th>
                        <th class="text-left text-sm font-medium text-gray-600 px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach($users as $user)
                        <tr class="hover:bg-[#faf9f6] transition">
                            <td class="px-6 py-4 text-gray-800">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-gray-800">{{ $user->email }}</td>
                            <td class="px-6 py-4 capitalize text-gray-700">{{ $user->role }}</td>
                            <td class="px-6 py-4 space-x-2">
                                <a href="{{ route('users.edit', $user->id_users) }}" class="text-amber-600 hover:underline">Edit</a>
                                <form action="{{ route('users.destroy', $user->id_users) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Yakin ingin menghapus user ini?')" class="text-rose-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
