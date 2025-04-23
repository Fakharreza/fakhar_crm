<?php

namespace App\Http\Controllers;

use App\Models\usersModel;
use Illuminate\Http\Request;
use App\Models\projectModel;
use App\Models\customerModel;
use App\Models\leadModel;

class projectController extends Controller
{
    public function index()
    {
        $projects = projectModel::with(['lead', 'sales', 'manager'])->get();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $leads = leadModel::all();
        $sales = usersModel::where('role', 'sales')->get();
        $managers = usersModel::where('role', 'manager')->get();

        return view('projects.create', compact('leads', 'sales', 'managers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_leads' => 'required|exists:leads,id_leads',
            'id_sales' => 'required|exists:users,id_users',
            'id_manager' => 'required|exists:users,id_users',
        ]);

        // status tidak diinput, jadi defaultnya 'pending'
        $request->merge(['status' => 'pending']);

        projectModel::create($request->all());

        return redirect()->route('projects.index')->with('success', 'Project berhasil dibuat.');
    }

    public function edit($id)
    {
        $project = projectModel::findOrFail($id);
        $leads = leadModel::all();
        $sales = usersModel::where('role', 'sales')->get();
        $managers = usersModel::where('role', 'manager')->get();

        return view('projects.edit', compact('project', 'leads', 'sales', 'managers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_leads' => 'required|exists:leads,id_leads',
            'id_sales' => 'required|exists:users,id_users',
            'id_manager' => 'required|exists:users,id_users',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $project = projectModel::findOrFail($id);
        $wasApproved = $project->status === 'approved'; // status sebelumnya
        $project->update($request->all());

        // jika status baru adalah approved dan sebelumnya belum approved → buat customer
        if ($request->status === 'approved' && !$wasApproved) {
            customerModel::create([
                'id_leads' => $project->id_leads,
                'start_date' => now()
            ]);
        }

        return redirect()->route('projects.index')->with('success', 'Project berhasil diperbarui.');
    }

    public function destroy($id)
    {
        projectModel::destroy($id);
        return redirect()->route('projects.index')->with('success', 'Project dihapus.');
    }
}
