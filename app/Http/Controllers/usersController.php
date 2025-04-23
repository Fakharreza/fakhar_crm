<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usersModel;

class usersController extends Controller
{
    public function index()
    {
        $users = usersModel::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:sales,manager'
        ]);

        usersModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = usersModel::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = usersModel::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:sales,manager'
        ]);

        $user->update($request->only(['name', 'email', 'role']));

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy($id)
    {
        usersModel::destroy($id);
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}
