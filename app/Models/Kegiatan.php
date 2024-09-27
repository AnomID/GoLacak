<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kegiatan extends Model
{

    protected $table = 'kegiatan';
    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = [
        'id', 'nama_kegiatan', 'nama_indikator', 'jumlah_indikator', 'tipe_indikator',
        'anggaran_murni', 'pergeseran', 'perubahan', 'penyerapan_anggaran',
        'persen_penyerapan_anggaran', 'program_id'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();  // Generate UUID saat membuat data baru
        });
    }

    public function Program()
    {
        return $this->belongsTo(Program::class);
    }
}
