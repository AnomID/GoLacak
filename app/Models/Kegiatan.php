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
