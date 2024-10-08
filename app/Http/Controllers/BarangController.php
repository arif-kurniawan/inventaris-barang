<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\JenisBarang;
use App\Models\Ruang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::all();
        return view('barang.index', compact('barang'));
    }

    function autocomplete(Request $request)
  {
    if($request->get('query'))
    {
        $query = $request->get('query');
        $data = DB::table('jenis_barangs')
        ->where('jenis_barang', 'LIKE', "%{$query}%")
        ->get();
        $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
        foreach($data as $row)
        {
        $output .= '
        <li data-kode="'.$row->id. '">'.$row->jenis_barang.'</li>
        ';
        }
        $output .= '</ul>';
        echo $output;
    }
  }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ruang = Ruang::all();
        $jenisbarang = Jenisbarang::all();
        return view('barang.create', compact('ruang', 'jenisbarang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'jenis_barang_id' => 'required|numeric|min:1',
            'kode_barang' => 'required | string | unique:barangs,kode_barang',
            'kondisi' => 'required|string',
            'ruang_id' => 'required | numeric | min: 1'
        ]);

        $data = $request->all();
        Barang::create($data);

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {

        return view('barang.detail', compact('barang'));
    }

    public function getkode(Request $request){
        $jenisbarang = JenisBarang::with('kode_jenis')->find($request->id);
        return response()->json($jenisbarang);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        $ruang = Ruang::all();
        $jenisbarang = Jenisbarang::all();
        return view('barang.edit', compact('barang','ruang','jenisbarang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        //dd($request->all());
        $validation = $request->validate([
            'jenis_barang_id' => 'required|numeric|min:1',
            'kode_barang' => 'required | string | unique:barangs,kode_barang,'.$barang->id,
            'kondisi' => 'required|string',
            'ruang_id' => 'required | numeric | min: 1'
        ]);
        $data = $request->all();
        $barang->update($data);

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Data barang berhasil dihapus');
    }
}
