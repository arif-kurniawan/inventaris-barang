@extends('layouts.content')
@section('content')
<form action="{{ route('gedung.store') }}" method="POST" enctype="multipart/form-data" >
    @csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="">Nama Gedung</label>
        <input type="text" name="nama_gedung" class="form-control">
      </div>
      <div class="form-group col-md-2">
        <label for="">Lokasi</label>
        <input type="text" name="lokasi" class="form-control">
      </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
          <label for="">Luas Lantai</label>
          <input type="number" name="luas" class="form-control">
        </div>
    </div>
    <button type="submit" class="btn btn-success">Tambah Gedung</button>
  </form>
@endsection
