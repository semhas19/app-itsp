<?php

use App\Http\Controllers\KategoriPohonController;
use App\Http\Controllers\PemeliharaanController;
use App\Http\Controllers\LokasiPohonController;
use App\Http\Controllers\JenisPohonController;
use App\Http\Controllers\PohonController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PegawaiController;
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

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {
    Route::resource('pohons', PohonController::class);
    Route::resource('jenispohons', JenisPohonController::class);
    Route::resource('lokasipohons', LokasiPohonController::class);
    Route::resource('pemeliharaans', PemeliharaanController::class);
    Route::resource('kategoripohons', KategoriPohonController::class);
    Route::resource('admins', AdminController::class);
    Route::resource('pegawais', PegawaiController::class);

    Route::get('/qr-codes/{id}', [PohonController::class, 'qrcode'])->name('qr-code');
    Route::get('/print-pdfs', [PohonController::class, 'printpdf'])->name('print-pdf');
    Route::get('/pemeliharaan-print-pdfs', [PemeliharaanController::class, 'pemeliharaanprintpdf'])->name('pemeliharaan-print-pdf');
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


