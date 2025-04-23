<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Menambahkan penggunaan kelas ini
use Illuminate\Notifications\Notifiable; // Menambahkan penggunaan Notifiable untuk fitur notifikasi
use Illuminate\Database\Eloquent\Factories\HasFactory;

class usersModel extends Authenticatable
{
    use HasFactory, Notifiable;  // Menambahkan trait Notifiable

    protected $table = 'users';
    protected $primaryKey = 'id_users';

    protected $fillable = ['name', 'email', 'password', 'role'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relasi dengan leads
    public function leads()
    {
        return $this->hasMany(leadModel::class, 'created_by');
    }
}
