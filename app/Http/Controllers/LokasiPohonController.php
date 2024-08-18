<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\KategoriPohon;
use Illuminate\Http\Request;
use App\Models\LokasiPohon;

class LokasiPohonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lokasipohons = LokasiPohon::get();
        return view('lokasipohons.index', compact('lokasipohons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoripohons = KategoriPohon::all();
        return view('lokasipohons.create', compact('kategoripohons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jalur_pohon' => 'required',
            'plot_pohon'  => 'required',
            'koordinat'   => 'required',
        ]);

        DB::transaction(function () use ($validated) {
            LokasiPohon::create($validated);
        });

        Alert::success('Berhasil', 'Data Telah Ditambahkan.');

        return redirect()->route('lokasipohons.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(LokasiPohon $lokasipohon)
    {
        return view('lokasipohons.show', compact('lokasipohon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LokasiPohon $lokasipohon)
    {
        $kategoripohons = KategoriPohon::all();
        return view('lokasipohons.edit', compact('lokasipohon', 'kategoripohons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LokasiPohon $lokasipohon)
    {
        // return  $request->all();

        $validated = $request->validate([
            'jalur_pohon' => 'required',
            'plot_pohon'  => 'required',
            'koordinat'   => 'required',
        ]);

        DB::transaction(function () use ($validated, $lokasipohon) {
            $lokasipohon->update($validated);
        });

        Alert::success('Berhasil', 'Data Telah Diubah.');

        return redirect()->route('lokasipohons.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LokasiPohon $lokasipohon)
    {
        $lokasipohon->delete();

        Alert::success('Berhasil', 'Data Telah Dihapus.');

        return redirect()->route('lokasipohons.index');
    }
}
