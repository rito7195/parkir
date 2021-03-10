<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonfigurasiTarif extends Model
{
    use HasFactory;
    protected $table = 'tb_konfigurasi_tarif';
    protected $primaryKey = 'id_tarif';
    protected $fillable = [
        'id_jenis', 'id_admin', 'tarif_normal', 'tarif_inap', 'jam_inap',
    ];
}
