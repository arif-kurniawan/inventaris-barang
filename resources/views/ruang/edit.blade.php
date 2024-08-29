@extends('layouts.content')
@section('content')
<form action="{{ route('ruang.update', $ruang->id) }}" method="POST" enctype="multipart/form-data" >
    @method('put')
    @csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="">Nama Ruang</label>
        <input type="text" name="nama_ruang" class="form-control" value="{{ $ruang->nama_ruang }}">
      </div>
      <div class="form-group col-md-2">
        <label for="">Lokasi/Gedung</label>
        <input type="number" name="gedung_id" class="form-control" value="{{ $ruang->gedung_id }}">
      </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
          <label for="">Panjang</label>
          <input type="number" name="panjang" class="form-control" value="{{ $ruang->panjang }}">
        </div>
      </div>
    <div class="form-row" >
        <div class="form-group col-md-6">
            <label for="">Lebar</label>
            <input type="text" name="lebar" class="form-control" value="{{ $ruang->lebar }}">
          </div>
          <div class="form-group col-md-6">
            <label for="">Keterangan</label>
            <input type="text" name="keterangan" class="form-control" value="{{ $ruang->keterangan }}">
          </div>
    </div>
    <button type="submit" class="btn btn-success">Ubah Ruang</button>
  </form>
@endsection
