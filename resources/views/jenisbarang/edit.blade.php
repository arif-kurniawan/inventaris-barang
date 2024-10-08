@extends('layouts.content')
@section('content')
<form action="{{ route('jenisbarang.update', $jenisbarang->id) }}" method="POST" enctype="multipart/form-data" >
    @method('PUT')
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
          <label for="">Nama Jenis Barang</label>
          <input type="text" value="{{ old('jenis_barang', $jenisbarang->jenis_barang) }}" name="jenis_barang" class="form-control">
        </div>
      </div>
      <div class="form-row" >
          <div class="form-group col-md-6">
              <label for="">Harga</label>
              <input type="text" value="{{ old('harga', $jenisbarang->harga) }}" name="harga" class="form-control">
            </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
        <label for="">Sumber Dana</label>
          <select name="sumber_dana" id="sumber_dana" class="form-control">
            <option selected>Pilih Sumber Dana</option>
                @foreach ($sumber_dana as $sumber_danas)
            <option value="{{ $sumber_danas->nama_sumber_dana }}">{{ $sumber_danas->nama_sumber_dana }}</option>
              @endforeach
          </select>
        </div>
      </div>
      <div class="form-row" >
      <div class="form-group col-md-6">
        <label for="">Keterangan</label>
        <textarea type="text" value="" name="keterangan" class="form-control">{{ old('keterangan', $jenisbarang->keterangan) }}</textarea>
      </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-6">
              <div class="custom-file">
                <input name="gambar" type="file" class="custom-file-input" id="validatedInputGroupCustomFile" required>
                <label class="custom-file-label" for="validatedInputGroupCustomFile">Choose file...</label>
              </div>
            </div>
      </div>
      <button type="submit" class="btn btn-success">Edit Jenis Barang</button>
  </form>
@endsection
