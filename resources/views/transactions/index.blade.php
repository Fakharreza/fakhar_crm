<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">Daftar Transaksi</h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 px-4">
        @if(session('success'))
            <div class="bg-green-100 text-green-800 border border-green-300 p-4 rounded mb-4 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-6 flex justify-end">
            <a href="{{ route('transactions.create') }}"
               class="px-5 py-2 bg-[#f3e8d8] hover:bg-[#e9ddcb] text-gray-800 rounded-md shadow-sm border border-gray-300 transition">
                ➕ Tambah Transaksi
            </a>
        </div>

        <div class="bg-[#fdfcf9] rounded-lg shadow border border-gray-300 overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-800">
                <thead class="bg-[#f7f5f0] text-gray-700">
                    <tr>
                        <th class="px-6 py-3 font-medium">Pelanggan</th>
                        <th class="px-6 py-3 font-medium">Total</th>
                        <th class="px-6 py-3 text-center font-medium">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($transactions as $transaction)
                        <tr class="hover:bg-[#f9f7f4] transition">
                            <td class="px-6 py-4">
                                @if($transaction->customer && $transaction->customer->lead)
                                    {{ $transaction->customer->lead->name }}
                                @else
                                    Tidak ada nama
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                Rp{{ number_format($transaction->total_amount, 2, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-center space-x-2">
                                <a href="{{ route('transactions.show', $transaction->id_transactions) }}"
                                   class="text-blue-500 hover:underline">Lihat</a>

                                <a href="{{ route('transactions.edit', $transaction->id_transactions) }}"
                                   class="text-blue-600 hover:text-blue-800 transition">Edit</a>

                                <form action="{{ route('transactions.destroy', $transaction->id_transactions) }}"
                                      method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('Yakin ingin menghapus transaksi ini?')"
                                            class="text-red-600 hover:text-red-800 transition">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
