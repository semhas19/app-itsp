<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPohon extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kategori_pohon()
    {
        return $this->belongsTo(KategoriPohon::class);
    }
}