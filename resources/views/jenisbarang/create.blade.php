@extends('layouts.content')
@section('content')
<form action="{{ route('jenisbarang.store') }}" method="POST" enctype="multipart/form-data" >
    @csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="">Nama Jenis Barang</label>
        <input type="text" name="jenis_barang" class="form-control">
      </div>
    </div>
    <div class="form-row" >
        <div class="form-group col-md-6">
            <label for="">Harga</label>
            <input type="text" name="harga" class="form-control">
          </div>
    </div>
    <div class="form-row" >
    <div class="form-group col-md-6">
      <label for="">Keterangan</label>
      <textarea type="" name="keterangan" class="form-control"></textarea>
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
    <button type="submit" class="btn btn-success">ADD Jenis Barang</button>
  </form>
@endsection
