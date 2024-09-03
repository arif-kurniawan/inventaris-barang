<?php

namespace App\Http\Export;

use App\Models\Ruang as ModelsRuang;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class barangdruang implements FromArray, WithHeadings
{
    public function array(): array
    {
        $data = DB::table('barangs')->where('ruang_id', '!=', null)
        ->join('ruangs', 'barangs.ruang_id', '=', 'ruangs.id')
        ->join('jenis_barangs', 'barangs.jenis_barang_id', '=', 'jenis_barangs.id')
        ->select('ruangs.nama_ruang', 'jenis_barangs.jenis_barang', DB::raw('count(barangs.id) as total'))
        ->groupBy('ruangs.nama_ruang', 'jenis_barangs.jenis_barang')
        ->get();
        $results = [];
        $i = 0;
        foreach ($data as $key => $value) {
        $i++;
        $result = [];
        $result[] = $i;
        $result[] = $value->nama_ruang;
        $result[] = $value->jenis_barang;
        $result[] = $value->total;

        $results[] = $result;
        }

        return $results;
    }

    public function headings(): array
    {
        return [
            'NO',
            'NAMA RUANG',
            'JENIS BARANG',
            'JUMLAH BARANG'
        ];
    }
}

?>
