<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Pemeliharaan;
use App\Models\Pohon;

use Illuminate\Http\Request;

class PemeliharaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemeliharaans = Pemeliharaan::with('pohon')->get();
        return view('pemeliharaans.index', compact('pemeliharaans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pohons = Pohon::all();
        return view('pemeliharaans.create', compact('pohons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tgl_kegiatan'  => 'required|date',
            'kegiatan'      => 'required',
            'petugas'       => 'required',
            'data_pohon_id' => 'required'
        ]);

        DB::transaction(function () use ($validated) {
            Pemeliharaan::create($validated);
        });

        Alert::success('Berhasil', 'Data Telah Ditambahkan.');

        return redirect()->route('pemeliharaans.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemeliharaan $pemeliharaan)
    {
        $pohons = Pohon::all();
        return view('pemeliharaans.show', compact('pemeliharaan', 'pohons'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemeliharaan $pemeliharaan)
    {
        $pohons = Pohon::all();

        return view('pemeliharaans.edit', compact('pemeliharaan', 'pohons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemeliharaan $pemeliharaan)
    {
        $validated = $request->validate([
            'tgl_kegiatan'  => 'required',
            'kegiatan'      => 'required',
            'data_pohon_id' => 'required'
        ]);

        DB::transaction(function () use ($validated, $pemeliharaan) {
            $pemeliharaan->update($validated);
        });

        Alert::success('Berhasil', 'Data Telah Diubah.');

        return redirect()->route('pemeliharaans.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemeliharaan $pemeliharaan)
    {
        
        $pemeliharaan->delete();

        Alert::success('Berhasil', 'Data Telah Dihapus.');

        return redirect()->route('pemeliharaans.index');

    }

    public function pemeliharaanprintpdf()
    {
        $print = Pemeliharaan::all();
        $pdf = PDF::loadview('pemeliharaans.printpdf', ['pemeliharaan' => $print])->setPaper('a4', 'landscape');
        return $pdf->stream('pemeliharaantest.pdf');
    }
}
