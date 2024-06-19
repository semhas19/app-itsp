<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\KategoriPohon;
use Illuminate\Http\Request;

class KategoriPohonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoripohon = KategoriPohon::get();
        return view('kategoripohons.index', compact('kategoripohon'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategoripohons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required'
        ]);

        DB::transaction(function () use ($validated) {
            KategoriPohon::create($validated);
        });

        Alert::success('Berhasil', 'Data Telah Ditambahkan.');

        return redirect()->route('kategoripohons.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(KategoriPohon $kategoripohon)
    {
        return view('kategoripohons.show', compact('kategoripohon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriPohon $kategoripohon)
    {
        return view('kategoripohons.edit', compact('kategoripohon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriPohon $kategoripohon)
    {
        $validated = $request->validate([
            'nama' => 'required'
        ]);

        DB::transaction(function () use ($validated, $kategoripohon) {
            $kategoripohon->update($validated);
        });

        Alert::success('Berhasil', 'Data Telah Diubah.');

        return redirect()->route('kategoripohons.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriPohon $kategoripohon)
    {
        $kategoripohon->delete();

        Alert::success('Berhasil', 'Data Telah Dihapus.');

        return redirect()->route('kategoripohons.index');
    }
}
