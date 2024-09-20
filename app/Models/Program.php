<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Program extends Model
{
    use HasFactory;

    protected $table = 'program';  // Nama tabel secara eksplisit
    public $incrementing = false;
    protected $keyType = 'uuid';
    protected $fillable = [
        'nama_program', 'nama_indikator', 'jumlah_indikator', 'tipe_indikator',
        'anggaran_murni', 'pergeseran', 'perubahan', 'penyerapan_anggaran',
        'persen_penyerapan_anggaran', 'bulan_id'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    // Relasi Program dimiliki oleh satu Bulan
    public function bulan()
    {
        return $this->belongsTo(Bulan::class);
    }

    // Relasi satu Program memiliki banyak Kegiatan
    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class);
    }
}
