<?php

namespace App\Http\Export;

use App\Models\JenisBarang as ModelsJenisBarang;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class jenisbarang implements FromArray, WithHeadings, ShouldAutoSize
{
    public function array(): array
    {
        $data = ModelsJenisBarang::all();
        $results = [];
        $i = 0;
        foreach ($data as $key => $value) {
        $i++;
        $result = [];
        $result[] = $i;
        $result[] = $value->jenis_barang;
        $result[] = $value->kode_jenis;
        $result[] = $value->harga;
        $result[] = $value->keterangan;
        $result[] = $value->sumber_dana;
        $results[] = $result;
        }

        return $results;
    }

    public function headings(): array
    {
        return [
            'NO',
            'NAMA RUANG',
            'KODE BARANG',
            'HARGA',
            'KETERANGAN',
            'SUMBER DANA',
        ];
    }
}

?>
