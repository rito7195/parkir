<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Operator extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $guard = 'operator';
    protected $table = 'tb_operator';
    protected $primaryKey = 'id_operator';
    protected $fillable = [
        'nama_operator', 
        'email', 
        'password',
    ];
    protected $hidden = [
        'password',
    ];
}
