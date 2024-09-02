<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.form');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function profile()
    {
        $profile = Profile::first();
        return view('user.profil',compact('profile'));
    }

    public function update_profile(Request $request){
        $validator = $request->validate([
            'nip' => 'required|string|max:255',
            'nama_lengkap' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:255',
            'foto' => 'mimes:jpeg,png,jpg|max:2048'
        ]);

        $profile = Profile::where('user_id', Auth::user()->id)->first();
        $gambar = $request->file('foto');
        $validator['foto'] = Storage::disk('public')->put('profile_img', $gambar);
        if($profile){
            $profile->update($validator);}
        else{
            $validator['user_id'] = Auth::user()->id;
            Profile::create($validator);
        }
        return redirect()->route('home')->with('success', 'Data Profile berhasil ditambahkan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'email_verified_at' => now(),
            'password' => Hash::make($request->input('password')),
            'hak_akses' => $request->input('role'),
            'remember_token' => Str::random(10),
        ]);
        Profile::create([
            'user_id' => $user->id,
        ]);

        return redirect()->route('home')->with('success', 'Data user berhasil ditambahkan');
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
