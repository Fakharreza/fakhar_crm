<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customerModel extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $primaryKey = 'id_customers';

    protected $fillable = ['id_leads', 'start_date'];

    public function lead()
    {
        return $this->belongsTo(leadModel::class, 'id_leads');
    }

    public function transactions()
    {
        return $this->hasMany(transactionModel::class, 'id_customers');
    }
}
