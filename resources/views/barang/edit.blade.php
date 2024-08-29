@extends('layouts.content')
@section('content')
<form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data" >
    @method('PUT')
    @csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="">Nama Barang</label>
        <input type="text" value="{{ old('nama_barang', $barang->nama_barang) }}"  name="nama_barang" class="form-control">
      </div>
      <div class="form-group col-md-2">
        <label for="">Stok</label>
        <input type="number" value="{{ old('stok', $barang->stok) }}" name="stok" class="form-control">
      </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
          <label for="">Kode Barang</label>
          <input type="text" value="{{ old('kode_barang', $barang->kode_barang) }}" name="kode_barang" class="form-control">
        </div>
      </div>
    <div class="form-row" >
        <div class="form-group col-md-6">
            <label for="">Harga</label>
            <input type="text" value="{{ old('harga', $barang->harga) }}" name="harga" class="form-control">
          </div>
          <div class="form-group col-md-6">
            <label for="">Satuan</label>
            <input type="text" value="{{ old('satuan', $barang->satuan) }}" name="satuan" class="form-control">
          </div>
    </div>
    <div class="form-group">
      <label for="">Kondisi</label>
      <input type="text" value="{{ old('kondisi', $barang->kondisi) }}" name="kondisi" class="form-control">
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="">Ruang</label>
        <select name="ruang_id" id="" class="form-control">
          <option selected>{{ $barang->ruang->nama_ruang }}</option>
            @foreach ($ruang as $ruangs )
          <option value="{{ $ruangs->id }}"
            @if ($barang->ruang_id == $ruangs->id)
                selected
            @endif
            >{{ $ruangs->nama_ruang }}</option>
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
