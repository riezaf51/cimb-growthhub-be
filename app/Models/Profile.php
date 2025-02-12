<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Profile extends Model
{
    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'user_id',
        'nama',
        'tgl_lahir',
        'pekerjaan',
        'perusahaan',
        'no_telepon',
        'email',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
