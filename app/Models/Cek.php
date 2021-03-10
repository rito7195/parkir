<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cek extends Model
{
    use HasFactory;
    protected $table = 'tb_cek';
    protected $primaryKey = 'id_cek';
    protected $fillable = [
        'id_jenis', 'jumlah',
    ];
}
