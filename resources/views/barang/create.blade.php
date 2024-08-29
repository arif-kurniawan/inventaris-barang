@extends('layouts.content')
@section('content')
<form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data" >
    @csrf
    <div class="form-row">
        <div class="form-group col-md-4">
          <label for="">Nama Barang</label>
          <select name="jenis_barang_id" id="" class="form-control">
            <option selected>Pilih...</option>
              @foreach ($jenisbarang as $jenis )
            <option value="{{ $jenis->id }}">{{ $jenis->jenis_barang }}</option>
              @endforeach
          </select>
        </div>
      </div>
    <div class="form-row">
        <div class="form-group col-md-6">
          <label for="">Kode Barang</label>
          <input type="text" name="kode_barang" class="form-control">
        </div>
      </div>
    <div class="form-row">
        <div class="form-group col-md-4">
          <label for="">Kondisi</label>
          <select name="kondisi" id="" class="form-control">
            <option selected>Pilih...</option>
            <option value="Baik">Baik</option>
            <option value="Rusak Ringan">Rusak Ringan</option>
            <option value="Rusak Berat">Rusak Berat</option>
          </select>
        </div>
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
    </div>
    <button type="submit" class="btn btn-success">ADD Barang</button>
  </form>
@endsection
