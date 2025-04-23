<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transactionModel;
use App\Models\transactionDetailModel;
use App\Models\customerModel;
use App\Models\productModel;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = transactionModel::with('customer')->get();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $customers = customerModel::all();
        $products = productModel::all();
        return view('transactions.create', compact('customers', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_customers' => 'required',
            'products' => 'required|array'
        ]);

        $total = 0;
        foreach ($request->products as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $transaction = transactionModel::create([
            'id_customers' => $request->id_customers,
            'total_amount' => $total,
            'status' => 'pending'
        ]);

        foreach ($request->products as $item) {
            transactionDetailModel::create([
                'id_transactions' => $transaction->id_transactions,
                'id_products' => $item['id_products'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'subtotal' => $item['price'] * $item['quantity']
            ]);
        }

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil disimpan.');
    }

    public function destroy($id)
    {
        transactionModel::destroy($id);
        return redirect()->route('transactions.index')->with('success', 'Transaksi dihapus.');
    }
}
