<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKegiatan extends Model
{

    protected $table = 'sub_kegiatan';
    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = [
        'id', 'nama_sub_kegiatan', 'nama_indikator', 'jumlah_indikator', 'tipe_indikator',
        'anggaran_murni', 'pergeseran', 'perubahan', 'penyerapan_anggaran',
        'persen_penyerapan_anggaran'
    ];
}
