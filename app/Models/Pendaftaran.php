<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Pendaftaran extends Model
{
    use HasFactory,HasUuids;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $table = 'pendaftarans';

    protected $fillable = [
        'id',
        'user_id',
        'training_id',
        'status',
        'tgl_daftar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function training()
    {
        return $this->belongsTo(Training::class);
    }
}
