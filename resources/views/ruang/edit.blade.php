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
        <label for="gedung_id">Lokasi/Gedung</label>
        <select name="gedung_id">
            @foreach($gedung as $gedungs)
                <option value="{{ old('gedung',$gedungs->id) }}"
                    @if ($ruang->gedung_id == $gedungs->id)
                        selected                 
                    @endif>
                    {{ $gedungs->nama_gedung }}</option>
            @endforeach
        </select>
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
