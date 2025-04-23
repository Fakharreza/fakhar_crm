<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactionModel extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $primaryKey = 'id_transactions';

    protected $fillable = ['id_customers', 'transaction_date', 'total_amount', 'status'];

    public function customer()
    {
        return $this->belongsTo(customerModel::class, 'id_customers');
    }

    public function details()
    {
        return $this->hasMany(transactionDetailModel::class, 'id_transactions');
    }
}
