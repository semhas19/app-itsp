<?php

namespace Database\Seeders;

use App\Models\JenisPohon;
use App\Models\KategoriPohon;
use App\Models\LokasiPohon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nama = KategoriPohon::create([
                'nama' => 'Ulin',
            ]);
        
        $jenis = JenisPohon::create([
                'nama'              => 'Ulin Kapur',
                'deskripsi'         => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque aut laboriosam, aliquam nemo animi nesciunt tenetur, quaerat earum, dolor libero dicta quod accusamus veniam labore voluptatem saepe? Inventore, repellendus! Quod?',
                'kategori_pohon_id' => $nama->id
        ]);
        
        $jalur = LokasiPohon::create([
                'jalur_pohon' => 'Jalur 1',
                'plot_pohon'  => 'Plot 1'
        ]);
    }
}
