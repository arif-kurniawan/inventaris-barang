@extends('layouts.content')
@section('content')
<form action="{{ route('gedung.update', $gedung->id) }}" method="POST" enctype="multipart/form-data" >
    @method('put')
    @csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="">Nama Gedung</label>
        <input type="text" name="nama_gedung" class="form-control" value="{{ $gedung->nama_gedung }}">
      </div>
      <div class="form-group col-md-2">
        <label for="">Lokasi</label>
        <input type="text" name="lokasi" class="form-control" value="{{ $gedung->lokasi }}">
      </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
          <label for="">Luas Lantai</label>
          <input type="number" name="luas" class="form-control" value="{{ $gedung->luas }}">
        </div>
      </div>
    <button type="submit" class="btn btn-success">Ubah Gedung</button>
  </form>
@endsection
