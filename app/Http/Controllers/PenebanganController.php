<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\LokasiPohon;
use App\Models\JenisPohon;
use App\Models\Penebangan;

class PenebanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penebangans = Penebangan::get();
        return view('penebangans.index', compact('penebangans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lokasi_pohons = LokasiPohon::all();

        $jenis_pohons = JenisPohon::all();

        return view('penebangans.create', compact('lokasi_pohons', 'jenis_pohons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $request->all();

        // dd($request->all());

        $validated = $request->validate([
            'nama_lokal'      => 'required',
            'nama_ilmiah'     => 'required',
            'kode_pohon'      => 'required',
            'tinggi_pohon'    => 'required',
            'keliling_pohon'  => 'required',
            'diameter_pohon'  => 'required',
            'note'            => 'nullable',
            'lokasi_pohon_id' => 'required',
            'jenis_pohon_id'  => 'required',
            'tgl_tebang'      => 'required|date',
            'kondisi'         => 'required|in: 1,2,3',
            // 'gambar'          => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $jarijari = $validated['diameter_pohon'] * $validated['diameter_pohon'];

        $hasil = $jarijari * $validated['tinggi_pohon'];

        $validated['volume_pohon'] = (3.14 * $hasil) / 4;

        DB::transaction(function () use ($validated) {
            $penebangan = Penebangan::create($validated);

            $validated['data'] = json_encode($penebangan);
            $penebangan->update([
                'data' => $validated['data'],
            ]);
        });

        Alert::success('Berhasil', 'Data Telah Ditambahkan.');

        return redirect()->route('penebangans.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penebangan $penebangan)
    {
        return view('penebangans.show', compact('penebangan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penebangan $penebangan)
    {
        $lokasi_pohons = LokasiPohon::all();

        $jenis_pohons = JenisPohon::all();

        return view('penebangans.edit', compact('penebangan', 'lokasi_pohons', 'jenis_pohons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penebangan $penebangan)
    {
        // return $request->all();

        // dd($request->all());

        $validated = $request->validate([
            'nama_lokal'      => 'required',
            'nama_ilmiah'     => 'required',
            'kode_pohon'      => 'required',
            'tinggi_pohon'    => 'required',
            'keliling_pohon'  => 'required',
            'diameter_pohon'  => 'required',
            'note'            => 'nullable',
            'data'            => 'nullable',
            'lokasi_pohon_id' => 'required',
            'jenis_pohon_id'  => 'required',
            'tgl_tebang'      => 'required|date',
            'kondisi'         => 'required|in: 1,2,3'
        ]);

        $jarijari = $validated['diameter_pohon'] * $validated['diameter_pohon'];

        $hasil = $jarijari * $validated['tinggi_pohon'];

        $validated['volume_pohon'] = (3.14 * $hasil) / 4;

        DB::transaction(function () use ($validated, $penebangan) {
            // Update data
            $penebangan->update($validated);
    
            // Tambahkan kolom 'data' dengan data JSON dari objek yang diperbarui
            $penebangan->update(['data' => json_encode($penebangan)]);
        });

        
        Alert::success('Berhasil', 'Data Telah Diubah.');

        return redirect()->route('penebangans.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penebangan $penebangan)
    {
        $penebangan->delete();

        Alert::success('Berhasil', 'Data Telah Dihapus.');

        return redirect()->route('penebangans.index');
    }

    public function penebanganprintpdf()
    {
        $print = Penebangan::all();
        $pdf = PDF::loadview('penebangans.printpdf', ['penebangan' => $print])->setPaper('a4', 'landscape');
        return $pdf->stream('penebangantest.pdf');
    }
}
