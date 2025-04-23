<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">Daftar Pelanggan</h2>
    </x-slot>

    <div class="max-w-6xl mx-auto py-10 px-6">
        <div class="bg-[#fdfcf7] rounded-xl shadow border border-gray-200">
            <table class="min-w-full table-auto text-sm">
                <thead class="bg-[#f7f5f0] text-left text-gray-700">
                    <tr>
                        <th class="px-4 py-2 border">#</th>
                        <th class="px-4 py-2 border">Nama</th>
                        <th class="px-4 py-2 border">Email</th>
                        <th class="px-4 py-2 border">Telepon</th>
                        <th class="px-4 py-2 border">Tanggal Mulai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $i => $customer)
                        <tr class="hover:bg-[#f9f7f4] transition">
                            <td class="px-4 py-2 border">{{ $i + 1 }}</td>
                            <td class="px-4 py-2 border">{{ $customer->lead->name ?? '-' }}</td>
                            <td class="px-4 py-2 border">{{ $customer->lead->email ?? '-' }}</td>
                            <td class="px-4 py-2 border">{{ $customer->lead->phone ?? '-' }}</td>
                            <td class="px-4 py-2 border">{{ \Carbon\Carbon::parse($customer->start_date)->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                    @if($customers->isEmpty())
                        <tr>
                            <td colspan="5" class="px-4 py-3 text-center text-gray-500">Tidak ada pelanggan</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
