<?php

namespace App\Http\Controllers;

use App\Models\Barang;
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
        return view('barang.create', compact('ruang'));
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
