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

        // Saat membuat data baru, isi create_by dan update_by dengan nama user yang login
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();  // Generate UUID
            $model->create_by = auth()->user()->name; // Nama user yang login
            $model->update_by = auth()->user()->name; // Nama user yang login
        });

        // Saat mengupdate data, update kolom update_by dengan nama user yang login
        static::updating(function ($model) {
            $model->update_by = auth()->user()->name;
        });
    }

    // Relasi satu Program memiliki banyak Kegiatan

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

