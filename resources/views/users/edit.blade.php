<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">Edit User</h2>
    </x-slot>

    <div class="max-w-3xl mx-auto py-10 px-6">
        <form action="{{ route('users.update', $user->id_users) }}" method="POST" class="space-y-6 bg-white p-6 rounded-xl border shadow-sm">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <input name="name" type="text" value="{{ $user->name }}" class="w-full p-2 border rounded-md" required />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input name="email" type="email" value="{{ $user->email }}" class="w-full p-2 border rounded-md" required />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                <select name="role" class="w-full p-2 border rounded-md">
                    <option value="sales" {{ $user->role == 'sales' ? 'selected' : '' }}>Sales</option>
                    <option value="manager" {{ $user->role == 'manager' ? 'selected' : '' }}>Manager</option>
                </select>
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('users.index') }}" class="bg-gray-200 text-gray-700 px-5 py-2 rounded hover:bg-gray-300">Batal</a>
                <button type="submit"
                    class="bg-[#f3e8d8] hover:bg-[#e9ddcb] text-gray-800 px-6 py-2 rounded-md shadow-sm border border-gray-300 transition">
                    💾 Update
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
