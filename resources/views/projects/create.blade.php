<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">Tambah Project</h2>
    </x-slot>

    <div class="max-w-3xl mx-auto py-10 px-6">
        <form action="{{ route('projects.store') }}" method="POST" class="space-y-6 bg-white p-6 rounded-xl border shadow-sm">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Lead</label>
                <select name="id_leads" class="w-full p-2 border rounded-md" required>
                    <option value="">-- Pilih Lead --</option>
                    @foreach($leads as $lead)
                        <option value="{{ $lead->id_leads }}">{{ $lead->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Sales</label>
                <select name="id_sales" class="w-full p-2 border rounded-md" required>
                    <option value="">-- Pilih Sales --</option>
                    @foreach($sales as $user)
                        <option value="{{ $user->id_users }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Manager</label>
                <select name="id_manager" class="w-full p-2 border rounded-md" required>
                    <option value="">-- Pilih Manager --</option>
                    @foreach($managers as $user)
                        <option value="{{ $user->id_users }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">Simpan</button>
        </form>
    </div>
</x-app-layout>
