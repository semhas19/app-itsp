<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPohon extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function jenis_pohon()
    {
        return $this->hasMany(JenisPohon::class, 'kategori_pohon_id');
    }
    
    public function data_pohon()
    {
        return $this->hasMany(Pohon::class, 'kategori_pohon_id');
    }
}
