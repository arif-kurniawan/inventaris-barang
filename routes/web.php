<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\RuangController;
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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('jenisbarang', JenisBarangController::class);
Route::resource('ruang', RuangController::class);

Route::get('barang',[BarangController::class, 'index'])->name('barang.index');
Route::post('barang', [BarangController::class, 'store'])->name('barang.store');
Route::get('barang/create', [BarangController::class, 'create'])->name('barang.create');
Route::get('barang/{barang}/edit', [BarangController::class, 'edit'])->name('barang.edit');
Route::get('barang/{barang}', [BarangController::class, 'show'])->name('barang.show');
Route::put('barang/{barang}', [BarangController::class, 'update'])->name('barang.update');
Route::delete('barang/{barang}', [BarangController::class, 'destroy'])->name('barang.destroy');
