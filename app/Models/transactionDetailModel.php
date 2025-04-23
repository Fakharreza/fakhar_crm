<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactionDetailModel extends Model
{
    use HasFactory;
    protected $table = 'transaction_details';
    protected $primaryKey = 'id_transaction_details';

    protected $fillable = ['id_transactions', 'id_products', 'quantity', 'price', 'subtotal'];

    public function transaction()
    {
        return $this->belongsTo(transactionModel::class, 'id_transactions');
    }

    public function product()
    {
        return $this->belongsTo(productModel::class, 'id_products');
    }
}
