<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawais = User::where('role', 'pegawai')->get();
        return view('pegawais.index', compact('pegawais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawais.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();

        // dd($request->all());

        $validated = $request->validate([
            'name'     => 'required',
            'email'    => 'required',
            'username' => 'required',
            'password' => 'required|confirmed',
        ]);
        $validated['role'] = 'pegawai';

        $validated['password'] = bcrypt($request->password);

        DB::transaction(function () use ($validated) {
            User::create($validated);
        });

        Alert::success('Berhasil', 'Admin Telah Ditambahkan.');


        return redirect()->route('pegawais.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $pegawai)
    {
        return view('pegawais.show', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $pegawai)
    {
        return view('pegawais.edit', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $pegawai)
    {
        $validated = $request->validate([
            'name'     => 'required',
            'email'    => 'required',
            'username' => 'required',
            'password' => 'sometimes',
        ]);
        $validated['role'] = 'pegawai';

        if ($request->password !== '' && $request->password !== NULL )
        {
            $validated['password'] = bcrypt($request->password);
        }
        else
        {
            $validated['password'] = $pegawai->password;
        }

        DB::transaction(function () use ($validated, $pegawai) {
            $pegawai->update($validated);
        });

        Alert::success('Berhasil', 'Data Admin Telah Diubah.');

        return redirect()->route('pegawais.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $pegawai)
    {
        $pegawai->delete();

        Alert::success('Berhasil', 'Data Admin Telah Dihapus.');

        return redirect()->route('pegawais.index');
    }
}
