<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Detail Transaksi
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-10 px-6">
        <div class="bg-[#fdfcf7] p-6 rounded-xl shadow-sm border border-gray-200 space-y-6">
            <div>
                <h3 class="text-lg font-medium text-gray-700">Informasi Pelanggan</h3>
                <p class="text-gray-800">{{ $transaction->customer->lead->name ?? 'Tidak ada nama' }}</p>
            </div>

            <div>
                <h3 class="text-lg font-medium text-gray-700">Detail Produk</h3>
                <table class="w-full border text-sm text-left text-gray-600 mt-2">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-2 border">Produk</th>
                            <th class="px-4 py-2 border">Jumlah</th>
                            <th class="px-4 py-2 border">Harga Satuan</th>
                            <th class="px-4 py-2 border">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaction->details as $detail)
                            <tr>
                                <td class="px-4 py-2 border">{{ $detail->product->name }}</td>
                                <td class="px-4 py-2 border">{{ $detail->quantity }}</td>
                                <td class="px-4 py-2 border">Rp {{ number_format($detail->price, 0, ',', '.') }}</td>
                                <td class="px-4 py-2 border">Rp {{ number_format($detail->quantity * $detail->price, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex justify-end">
                <div class="text-right">
                    <h3 class="text-sm text-gray-700 font-medium">Total Harga</h3>
                    <p class="text-lg font-semibold text-gray-800">Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}</p>
                </div>
            </div>

            <!-- Tombol Kembali di pojok kanan bawah -->
            <div class="flex justify-end">
                <a href="{{ route('transactions.index') }}" class="inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    ← Kembali
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
