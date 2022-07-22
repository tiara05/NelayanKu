<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nelayan extends Model
{
    use HasFactory;

    protected $table = 'nelayans';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'kotakab',
        'alamat',
        'nomortelepon',
        'provinsi',
        'kecamatan',
        'desa',
        'email',
        'status',
        'username',
        'password',
        'foto',
    ];

}
