<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LokasiPohon extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Retrieve the DataPohon models associated with this LokasiPohon model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function data_pohon()
    {
        return $this->hasMany(Pohon::class, 'lokasi_pohon_id');
    }

    public function semai()
    {
        return $this->hasMany(Semai::class, 'lokasi_pohon_id');
    }
}
