<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Ruang;
use App\Models\SumberDana;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Sum;

class PDFController extends Controller
{
    public function index(){
        $ruang = Ruang::all();
        $sumber = SumberDana::latest()->get();
        return view('PDF.karturuang',compact('ruang','sumber'));
    }
    public function PDFkarturuang(){
        $barang = Barang::with('ruang','jenisbarang')->whereHas('jenisbarang',function($q)
        {$q->whereNotNull('sumber_dana');})
        ->orderBy('id','desc')
        ->get();

        $pdf = Pdf::loadview('PDF.pdfkarturuang', compact('barang'))->setPaper('a4', 'potrait');

        return $pdf->stream('Kartu Ruang SMKN9 MALANG.pdf');
    }

    public function PDFcoba(){
        $barang = Barang::with('ruang','jenisbarang')->whereHas('jenisbarang',function($q)
        {$q->whereNotNull('sumber_dana');})
        ->orderBy('id','desc')
        ->get();
        return view('PDF.pdfruang', compact('barang'));
    }

    public function caricetak(Request $request){
        $sumberdana = $request->input('sumberdana');
        $namaruang = $request->input('namaruang');

        $barang = Barang::with('ruang', 'jenisbarang')
            ->when($sumberdana && $sumberdana != '', function ($sd) use ($sumberdana) {
            $sd->whereHas('jenisbarang', function ($query) use ($sumberdana) {
                $query->where('sumber_dana', $sumberdana);
            });
            })
            ->when($namaruang && $namaruang != '', function ($nr) use ($namaruang) {
                $nr->whereHas('ruang', function ($query) use ($namaruang) {
                    $query->where('nama_ruang', $namaruang);
                });
            })

            ->get();

            $pdf = Pdf::loadview('PDF.pdfkarturuang', compact('barang'))->setPaper('a4', 'potrait');

            return $pdf->stream('Kartu Ruang SMKN9 MALANG.pdf');
    }

}
