<?php

namespace App\Http\Export;

use App\Models\Ruang as ModelsRuang;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class kondisibarang implements FromArray, WithHeadings, ShouldAutoSize
{

    protected $ruang;
    public function __construct($data)
    {
        $this->ruang = $data;
    }
    public function array(): array
    {

        $results = [];
        $i = 0;
        foreach ($this->ruang as $key => $value) {
        $i++;
        $result = [];
        $result[] = $i;
        $result[] = $value->jenis_barang;
        $result[] = $value->sum_a;
        $result[] = $value->sum_b;
        $result[] = $value->sum_c;
        $result[] = $value->sum_a + $value->sum_b + $value->sum_c;

        $results[] = $result;
        }

        return $results;
    }

    public function headings(): array
    {
        return [
            'NO',
            'NAMA BARANG',
            'JUMLAH BAIK',
            'JUMLAH RUSAK RINGAN',
            'JUMLAH RUSAK BERAT',
            'TOTAL BARANG'
        ];
    }
}

?>
