<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\KategoriPohon;
use Illuminate\Http\Request;
use App\Models\JenisPohon;

class JenisPohonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenispohons = JenisPohon::get();
        return view('jenispohons.index', compact('jenispohons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoripohons = KategoriPohon::all();
        return view('jenispohons.create', compact('kategoripohons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'              => 'required',
            'deskripsi'         => 'required',
            'kategori_pohon_id' => 'required'
        ]);

        DB::transaction(function () use ($validated) {
            JenisPohon::create($validated);
        });

        Alert::success('Berhasil', 'Data Telah Ditambahkan.');

        return redirect()->route('jenispohons.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisPohon $jenispohon)
    {
        return view('jenispohons.show', compact('jenispohon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisPohon $jenispohon)
    {
        $kategoripohons = KategoriPohon::all();

        return view('jenispohons.edit', compact('jenispohon', 'kategoripohons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisPohon $jenispohon)
    {
        // return  $request->all();

        $validated = $request->validate([
            'nama'              => 'required',
            'deskripsi'         => 'required',
            'kategori_pohon_id' => 'required'
        ]);

        DB::transaction(function () use ($validated, $jenispohon) {
            $jenispohon->update($validated);
        });

        Alert::success('Berhasil', 'Data Telah Diubah.');

        return redirect()->route('jenispohons.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisPohon $jenispohon)
    {
        $jenispohon->delete();

        Alert::success('Berhasil', 'Data Telah Dihapus.');

        return redirect()->route('jenispohons.index');
    }
}
