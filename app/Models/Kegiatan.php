<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';  // Nama tabel secara eksplisit
    public $incrementing = false;
    protected $keyType = 'uuid';
    protected $fillable = [
        'nama_kegiatan', 'nama_indikator', 'jumlah_indikator', 'tipe_indikator',
        'anggaran_murni', 'pergeseran', 'perubahan', 'penyerapan_anggaran',
        'persen_penyerapan_anggaran', 'program_id'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    // Relasi Kegiatan dimiliki oleh satu Program
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    // Relasi satu Kegiatan memiliki banyak Sub Kegiatan
    public function subKegiatans()
    {
        return $this->hasMany(SubKegiatan::class);
    }
}
