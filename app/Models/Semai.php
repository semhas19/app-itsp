<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semai extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kategori_pohon()
    {
        return $this->belongsTo(KategoriPohon::class, 'kategori_pohon_id');
    }

    public function jenis_pohon()
    {
        return $this->belongsTo(JenisPohon::class, 'jenis_pohon_id');
    }

    public function lokasi_pohon()
    {
        return $this->belongsTo(LokasiPohon::class, 'lokasi_pohon_id');
    }
}
