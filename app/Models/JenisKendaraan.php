<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKendaraan extends Model
{
    use HasFactory;
    protected $table = 'tb_jenis_kendaraan';
    protected $primaryKey = 'id_jenis';
    protected $fillable = [
        'nama',
    ];
}
