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
        $kategoriKayuKeras = KategoriPohon::create([
            'nama' => 'Pohon Kayu Keras'
        ]);
        
        $kategoriPenghijauan = KategoriPohon::create([
            'nama' => 'Pohon Penghijauan dan Konservasi'
        ]);

        $kategoriPohonBuah = KategoriPohon::create([
            'nama' => 'Pohon Penghasil Buah'
        ]);
        
        $kategoriPohonGetah = KategoriPohon::create([
            'nama' => 'Pohon Penghasil Getah'
        ]);

        $kategoriPohonMinyakAtsiri = KategoriPohon::create([
            'nama' => 'Pohon Penghasil Minyak Atsiri'
        ]);
        
        $kategoriPohonHias = KategoriPohon::create([
            'nama' => 'Pohon Hias'
        ]);
        
        JenisPohon::create([
            'nama_lokal'        => 'Ulin',
            'nama_ilmiah'       => 'Eusideroxylon zwageri',
            'deskripsi'         => 'Ulin, atau kayu besi, sangat tahan terhadap cuaca dan serangga, digunakan untuk konstruksi berat seperti jembatan dan dermaga.',
            'kategori_pohon_id' => $kategoriKayuKeras->id
        ]);
        
        JenisPohon::create([
            'nama_lokal'        => 'Jabon',
            'nama_ilmiah'       => 'Anthocephalus cadamba',
            'deskripsi'         => 'Pohon Jabon dikenal dengan pertumbuhannya yang cepat dan kayunya yang ringan namun kuat, sehingga menjadi pilihan populer dalam berbagai aplikasi, termasuk pembuatan furnitur, kertas, dan konstruksi ringan.',
            'kategori_pohon_id' => $kategoriKayuKeras->id
        ]);
        
        JenisPohon::create([
            'nama_lokal'        => 'Gmelina',
            'nama_ilmiah'       => 'Gmelina arborea',
            'deskripsi'         => 'Gmelina sering digunakan dalam pembuatan furnitur, plywood, dan bahan bangunan lainnya karena sifat kayunya yang mudah diolah dan cukup tahan terhadap serangga.',
            'kategori_pohon_id' => $kategoriKayuKeras->id
        ]);
        
        JenisPohon::create([
            'nama_lokal'        => 'Meranti',
            'nama_ilmiah'       => 'Shorea spp.',
            'deskripsi'         => 'Meranti sering digunakan dalam konstruksi bangunan, pembuatan perabotan, dan pembuatan veneer karena ketahanannya dan teksturnya yang baik.',
            'kategori_pohon_id' => $kategoriKayuKeras->id
        ]);

        JenisPohon::create([
            'nama_lokal'        => 'Acacia',
            'nama_ilmiah'       => 'Acacia spp.',
            'deskripsi'         => 'Acacia adalah pohon cepat tumbuh yang digunakan dalam reboisasi, terutama di lahan kritis.',
            'kategori_pohon_id' => $kategoriPenghijauan->id
        ]);

        JenisPohon::create([
            'nama_lokal'        => 'Mangga',
            'nama_ilmiah'       => 'Mangifera indica',
            'deskripsi'         => 'Banyak varietas mangga yang menjadi indukan, seperti Harum Manis dan Arumanis, yang dikenal karena buahnya yang manis dan lezat.',
            'kategori_pohon_id' => $kategoriPohonBuah->id
        ]);

        JenisPohon::create([
            'nama_lokal'        => 'Karet',
            'nama_ilmiah'       => 'Hevea brasiliensis',
            'deskripsi'         => 'Pohon karet merupakan sumber utama lateks, yang diolah menjadi karet alam. Klon-klon unggul sering dijadikan indukan untuk meningkatkan produksi.',
            'kategori_pohon_id' => $kategoriPohonGetah->id
        ]);

        JenisPohon::create([
            'nama_lokal'        => 'Kayu Putih',
            'nama_ilmiah'       => 'Melaleuca cajuputi',
            'deskripsi'         => 'Pohon ini digunakan untuk produksi minyak kayu putih. Indukan dipilih berdasarkan kualitas dan kuantitas minyak yang dihasilkan.',
            'kategori_pohon_id' => $kategoriPohonMinyakAtsiri->id
        ]);

        JenisPohon::create([
            'nama_lokal'        => 'Flamboyan',
            'nama_ilmiah'       => 'Delonix regia',
            'deskripsi'         => 'Flamboyan terkenal dengan bunganya yang merah mencolok dan sering dijadikan indukan untuk pohon hias.',
            'kategori_pohon_id' => $kategoriPohonHias->id
        ]);
        
        LokasiPohon::create([
            'jalur_pohon' => 'Jalur 1',
            'plot_pohon'  => 'Plot 1',
            'koordinat'  => '-0.423339, 117.157899'  
        ]);
    }
}
