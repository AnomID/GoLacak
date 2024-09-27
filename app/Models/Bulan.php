<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Bulan extends Model
{
    use HasFactory;

    protected $table = 'bulan';  // Nama tabel secara eksplisit
    public $incrementing = false;
    protected $keyType = 'uuid';
    protected $fillable = ['bulan'];  // Kolom yang dapat diisi


    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();  // Generate UUID saat membuat data baru
        });
    }

    // Relasi satu Bulan memiliki banyak Program
    public function programs()
    {
        return $this->hasMany(Program::class);
    }
}