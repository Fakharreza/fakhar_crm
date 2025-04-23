<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projectModel extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $primaryKey = 'id_projects';

    protected $fillable = ['id_leads', 'id_sales', 'id_manager', 'status'];

    public function lead()
    {
        return $this->belongsTo(leadModel::class, 'id_leads');
    }

    public function sales()
    {
        return $this->belongsTo(usersModel::class, 'id_sales');
    }

    public function manager()
    {
        return $this->belongsTo(usersModel::class, 'id_manager');
    }
}
