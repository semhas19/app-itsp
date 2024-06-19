<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = User::where('role', 'admin')->get();
        return view('admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.create');
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
        $validated['role'] = 'admin';

        DB::transaction(function () use ($validated) {
            User::create($validated);
        });

        Alert::success('Berhasil', 'Admin Telah Ditambahkan.');


        return redirect()->route('admins.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $admin)
    {
        return view('admins.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $admin)
    {
        return view('admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $admin)
    {
        $validated = $request->validate([
            'name'     => 'required',
            'username' => 'required'
        ]);

        DB::transaction(function () use ($validated, $admin) {
            $admin->update($validated);
        });

        Alert::success('Berhasil', 'Data Admin Telah Diubah.');

        return redirect()->route('admins.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $admin)
    {
        $admin->delete();

        Alert::success('Berhasil', 'Data Admin Telah Dihapus.');

        return redirect()->route('admins.index');
    }
}
