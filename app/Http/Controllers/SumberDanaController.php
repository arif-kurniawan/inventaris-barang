<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SumberDana;

class SumberDanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sumber_dana = SumberDana::all();
        return view('sumber_dana.index', compact('sumber_dana'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sumber_dana = SumberDana::all();
        return view('sumber_dana.create', compact('sumber_dana'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'nama_sumber_dana' => ['required','string','max:100'],
            'deskripsi' => ['required','string','max:255'],
        ]);

        SumberDana::create($request->all());
        return redirect()->route('sumber_dana.index')->with('success', 'Sumber Dana berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(SumberDana $sumber_dana)
    {
        return view('sumber_dana.detail', compact('sumber_dana'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SumberDana $sumber_dana)
    {
        return view('sumber_dana.edit', compact('sumber_dana'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SumberDana $sumber_dana)
    {
        $data = $request->all();
        $sumber_dana->update($data);
        return redirect()->route('sumber_dana.index')->with('success','Data sumber dana berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SumberDana $sumber_dana)
    {
        $sumber_dana->delete();
        return redirect()->route('sumber_dana.index')->with('success', 'Sumber Dana berhasil dihapus');
    }
}
