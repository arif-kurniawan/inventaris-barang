@extends('layouts.content')

@section('content')
<form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="">NIP</label>
            <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{ Auth::user()->profile?->nip }}" required autocomplete="name" autofocus>
          </div>
          @error('nip')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        <div class="form-group col-md-6">
            <label for="">Name Lengkap</label>
            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" value="{{ Auth::user()->profile?->nama_lengkap }}" required autocomplete="name" autofocus>
          </div>
          @error('nama_lengkap')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      <div class="form-group col-md-6">
        <label for="">Alamat</label>
        <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ Auth::user()->profile?->alamat }}" required autocomplete="email">
      </div>
            @error('alamat')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
      <div class="form-group col-md-6">
        <label for="">No_HP</label>
        <input type="text" class="form-control @error('nomor_hp') is-invalid @enderror" name="nomor_hp" value="{{ Auth::user()->profile?->nomor_hp }}" required>
      </div>
        @error('nomor_hp')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="form-row">
            <div class="form-group col-md-6">
                <input name="foto" type="file" class="form-control" required>
            </div>
          </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
