@extends('layouts.content')
@section('content')
<form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data" >
    @csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="">Nama Barang</label>
        <input type="text" name="nama_barang" class="form-control">
      </div>
      <div class="form-group col-md-2">
        <label for="">Stok</label>
        <input type="number" name="stok" class="form-control">
      </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
          <label for="">Kode Barang</label>
          <input type="text" name="kode_barang" class="form-control">
        </div>
      </div>
    <div class="form-row" >
        <div class="form-group col-md-6">
            <label for="">Harga</label>
            <input type="text" name="harga" class="form-control">
          </div>
          <div class="form-group col-md-6">
            <label for="">Satuan</label>
            <input type="text" name="satuan" class="form-control">
          </div>
    </div>
    <div class="form-group">
      <label for="">Kondisi</label>
      <input type="text" name="kondisi" class="form-control">
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="">Ruang</label>
        <select name="ruang_id" id="" class="form-control">
          <option selected>Pilih...</option>
            @foreach ($ruang as $ruangs )
          <option value="{{ $ruangs->id }}">{{ $ruangs->nama_ruang }}</option>
            @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="">Gambar</label>
        <input type="file" name="gambar" class="form-control">
      </div>

    </div>
    <button type="submit" class="btn btn-success">ADD_Barang</button>
  </form>
@endsection
