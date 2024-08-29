<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenisbarang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'jenis_barang' => ['required','string','max:255'],
            'harga' => ['required','string','max:255'],
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
        return view('jenisbarang.edit', compact('jenisbarang'));
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
