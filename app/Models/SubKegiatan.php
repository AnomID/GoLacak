<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SubKegiatan extends Model
{
    use HasFactory;

    protected $table = 'sub_kegiatan';  // Nama tabel secara eksplisit
    public $incrementing = false;
    protected $keyType = 'uuid';
    protected $fillable = [
        'nama_sub_kegiatan', 'nama_indikator', 'jumlah_indikator', 'tipe_indikator',
        'anggaran_murni', 'pergeseran', 'perubahan', 'penyerapan_anggaran',
        'persen_penyerapan_anggaran', 'kegiatan_id'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    // Relasi Sub Kegiatan dimiliki oleh satu Kegiatan
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}
