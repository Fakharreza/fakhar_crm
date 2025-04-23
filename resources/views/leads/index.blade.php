<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Leads') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-semibold text-gray-700">Daftar Leads</h1>
            <a href="{{ route('leads.create') }}" class="bg-amber-100 text-gray-800 px-5 py-2 rounded-lg border border-amber-300 hover:bg-amber-200 transition">
                + Tambah Lead
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-50 text-green-800 p-4 rounded-lg mb-4 shadow-sm border border-green-200">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-[#faf9f6] shadow-sm rounded-xl overflow-hidden border border-gray-200">
            <table class="min-w-full divide-y divide-gray-100">
                <thead class="bg-[#f0ede7] text-gray-700 text-sm">
                    <tr>
                        <th class="px-6 py-3 text-left font-medium">Nama</th>
                        <th class="px-6 py-3 text-left font-medium">Email</th>
                        <th class="px-6 py-3 text-left font-medium">Status</th>
                        <th class="px-6 py-3 text-left font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach($leads as $lead)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-gray-800">{{ $lead->name }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $lead->email }}</td>
                            <td class="px-6 py-4 capitalize text-gray-600">{{ $lead->status }}</td>
                            <td class="px-6 py-4 space-x-2">
                                <a href="{{ route('leads.edit', $lead->id_leads) }}" class="text-indigo-600 hover:underline">Edit</a>
                                <form action="{{ route('leads.destroy', $lead->id_leads) }}" method="POST" class="inline-block">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Hapus lead ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
