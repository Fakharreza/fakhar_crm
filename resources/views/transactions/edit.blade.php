<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Edit Transaksi
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-10 px-6">
        <form action="{{ route('transactions.update', $transaction->id_transactions) }}" method="POST" class="space-y-6 bg-[#fdfcf7] p-6 rounded-xl shadow-sm border border-gray-200">
            @csrf
            @method('PUT')

            {{-- Pelanggan --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Pelanggan</label>
                <select name="id_customers" class="w-full border border-gray-300 p-2 rounded-md bg-white" required>
                    <option value="">Pilih Pelanggan</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id_customers }}" {{ $transaction->id_customers == $customer->id_customers ? 'selected' : '' }}>
                            {{ $customer->lead ? $customer->lead->name : 'Tidak ada nama' }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Produk (Selalu tampil) --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Produk</label>
                <div id="product-fields" class="space-y-3">
                    @foreach($transaction->details as $index => $detail)
                        <div class="flex gap-3 items-center product-row">
                            <select name="products[{{ $index }}][id_products]" class="product-select w-1/3 p-2 border border-gray-300 rounded-md bg-white" required>
                                <option value="">Pilih Produk</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id_products }}" data-price="{{ $product->price }}" {{ $product->id_products == $detail->id_products ? 'selected' : '' }}>
                                        {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>

                            <input type="number" name="products[{{ $index }}][quantity]" value="{{ $detail->quantity }}" class="quantity-input w-1/4 p-2 border border-gray-300 rounded-md" placeholder="Jumlah" min="1" required>

                            <input type="hidden" name="products[{{ $index }}][price]" class="price-hidden" value="{{ $detail->price }}">

                            <input type="text" class="price-display w-1/4 p-2 border border-gray-300 rounded-md bg-gray-100" value="{{ number_format($detail->price, 0, ',', '.') }}" readonly>

                            <button type="button" class="remove-product bg-red-500 text-white px-3 py-2 rounded hover:bg-red-600">Hapus</button>
                        </div>
                    @endforeach
                </div>

                {{-- Template Produk --}}
                <template id="product-template">
                    <div class="flex gap-3 items-center product-row">
                        <select name="products[__index__][id_products]" class="product-select w-1/3 p-2 border border-gray-300 rounded-md bg-white" required>
                            <option value="">Pilih Produk</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id_products }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                        <input type="number" name="products[__index__][quantity]" class="quantity-input w-1/4 p-2 border border-gray-300 rounded-md" placeholder="Jumlah" min="1" required>
                        <input type="hidden" name="products[__index__][price]" class="price-hidden">
                        <input type="text" class="price-display w-1/4 p-2 border border-gray-300 rounded-md bg-gray-100" readonly>
                        <button type="button" class="remove-product bg-red-500 text-white px-3 py-2 rounded hover:bg-red-600">Hapus</button>
                    </div>
                </template>
                <button type="button" id="add-product" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Tambah Produk
                </button>
            </div>

            {{-- Total Harga --}}
            <div class="flex justify-end">
                <div class="w-1/3">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Total Harga</label>
                    <input type="text" id="total-display" class="w-full p-2 border border-gray-300 rounded-md bg-gray-100" readonly>
                    <input type="hidden" name="total_amount">
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-between items-center pt-4">
                <div class="flex items-center">
                    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700">
                        Simpan
                    </button>
                </div>
                <a href="{{ route('transactions.index') }}" class="ml-3 text-gray-600 hover:underline">Batal</a>
            </div>
        </form>
    </div>

    {{-- Script --}}
    <script>
        let productIndex = {{ count($transaction->details) }};

        function updateTotal() {
            let total = 0;
            document.querySelectorAll('.product-row').forEach(row => {
                const qty = parseFloat(row.querySelector('.quantity-input')?.value || 0);
                const price = parseFloat(row.querySelector('.price-hidden')?.value || 0);
                total += qty * price;
            });

            const totalDisplay = document.getElementById('total-display');
            if (totalDisplay) {
                totalDisplay.value = total.toLocaleString('id-ID');
            }

            const hiddenInput = document.querySelector('input[name="total_amount"]');
            if (hiddenInput) {
                hiddenInput.value = total;
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.product-row').forEach(row => {
                const select = row.querySelector('.product-select');
                const priceInput = row.querySelector('.price-hidden');
                if (!priceInput.value) {
                    const selectedOption = select.options[select.selectedIndex];
                    const price = selectedOption.getAttribute('data-price') || 0;
                    priceInput.value = price;
                    row.querySelector('.price-display').value = parseInt(price).toLocaleString('id-ID');
                }
            });

            updateTotal();

            document.getElementById('product-fields')?.addEventListener('change', function (e) {
                if (e.target.classList.contains('product-select')) {
                    const selectedOption = e.target.options[e.target.selectedIndex];
                    const price = selectedOption.getAttribute('data-price') || 0;
                    const row = e.target.closest('.product-row');
                    row.querySelector('.price-hidden').value = price;
                    row.querySelector('.price-display').value = parseInt(price).toLocaleString('id-ID');
                    updateTotal();
                }
            });

            document.getElementById('product-fields')?.addEventListener('input', function (e) {
                if (e.target.classList.contains('quantity-input')) {
                    updateTotal();
                }
            });

            document.getElementById('add-product')?.addEventListener('click', function () {
                const template = document.getElementById('product-template').content.firstElementChild.cloneNode(true);
                const html = template.outerHTML.replace(/__index__/g, productIndex);
                const wrapper = document.createElement('div');
                wrapper.innerHTML = html;
                document.getElementById('product-fields').appendChild(wrapper.firstElementChild);
                productIndex++;
                updateTotal();
            });

            document.getElementById('product-fields')?.addEventListener('click', function (e) {
                if (e.target.classList.contains('remove-product')) {
                    e.target.closest('.product-row').remove();
                    updateTotal();
                }
            });
        });
    </script>
</x-app-layout>
