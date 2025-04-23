<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\leadModel;

class leadController extends Controller
{
    public function index()
    {
        $leads = auth()->user()->role === 'sales'
            ? leadModel::where('created_by', auth()->id())->get()
            : leadModel::all();
        return view('leads.index', compact('leads'));
    }

    public function create()
    {
        return view('leads.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'address' => 'nullable'
        ]);

        leadModel::create($request->all() + ['created_by' => auth()->id()]);
        return redirect()->route('leads.index')->with('success', 'Lead berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $lead = leadModel::findOrFail($id);
        return view('leads.edit', compact('lead'));
    }

    public function update(Request $request, $id)
    {
        $lead = leadModel::findOrFail($id);
        $lead->update($request->all());
        return redirect()->route('leads.index')->with('success', 'Lead berhasil diperbarui.');
    }

    public function destroy($id)
    {
        leadModel::destroy($id);
        return redirect()->route('leads.index')->with('success', 'Lead berhasil dihapus.');
    }
}
