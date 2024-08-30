@extends('layouts.content')
@section('content')
<form action="{{ route('ruang.store') }}" method="POST" enctype="multipart/form-data" >
    @csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="">Nama Ruang</label>
        <input type="text" name="nama_ruang" class="form-control">
      </div>
      <div class="form-group col-md-2">
        <label for="gedung_id">Lokasi/Gedung</label>
        <select name="gedung_id">
            @foreach($gedung as $gedungs)
                <option value="{{ $gedungs->id }}" @if (old('gedung')) selected @endif>{{ $gedungs->nama_gedung }}</option>
            @endforeach
        </select>
      </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
          <label for="">Panjang</label>
          <input type="number" name="panjang" class="form-control">
        </div>
      </div>
    <div class="form-row" >
        <div class="form-group col-md-6">
            <label for="">Lebar</label>
            <input type="text" name="lebar" class="form-control">
          </div>
          <div class="form-group col-md-6">
            <label for="">Keterangan</label>
            <input type="text" name="keterangan" class="form-control">
          </div>
    </div>
    <button type="submit" class="btn btn-success">Tambah Ruang</button>
  </form>
@endsection
