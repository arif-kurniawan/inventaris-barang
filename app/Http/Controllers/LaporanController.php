<?php

namespace App\Http\Controllers;

use App\Http\Export\barangdruang;
use App\Http\Export\jenisbarang;
use App\Http\Export\kondisibarang;
use App\Http\Export\ruang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function laporanruang(){
        return Excel::download(new ruang(), 'ruang.xlsx');
    }
    public function laporanbarangruang(){
        return Excel::download(new barangdruang(), 'barangruang.xlsx');
    }
    public function jenisbarang(){
        return Excel::download(new jenisbarang(), 'jenisbarang.xlsx');
    }
    public function laporankondisi(Request $request){
        $cari = $request->cari;
        $ruang = DB::table('barangs')->where('nama_ruang', 'like', "%$cari%")
        ->join('ruangs', 'barangs.ruang_id', '=', 'ruangs.id')
        ->join('jenis_barangs', 'barangs.jenis_barang_id', '=', 'jenis_barangs.id')
        ->selectRaw("SUM(CASE WHEN barangs.kondisi = 'Baik' THEN 1 ELSE 0 END) AS sum_a, ".
                    "SUM(CASE WHEN barangs.kondisi = 'Rusak Ringan' THEN 1 ELSE 0 END) AS sum_b, ".
                    "SUM(CASE WHEN barangs.kondisi = 'Rusak Berat' THEN 1 ELSE 0 END) AS sum_c, jenis_barangs.jenis_barang")
        ->groupBy('ruangs.nama_ruang','jenis_barangs.jenis_barang','barangs.jenis_barang_id')
        ->get();

        return Excel::download(new kondisibarang($ruang), 'Kondisi_Barang_Export.xlsx');
    }
}
