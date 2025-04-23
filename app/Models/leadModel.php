<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leadModel extends Model
{
    use HasFactory;
    protected $table = 'leads';
    protected $primaryKey = 'id_leads';

    protected $fillable = ['name', 'email', 'phone', 'address', 'created_by'];

    public function user()
    {
        return $this->belongsTo(usersModel::class, 'created_by');
    }

    public function project()
    {
        return $this->hasOne(projectModel::class, 'id_leads');
    }
}
