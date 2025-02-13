<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Training extends Model
{
    use HasFactory;

    protected $table = 'trainings';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'nama',
        'nama_trainer',
        'kapasitas',
        'tipe',
        'deskripsi',
        'tanggal',
        'durasi',
        'status',
    ];

    protected $casts = [
        'tanggal' => 'datetime:Y-m-d H:i:s',
    ];

    public function approvedAttendees()
    {
        return $this->hasMany(Pendaftaran::class)->where('status', 'approved');
    }
}
