<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usersModel extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'id_users';

    protected $fillable = ['name', 'email', 'password', 'role'];

    public function leads()
    {
        return $this->hasMany(leadModel::class, 'created_by');
    }
}
