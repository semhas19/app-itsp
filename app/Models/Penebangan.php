<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Penebangan extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'penebangans';

    public function lokasi_pohon()
    {
        return $this->belongsTo(LokasiPohon::class);
    }

    public function pemeliharaan()
    {
        return $this->belongsTo(Pemeliharaan::class);
    }

    public function jenis_pohon()
    {
        return $this->belongsTo(JenisPohon::class);
    }

    public function getFormattedTglTebangAttribute()
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

        $tgl_tebang = Carbon::parse($this->attributes['tgl_tebang']);
        $formatted_tgl_tebang = $tgl_tebang->format('d') . ' ' . $bulan[$tgl_tebang->format('n')] . ' ' . $tgl_tebang->format('Y');

        return $formatted_tgl_tebang;
    }
}
