<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\GedungController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes(['register'=>false]);

Route::middleware('hak_akses:admin')->group(function () {

Route::resource('jenisbarang', JenisBarangController::class);
Route::resource('ruang', RuangController::class);
Route::resource('gedung', GedungController::class);

    Route::get('barang',[BarangController::class, 'index'])->name('barang.index');
    Route::post('barang', [BarangController::class, 'store'])->name('barang.store');
    Route::get('barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::get('barang/{barang}/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::get('barang/{barang}', [BarangController::class, 'show'])->name('barang.show');
    Route::put('barang/{barang}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('barang/{barang}', [BarangController::class, 'destroy'])->name('barang.destroy');

});

Route::middleware('hak_akses:staff')->group(function () {
    Route::get('barang',[BarangController::class, 'index'])->name('barang.index');
    Route::post('barang', [BarangController::class, 'store'])->name('barang.store');
    Route::get('barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::get('barang/{barang}/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::get('barang/{barang}', [BarangController::class, 'show'])->name('barang.show');
    Route::put('barang/{barang}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('barang/{barang}', [BarangController::class, 'destroy'])->name('barang.destroy');
});

Route::middleware('hak_akses:kepsek')->group(function () {

});

Route::middleware('hak_akses:admin|staff|kepsek')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
});

