<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">Daftar Project</h2>
    </x-slot>

    <div class="max-w-6xl mx-auto py-10 px-6">
        <a href="{{ route('projects.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 shadow-sm">+ Tambah Project</a>
        <div class="bg-[#fdfcf7] rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <table class="min-w-full table-auto text-sm">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-3 border">#</th>
                        <th class="px-4 py-3 border">Lead</th>
                        <th class="px-4 py-3 border">Sales</th>
                        <th class="px-4 py-3 border">Manager</th>
                        <th class="px-4 py-3 border">Status</th>
                        <th class="px-4 py-3 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $i => $project)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 border">{{ $i + 1 }}</td>
                            <td class="px-4 py-3 border">{{ $project->lead->name ?? '-' }}</td>
                            <td class="px-4 py-3 border">{{ $project->sales->name ?? '-' }}</td>
                            <td class="px-4 py-3 border">{{ $project->manager->name ?? '-' }}</td>
                            <td class="px-4 py-3 border capitalize">{{ $project->status }}</td>
                            <td class="px-4 py-3 border space-x-2">
                                @if (auth()->user()->role === 'manager')
                                    <a href="{{ route('projects.edit', $project->id_projects) }}" class="text-yellow-500 hover:underline">Edit</a>
                                @endif
                                <form action="{{ route('projects.destroy', $project->id_projects) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus project ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-4 text-center text-gray-500">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
