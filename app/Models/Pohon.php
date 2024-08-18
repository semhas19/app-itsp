<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pohon extends Model
{
    protected $guarded = [];

    use HasFactory;

    protected $table = 'data_pohons';
    protected $appends = ['formatted_tgl_tanam'];

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
    
    public function kategori_pohon()
    {
        return $this->belongsTo(KategoriPohon::class, 'kategori_pohon_id');
    }

    public function getFormattedTglTanamAttribute()
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

        $tgl_tanam = Carbon::parse($this->attributes['tgl_tanam']);
        $formatted_tgl_tanam = $tgl_tanam->format('d') . ' ' . $bulan[$tgl_tanam->format('n')] . ' ' . $tgl_tanam->format('Y');

        return $formatted_tgl_tanam;
    }

    public function getFormattedTglPengukuranAttribute()
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

        $tgl_pengukuran = Carbon::parse($this->attributes['tgl_pengukuran']);
        $formatted_tgl_pengukuran = $tgl_pengukuran->format('d') . ' ' . $bulan[$tgl_pengukuran->format('n')] . ' ' . $tgl_pengukuran->format('Y');

        return $formatted_tgl_pengukuran;
    }
}
