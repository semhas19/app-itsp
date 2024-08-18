<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\KategoriPohon;
use Illuminate\Http\Request;
use App\Models\LokasiPohon;
use App\Models\JenisPohon;
use App\Models\Semai;

class SemaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semais = Semai::get();
        return view('semais.index', compact('semais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoripohons = KategoriPohon::all();
        $jenispohons = JenisPohon::all();
        $lokasipohons = LokasiPohon::all();
        return view('semais.create', compact('kategoripohons', 'jenispohons', 'lokasipohons'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();

        $validated = $request->validate([
            'kategori_pohon_id' => 'required',
            'jenis_pohon_id' => 'required',
            'lokasi_pohon_id' => 'required',
            'tinggi_pohon'      => 'required',
            'tgl_tanam'         => 'required|date',
            'kondisi'           => 'required|in: 1,2,3',
            'note'              => 'nullable'
        ]);

        DB::transaction(function () use ($validated) {
            $semai = Semai::create($validated);

            $validated['data'] = json_encode($semai);
            $semai->update([
                'data' => $validated['data'],
            ]);
        });

        Alert::success('Berhasil', 'Data Telah Ditambahkan.');

        return redirect()->route('semais.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Semai $semai)
    {
        return view('semais.show', compact('semai'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Semai $semai)
    {
        $kategoripohons = KategoriPohon::all();
        $jenispohons = JenisPohon::all();
        return view('semais.edit', compact('semai', 'kategoripohons', 'jenispohons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Semai $semai)
    {
        $validated = $request->validate([
            'nama_lokal'        => 'required',
            'nama_ilmiah'       => 'required',
            'kategori_pohon_id' => 'required',
            'tinggi_pohon'      => 'required',
            'tgl_tanam'         => 'required|date',
            'kondisi'           => 'required|in: 1,2,3',
            'note'              => 'nullable'
        ]);

        DB::transaction(function () use ($validated, $semai) {
            $semai->update($validated);
        });

        Alert::success('Berhasil', 'Data Telah Diubah.');

        return redirect()->route('semais.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Semai $semai)
    {
        $semai->delete();

        Alert::success('Berhasil', 'Data Telah Dihapus.');

        return redirect()->route('semais.index');
    }

    public function semaiprintpdf()
    {
        $print = Semai::all();
        $pdf = PDF::loadview('semais.printpdf', ['semai' => $print])->setPaper('a4', 'landscape');
        return $pdf->stream('semaitest.pdf');
    }
}
