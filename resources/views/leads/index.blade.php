<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">Daftar Leads</h2>
    </x-slot>

    <div class="max-w-6xl mx-auto py-10 px-6">
        <div class="flex justify-end mb-4">
            <a href="{{ route('leads.create') }}" class="px-5 py-2 bg-[#f3e8d8] hover:bg-[#e9ddcb] text-gray-800 rounded-md shadow-sm border border-gray-300 transition">
                ➕ Tambah Lead
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 px-4 py-3 bg-green-50 text-green-800 border border-green-100 rounded-md shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-[#fdfcf9] rounded-lg shadow border border-gray-300 overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-[#f7f5f0] text-gray-700 text-sm">
                    <tr>
                        <th class="px-4 py-3 border">Nama</th>
                        <th class="px-4 py-3 border">Email</th>
                        <th class="px-4 py-3 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($leads as $lead)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 border text-gray-800">{{ $lead->name }}</td>
                            <td class="px-4 py-3 border text-gray-800">{{ $lead->email }}</td>
                            <td class="px-4 py-3 border space-x-2">
                                <a href="{{ route('leads.edit', $lead->id_leads) }}" class="text-yellow-600 hover:underline">Edit</a>
                                <form action="{{ route('leads.destroy', $lead->id_leads) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus lead ini?')">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-4 py-4 text-center text-gray-500">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
