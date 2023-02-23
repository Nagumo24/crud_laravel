<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    protected $fillable = [
        'uuid',
        'nama',
        'jam_masuk',
        'lokasi_masuk'
    ];
    
    use HasFactory;
}
