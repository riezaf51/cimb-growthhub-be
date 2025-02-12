<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nama_trainer',
        'kapasitas',
        'tipe',
        'deskripsi',
        'tanggal',
        'durasi',
        'status',
    ];
}
