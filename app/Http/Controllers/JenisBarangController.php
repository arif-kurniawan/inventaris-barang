<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use App\Models\kode_jenis_barang;
use App\Models\SumberDana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class JenisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jbarang = JenisBarang::all();
        return view('jenisbarang.index',compact('jbarang'));
    }

    function autocomplete(Request $request)
  {
    if($request->get('query'))
    {
        $query = $request->get('query');
        $data = DB::table('kode_jenis_barangs')
        ->where('nama_jenis', 'LIKE', "%{$query}%")
        ->get();
        $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
        foreach($data as $row)
        {
        $output .= '
        <li data-kode="'.$row->kode_jenis. '" >'.$row->nama_jenis.'</li>
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
        $sumber_dana = SumberDana::all();
        $kode = kode_jenis_barang::all();
        return view('jenisbarang.create',compact('kode','sumber_dana'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'kode_jenis' => ['required'],
            'jenis_barang' => ['required','string','max:255'],
            'harga' => ['required','string','max:255'],
            'sumber_dana' => ['required','string','max:255'],
            'keterangan' => ['required','string'],
            'gambar' => ['required','mimes:jpeg,png,jpg|max:2048']
        ]);
        $data = $request->all();
        $gambar = $request->file('gambar');
        $data['gambar'] = Storage::disk('public')->put('jbarang_img', $gambar);
        JenisBarang::create($data);
        return redirect()->route('jenisbarang.index')->with('success', 'Jenis Barang Berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisBarang $jenisbarang)
    {
        return view('jenisbarang.detail', compact('jenisbarang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisBarang $jenisbarang)
    {
        $sumber_dana = SumberDana::all();
        return view('jenisbarang.edit', compact('jenisbarang','sumber_dana'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisBarang $jenisbarang)
    {
        $data = $request->all();
        $data['gambar'] = $jenisbarang->gambar;
        $gambar = $request->file('gambar');
        if($request->hasFile('gambar')){
            $data['gambar'] = Storage::disk('public')->put('jbarang_img', $gambar);
            if($jenisbarang->gambar){
                Storage::disk('public')->delete($jenisbarang->gambar);
            }
        }
        $jenisbarang->update($data);
        return redirect()->route('jenisbarang.index')->with('success', 'Jenis Barang Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisBarang $jenisbarang)
    {
        Storage::disk('public')->delete($jenisbarang->gambar);
        $jenisbarang->delete();
        return redirect()->route('jenisbarang.index')->with('success', 'Jenis Barang Berhasil dihapus');
    }
}
