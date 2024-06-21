<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\LokasiPohon;
use App\Models\JenisPohon;
use App\Models\Pohon;

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

        return view('pohons.create', compact('lokasi_pohons', 'jenis_pohons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();

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
            'tgl_tanam'       => 'required|date',
            'kondisi'         => 'required|in: 1,2,3',
            'gambar'          => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $jarijari = $validated['diameter_pohon'] * $validated['diameter_pohon'];

        $hasil = $jarijari * $validated['tinggi_pohon'];

        $validated['volume_pohon'] = (3.14 * $hasil) / 4;

        if($request->hasfile('gambar'))
        {
            $file = $request->file('gambar');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('images/', $filename);
            $validated['gambar'] = $filename;
        }

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

        return view('pohons.edit', compact('pohon', 'lokasi_pohons', 'jenis_pohons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pohon $pohon)
    {
        // return $request->all();

        $validated = $request->validate([
            'nama_lokal'      => 'required',
            'nama_ilmiah'     => 'required',
            'kode_pohon'      => 'required',
            'tinggi_pohon'    => 'required',
            'keliling_pohon'  => 'required',
            'diameter_pohon'  => 'required',
            'note'            => 'nullable',
            'data'            => 'required',
            'lokasi_pohon_id' => 'required',
            'jenis_pohon_id'  => 'required',
            'tgl_tanam'       => 'required|date',
            'kondisi'         => 'required|in: 1,2,3',
            'gambar'          => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $jarijari = $validated['diameter_pohon'] * $validated['diameter_pohon'];

        $hasil = $jarijari * $validated['tinggi_pohon'];

        $validated['volume_pohon'] = (3.14 * $hasil) / 4;

        if ($request->hasFile('gambar')) {
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
            $validated['gambar'] = $imageName;  // Simpan nama file gambar ke dalam $validated
        }

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
        
        $kondisi = $pohon->kondisi == '1' ? 'Baik' :
              ($pohon->kondisi == '2' ? 'Rusak Ringan' : 'Rusak Berat');

        $data = "Nama Lokal: $pohon->nama_lokal\nNama Ilmiah: $pohon->nama_ilmiah\nKondisi Pohon: $kondisi";
        $qr = QrCode::size(120)->generate($data);
        
        return view('pohons.qrcode', compact('pohon', 'qr'));
    }

    public function printpdf()
    {

        $print = Pohon::all();

        $pdf = PDF::loadview('pohons.printpdf', ['pohon' => $print])->setPaper('a4', 'landscape');

        return $pdf->stream('test.pdf');
    }
}
