<?php

use App\Http\Controllers\KategoriPohonController;
use App\Http\Controllers\PemeliharaanController;
use App\Http\Controllers\LokasiPohonController;
use App\Http\Controllers\PenebanganController;
use App\Http\Controllers\JenisPohonController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\SemaiController;
use App\Http\Controllers\PohonController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*  
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::group(['middleware' => ['auth'], 'prefix' => 'app'], function () {
    Route::resource('pohons', PohonController::class);
    Route::resource('jenispohons', JenisPohonController::class);
    Route::resource('lokasipohons', LokasiPohonController::class);
    Route::resource('pemeliharaans', PemeliharaanController::class);
    Route::resource('kategoripohons', KategoriPohonController::class);
    Route::resource('penebangans', PenebanganController::class);
    Route::resource('admins', AdminController::class);
    Route::resource('pegawais', PegawaiController::class);
    Route::resource('semais', SemaiController::class);

    Route::get('/qr-codes/{id}', [PohonController::class, 'qrcode'])->name('qr-code');
    Route::get('/pohon-print-pdfs', [PohonController::class, 'pohonprintpdf'])->name('pohon-print-pdf');
    Route::get('/semai-print-pdfs', [SemaiController::class, 'semaiprintpdf'])->name('semai-print-pdf');
    Route::get('/penebangan-print-pdfs', [PenebanganController::class, 'penebanganprintpdf'])->name('penebangan-print-pdf');
    Route::get('/pemeliharaan-print-pdfs', [PemeliharaanController::class, 'pemeliharaanprintpdf'])->name('pemeliharaan-print-pdf');
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


