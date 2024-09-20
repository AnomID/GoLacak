<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bulan extends Model
{
    protected $table = 'bulan';
    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = [
        'id', 'bulan', 'program_id'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
