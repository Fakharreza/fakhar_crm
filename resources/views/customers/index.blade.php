<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">Daftar Pelanggan</h2>
    </x-slot>

    <div class="max-w-6xl mx-auto py-10 px-6">
        @if(session('success'))
            <div class="mb-4 px-4 py-3 bg-green-50 text-green-800 border border-green-100 rounded-md shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-[#fdfcf9] rounded-lg shadow border border-gray-300 overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-[#f7f5f0] text-gray-700 text-sm">
                    <tr>
                        <th class="px-4 py-3 border">#</th>
                        <th class="px-4 py-3 border">Nama</th>
                        <th class="px-4 py-3 border">Email</th>
                        <th class="px-4 py-3 border">Telepon</th>
                        <th class="px-4 py-3 border">Tanggal Mulai</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($customers as $i => $customer)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 border text-gray-800">{{ $i + 1 }}</td>
                            <td class="px-4 py-3 border text-gray-800">{{ $customer->lead->name ?? '-' }}</td>
                            <td class="px-4 py-3 border text-gray-800">{{ $customer->lead->email ?? '-' }}</td>
                            <td class="px-4 py-3 border text-gray-800">{{ $customer->lead->phone ?? '-' }}</td>
                            <td class="px-4 py-3 border text-gray-800">
                                {{ \Carbon\Carbon::parse($customer->start_date)->format('d M Y') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-4 text-center text-gray-500">Tidak ada pelanggan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
