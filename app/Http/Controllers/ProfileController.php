<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Profile::all();
        return view('profile.index', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $profile = Profile::all();
        $user = User::all();
        return view('profile.create', compact('profile', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'email' => ['required','email'],
            'password' => ['required','password','min:8'],
            'nip' => ['required', 'string'],
            'nama_lengkap' => ['required','string','max:255'],
            'alamat' => ['required','string','max:255'],
            'nomor_hp' => ['required','digits:13'],
            'foto' => ['required','image','mimes:jpeg,png,jpg','max:2048']
        ]);

        $data = $request->all();
        $img = $request->file('foto');
        $data['foto'] = Storage::disk('public')->put('foto_user', $img);
        //dd($data);
        User::create($data['email']);
        Profile::create($data['']);

        return redirect()->route('tugas.index')->with('success','Tugas berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
