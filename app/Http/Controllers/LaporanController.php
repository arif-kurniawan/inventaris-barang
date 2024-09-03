<?php

namespace App\Http\Controllers;

use App\Http\Export\barangdruang;
use App\Http\Export\jenisbarang;
use App\Http\Export\ruang;
use Illuminate\Http\Request;
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
}
