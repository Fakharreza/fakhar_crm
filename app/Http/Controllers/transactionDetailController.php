<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transactionDetailModel;

class TransactionDetailController extends Controller
{
    public function index()
    {
        $details = transactionDetailModel::with(['transaction', 'product'])->get();
        return view('transaction_details.index', compact('details'));
    }

    public function destroy($id)
    {
        transactionDetailModel::destroy($id);
        return redirect()->route('transaction_details.index')->with('success', 'Detail transaksi dihapus.');
    }
}
