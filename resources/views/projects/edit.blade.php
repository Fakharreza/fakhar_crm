<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">Edit Project</h2>
    </x-slot>

    <div class="max-w-3xl mx-auto py-10 px-6">
        <form action="{{ route('projects.update', $project->id_projects) }}" method="POST" class="space-y-6 bg-white p-6 rounded-xl border shadow-sm">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Lead</label>
                <select name="id_leads" class="w-full p-2 border rounded-md" required>
                    <option value="">-- Pilih Lead --</option>
                    @foreach($leads as $lead)
                        <option value="{{ $lead->id_leads }}" {{ $lead->id_leads == $project->id_leads ? 'selected' : '' }}>
                            {{ $lead->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Sales</label>
                <select name="id_sales" class="w-full p-2 border rounded-md" required>
                    <option value="">-- Pilih Sales --</option>
                    @foreach($sales as $user)
                        <option value="{{ $user->id_users }}" {{ $user->id_users == $project->id_sales ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Manager</label>
                <select name="id_manager" class="w-full p-2 border rounded-md" required>
                    <option value="">-- Pilih Manager --</option>
                    @foreach($managers as $user)
                        <option value="{{ $user->id_users }}" {{ $user->id_users == $project->id_manager ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" class="w-full p-2 border rounded-md" required>
                    <option value="pending" {{ $project->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ $project->status == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ $project->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>

            <div class="flex justify-end space-x-3">
                <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">Update</button>
                <a href="{{ route('projects.index') }}" class="bg-gray-200 text-gray-700 px-5 py-2 rounded hover:bg-gray-300">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
