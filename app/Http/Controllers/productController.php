<?php

namespace App\Http\Controllers;

use App\Models\productModel;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function index()
    {
        $products = productModel::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric'
        ]);

        productModel::create($request->only(['name', 'description', 'price', 'bandwidth']));
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $product = productModel::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = productModel::findOrFail($id);
        $product->update($request->only(['name', 'description', 'price', 'bandwidth']));
        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        productModel::destroy($id);
        return redirect()->route('products.index')->with('success', 'Produk dihapus.');
    }
}
