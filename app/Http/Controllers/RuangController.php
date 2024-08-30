<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use App\Models\Gedung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ruang = Ruang::all();
        return view('ruang.index', compact('ruang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $ruang = Ruang::all();
        $gedung = Gedung::all();
        return view('ruang.create', compact('ruang','gedung'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'nama_ruang' => ['required','string','max:255'],
            'gedung_id' => ['required','integer'],
            'panjang' => ['required','integer'],
            'lebar' => ['required','integer'],
            'keterangan' => ['required','string']
        ]);

        $data = $request->all();
        Ruang::create($data);
        return redirect()->route('ruang.index')->with('success', 'Ruang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ruang $ruang)
    {
        return view('ruang.detail', compact('ruang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ruang $ruang)
    {
        $gedung = Gedung::all();
        return view('ruang.edit', compact('ruang','gedung'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ruang $ruang)
    {
        $data = $request->all();
        $ruang->update($data);
        return redirect()->route('ruang.index')->with('success', 'Ruang berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ruang $ruang)
    {
        $ruang->delete();
        return redirect()->route('ruang.index')->with('success', 'Ruang berhasil dihapus');
    }
}
