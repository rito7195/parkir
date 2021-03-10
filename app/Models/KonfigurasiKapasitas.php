<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonfigurasiKapasitas extends Model
{
    use HasFactory;
    protected $table = 'tb_konfigurasi_kapasitas';
    protected $primaryKey = 'id_kapasitas';
    protected $fillable = [
        'id_jenis', 'id_admin', 'kapasitas',
    ];
}
