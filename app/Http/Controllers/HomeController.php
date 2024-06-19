<?php

namespace App\Http\Controllers;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Http\Request;
use App\Models\Pohon;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->has('tahun')) {
            $tahun = $request->tahun;
        } else {
            $tahun = Carbon::now()->format('Y');
        }

        $tahuns = [2024, 2025, 2026, 2027];

        $baik = Pohon::whereYear('tgl_tanam', $tahun)->where('kondisi', '1')->count();
        $rusakringan = Pohon::whereYear('tgl_tanam', $tahun)->where('kondisi', '2')->count();
        $rusakberat = Pohon::whereYear('tgl_tanam', $tahun)->where('kondisi', '3')->count();

        $baiks = Pohon::where('kondisi', '1')->count();
        $rusakringans = Pohon::where('kondisi', '2')->count();
        $rusakberats = Pohon::where('kondisi', '3')->count();
        $totals = Pohon::count();

        $pohon = (new LarapexChart)->barChart()
            ->setTitle('Data Pohon Berdasarkan Kondisi')
            ->setSubtitle("Dari Tahun $tahun")
            ->addData('Kondisi', [$baik, $rusakringan, $rusakberat])
            ->setXAxis(['Baik', 'Rusak Ringan', 'Rusak Berat']);

        return view('home', compact('pohon', 'tahuns', 'baiks', 'rusakringans', 'rusakberats', 'totals'));

        
    }
}
