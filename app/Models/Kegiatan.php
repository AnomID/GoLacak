<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{

    protected $table = 'kegiatan';
    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = [
        'id', 'nama_kegiatan', 'nama_indikator', 'jumlah_indikator', 'tipe_indikator',
        'anggaran_murni', 'pergeseran', 'perubahan', 'penyerapan_anggaran',
        'persen_penyerapan_anggaran', 'sub_kegiatan_id'
    ];

    public function subKegiatan()
    {
        return $this->belongsTo(SubKegiatan::class);
    }
}
