<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\projectModel;
use App\Models\customerModel;

class projectController extends Controller
{
    public function index()
    {
        $projects = projectModel::with(['lead', 'sales', 'manager'])->get();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_leads' => 'required',
            'id_sales' => 'required',
            'id_manager' => 'required'
        ]);

        projectModel::create($request->all());
        return redirect()->route('projects.index')->with('success', 'Project berhasil dibuat.');
    }

    public function edit($id)
    {
        $project = projectModel::findOrFail($id);
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = projectModel::findOrFail($id);
        $project->update($request->all());
        return redirect()->route('projects.index')->with('success', 'Project diperbarui.');
    }

    public function destroy($id)
    {
        projectModel::destroy($id);
        return redirect()->route('projects.index')->with('success', 'Project dihapus.');
    }

    public function approve($id)
    {
        $project = projectModel::findOrFail($id);
        $project->update(['status' => 'approved']);
        customerModel::create(['id_leads' => $project->id_leads, 'start_date' => now()]);
        return redirect()->route('projects.index')->with('success', 'Project disetujui.');
    }
}
