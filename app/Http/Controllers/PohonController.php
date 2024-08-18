<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\KategoriPohon;
use Illuminate\Http\Request;
use App\Models\LokasiPohon;
use App\Models\JenisPohon;
use App\Models\Pohon;
use Carbon\Carbon;

class PohonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pohons = Pohon::get();
        return view('pohons.index', compact('pohons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lokasi_pohons = LokasiPohon::all();

        $jenis_pohons = JenisPohon::all();

        $kategori_pohons = KategoriPohon::all();

        return view('pohons.create', compact('lokasi_pohons', 'jenis_pohons' , 'kategori_pohons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();

        $validated = $request->validate([
            'kode_pohon'        => 'required',
            'diameter'          => 'required',  // Diameter pohon
            'h_top'             => 'required',  // H Top pohon
            'h_base'            => 'required',  // H Base pohon
            'h_pole'            => 'required',  // Tengah pohon
            'tinggi_jalon'      => 'required',  // tinggi alat yang digunakan (Jalon/Galah)
            'note'              => 'nullable',
            'lokasi_pohon_id'   => 'required',
            'kategori_pohon_id' => 'required',
            'jenis_pohon_id'    => 'required',
            'tgl_tanam'         => 'required|date',
            'tgl_pengukuran'    => 'required|date',
            'kondisi'           => 'required|in: 1,2,3'
        ]);

         // Hitung Tinggi Pohon
        $tinggi_pohon = (($validated['h_top'] - $validated['h_base']) / 
        ($validated['h_pole'] - $validated['h_base'])) * $validated['tinggi_jalon'];
        $validated['tinggi_pohon'] = $tinggi_pohon;

        // Hitung Volume Pohon
        $diameter = $validated['diameter'];
        $volume_pohon = (1/4) * 3.14 * ($diameter ** 2) * $tinggi_pohon * 0.7 / 10000;
        $validated['volume_pohon'] = $volume_pohon;

        DB::transaction(function () use ($validated) {
            $pohon = Pohon::create($validated);

            $validated['data'] = json_encode($pohon);
            $pohon->update([
                'data' => $validated['data'],
            ]);
        });

        Alert::success('Berhasil', 'Data Telah Ditambahkan.');

        return redirect()->route('pohons.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pohon $pohon)
    {
        return view('pohons.show', compact('pohon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pohon $pohon)
    {
        $lokasi_pohons = LokasiPohon::all();

        $jenis_pohons = JenisPohon::all();

        $kategori_pohons = KategoriPohon::all();

        return view('pohons.edit', compact('pohon', 'lokasi_pohons', 'jenis_pohons', 'kategori_pohons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pohon $pohon)
    {
        // return $request->all();

        $validated = $request->validate([
            'kode_pohon'        => 'required',
            'diameter'          => 'required',  // Diameter pohon
            'h_top'             => 'required',  // H Top pohon
            'h_base'            => 'required',  // H Base pohon
            'h_pole'            => 'required',  // Tengah pohon
            'tinggi_jalon'      => 'required',  // tinggi alat yang digunakan (Jalon/Galah)
            'note'              => 'nullable',
            'lokasi_pohon_id'   => 'required',
            'kategori_pohon_id' => 'required',
            'jenis_pohon_id'    => 'required',
            'tgl_tanam'         => 'required|date',
            'tgl_pengukuran'    => 'required|date',
            'kondisi'           => 'required|in: 1,2,3'
        ]);

         // Hitung Tinggi Pohon
        $tinggi_pohon = (($validated['h_top'] - $validated['h_base']) / 
        ($validated['h_pole'] - $validated['h_base'])) * $validated['tinggi_jalon'];
        $validated['tinggi_pohon'] = $tinggi_pohon;

        // Hitung Volume Pohon
        $diameter = $validated['diameter'];
        $volume_pohon = (1/4) * 3.14 * ($diameter ** 2) * $tinggi_pohon * 0.7 / 10000;
        $validated['volume_pohon'] = $volume_pohon;

        DB::transaction(function () use ($validated, $pohon) {
            $pohon->update($validated);
        });

        Alert::success('Berhasil', 'Data Telah Diubah.');

        return redirect()->route('pohons.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pohon $pohon)
    {
        $pohon->delete();

        Alert::success('Berhasil', 'Data Telah Dihapus.');

        return redirect()->route('pohons.index');
    }

    public function qrcode($id)
    {
        $pohon = Pohon::find($id);

        // Perhitungan volume pohon
        $diameter = $pohon->diameter;
        $h_top = $pohon->h_top;
        $h_pole = $pohon->h_pole;
        $h_base = $pohon->h_base;
        $tinggi_pohon = $pohon->tinggi_pohon;

        $volume_pohon = (1/4) * 3.14 * ($diameter ** 2) * $tinggi_pohon * 0.7 / 10000;

        // Menentukan kondisi pohon
        $kondisi = $pohon->kondisi == '1' ? 'Baik' :
                ($pohon->kondisi == '2' ? 'Rusak Ringan' : 'Rusak Berat');

        // Data untuk QR code
        $data = "Kode Pohon: $pohon->kode_pohon\n" .
                "Kategori Pohon: " . $pohon->jenis_pohon->kategori_pohon->nama . "\n" .
                "Jenis Pohon: " . $pohon->jenis_pohon->nama_lokal . "\n" .
                "Nama Ilmiah: " . $pohon->jenis_pohon->nama_ilmiah . "\n" .
                "Tanggal Tanam: " . $pohon->formatted_tgl_tanam . "\n" .
                "Kondisi Pohon: $kondisi\n" .
                "Plot Pohon: " . $pohon->lokasi_pohon->plot_pohon . "\n" .
                "Diameter: $pohon->diameter cm\n" .
                "H Top: $pohon->h_top m\n" .
                "H Pole: $pohon->h_pole m\n" .
                "H Base: $pohon->h_base m\n" .
                "Tinggi Pohon: " . number_format($pohon->tinggi_pohon, 2) . " m\n" .
                "Volume Pohon: " . number_format($volume_pohon, 2) . " m³\n";

        // Generate QR code
        $qr = QrCode::size(250)->generate($data);

        // Return view dengan data
        return view('pohons.qrcode', compact('pohon', 'qr'));
    }


    public function pohonprintpdf()
    {
         // Ambil semua data pohon
        $print = Pohon::all();

        // Dapatkan tahun dari tanggal penanaman terkecil
        $tahun = Pohon::min('tgl_tanam');
        $tahun = Carbon::parse($tahun)->year;

        // Generate PDF
        $pdf = PDF::loadview('pohons.printpdf', [
            'pohon' => $print,
            'tahun' => $tahun
        ])->setPaper('a4', 'landscape');

        return $pdf->stream('pohontest.pdf');
    }
}
