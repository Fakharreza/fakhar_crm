<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productModel extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id_products';

    protected $fillable = ['name', 'description', 'price', 'bandwidth'];
}
