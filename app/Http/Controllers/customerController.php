<?php

namespace App\Http\Controllers;

use App\Models\customerModel;
use Illuminate\Http\Request;

class customerController extends Controller
{
    public function index()
    {
        $customers = customerModel::with(['lead'])->get();
        return view('customers.index', compact('customers'));
    }

    public function destroy($id)
    {
        customerModel::destroy($id);
        return redirect()->route('customers.index')->with('success', 'Customer dihapus.');
    }
}
