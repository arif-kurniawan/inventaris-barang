<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function index()
    {
        $daftar = Ruang::all();
        // $ruang = DB::table('barangs')
        // ->join('ruangs', 'barangs.ruang_id', '=', 'ruangs.id')
        // ->join('jenis_barangs', 'barangs.jenis_barang_id', '=', 'jenis_barangs.id')
        // ->select('ruangs.nama_ruang', 'jenis_barangs.jenis_barang', DB::raw('count(barangs.id) as total'))
        // ->groupBy('ruangs.nama_ruang', 'jenis_barangs.jenis_barang')
        // ->get();
        return view('home', compact('daftar'));
    }

    public function search(Request $request)
    {
        $daftar = Ruang::all();
        $cari = $request->cari;

    // $ruang = DB::table('barangs')->where('nama_ruang', 'like', "%$cari%")
    // ->join('ruangs', 'barangs.ruang_id', '=', 'ruangs.id')
    // ->join('jenis_barangs', 'barangs.jenis_barang_id', '=', 'jenis_barangs.id')
    // ->select('ruangs.nama_ruang', 'jenis_barangs.jenis_barang', DB::raw('count(barangs.id) as total'))
    // ->groupBy('ruangs.nama_ruang', 'jenis_barangs.jenis_barang')
    // ->get();
    $ruang = DB::table('barangs')->where('nama_ruang', 'like', "%$cari%")
    ->join('ruangs', 'barangs.ruang_id', '=', 'ruangs.id')
    ->join('jenis_barangs', 'barangs.jenis_barang_id', '=', 'jenis_barangs.id')
    ->selectRaw("SUM(CASE WHEN barangs.kondisi = 'Baik' THEN 1 ELSE 0 END) AS sum_a, ".
                "SUM(CASE WHEN barangs.kondisi = 'Rusak Ringan' THEN 1 ELSE 0 END) AS sum_b, ".
                "SUM(CASE WHEN barangs.kondisi = 'Rusak Berat' THEN 1 ELSE 0 END) AS sum_c, jenis_barangs.jenis_barang")
    ->groupBy('ruangs.nama_ruang','jenis_barangs.jenis_barang','barangs.jenis_barang_id')
    ->get();


    return view('home', compact('daftar','ruang', 'request'));
    }
}
