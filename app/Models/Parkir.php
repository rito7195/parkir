<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parkir extends Model
{
    use HasFactory;
    protected $table = 'tb_parkir';
    protected $primaryKey = 'id_parkir';
    public $timestamps = false;
    //const CREATED_AT = 'jam_masuk';
    //const UPDATED_AT = 'jam_keluar';
    protected $fillable = [
        'plat_nomor', 'id_jenis', 'id_operator','tgl_parkir', 'jam_masuk',
    ];
}
