<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\JenisBarang;
use App\Models\Ruang;
use Illuminate\Http\Request;
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ruang = Ruang::all();
        $jenisbarang = JenisBarang::all();
        return view('barang.create', compact('ruang', 'jenisbarang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kode_barang' => 'required | string | unique:barangs,kode_barang',
            'stok' => 'required|integer',
            'harga' => 'required',
            'satuan' => 'required|string|max:255',
            'kondisi' => 'required|string',
            'gambar' => 'required | mimes:jpeg,png,jpg|max:2048 ',
            'ruang_id' => 'required | numeric | min: 1'
        ]);

        $data = $request->all();
        $gambar = $request->file('gambar');

        $data['gambar'] = Storage::disk('public')->put('barang_img', $gambar);
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        $ruang = Ruang::all();
        return view('barang.edit', compact('barang', 'ruang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $data = $request->all();
        $data['gambar'] = $barang->gambar;
        $gambar = $request->file('gambar');

        if($request->hasFile('gambar')){
            $data['gambar'] = Storage::disk('public')->put('barang_img', $gambar);
        if($barang->gambar){
            Storage::disk('public')->delete($barang->gambar);
        }
        }
        $barang->update($data);

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        Storage::disk('public')->delete($barang->gambar);
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Data barang berhasil dihapus');
    }
}
