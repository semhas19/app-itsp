<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pemeliharaan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pohon()
    {
        return $this->belongsTo(Pohon::class, 'data_pohon_id');
    }

    public function getFormattedTglKegiatanAttribute()
    {
        $bulan = [
            1  => 'Januari',
            2  => 'Februari',
            3  => 'Maret',
            4  => 'April',
            5  => 'Mei',
            6  => 'Juni',
            7  => 'Juli',
            8  => 'Agustus',
            9  => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        $tgl_kegiatan = Carbon::parse($this->attributes['tgl_kegiatan']);
        $formatted_tgl_kegiatan = $tgl_kegiatan->format('d') . ' ' . $bulan[$tgl_kegiatan->format('n')] . ' ' . $tgl_kegiatan->format('Y');

        return $formatted_tgl_kegiatan;
    }
}
