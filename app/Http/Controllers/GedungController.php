<?php

namespace App\Http\Controllers;

use App\Models\Gedung;
use App\Models\Ruang;
use Illuminate\Http\Request;

class GedungController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gedung = Gedung::all();
        return view('gedung.index', compact('gedung'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gedung = Gedung::all();
        return view('gedung.create', compact('gedung'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'nama_gedung' => ['required','string','max:255'],
            'lokasi' => ['required','string','max:255'],
            'luas' => ['required','integer'],
        ]);

        Gedung::create($request->all());
        return redirect()->route('gedung.index')->with('success', 'Data gedung berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gedung $gedung)
    {
        return view('gedung.detail', compact('gedung'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gedung $gedung)
    {
        return view('gedung.edit', compact('gedung'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gedung $gedung)
    {
        $data = $request->all();
        $gedung->update($data);
        return redirect()->route('gedung.index')->with('success', 'Data gedung berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gedung $gedung)
    {
        $gedung->delete();
        return redirect()->route('gedung.index')->with('success', 'Data gedung berhasil dihapus');
    }
}
