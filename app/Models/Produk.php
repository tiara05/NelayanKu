<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Nelayan;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks';
    protected $primaryKey = "id";

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori', 'id_kategori');
    }

    public function nelayan()
    {
        return $this->hasOne(Nelayan::class, 'id', 'id_nelayan');
    }
}
