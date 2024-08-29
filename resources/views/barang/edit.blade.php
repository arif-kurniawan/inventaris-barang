@extends('layouts.content')
@section('content')
<form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data" >
    @method('PUT')
    @csrf
    <div class="form-row">
        <div class="form-group col-md-4">
          <label for="">Nama Barang</label>
          <select name="jenis_barang_id" id="" class="form-control">
              @foreach ($jenisbarang as $jenis )
            <option value="{{ $jenis->id }}" @if (old('jenis_barang_id', $barang->jenis_barang_id) == $jenis->id) selected @endif >{{ $jenis->jenis_barang }}</option>
              @endforeach
          </select>
          @error('jenis_barang_id')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>
    <div class="form-row">
        <div class="form-group col-md-6">
          <label for="">Kode Barang</label>
          <input type="text" value="{{ old('kode_barang',$barang->kode_barang) }}" name="kode_barang" class="form-control">
          @error('kode_barang')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>
    <div class="form-row">
        <div class="form-group col-md-4">
          <label for="">Kondisi</label>
          <select name="kondisi" id="" class="form-control">
            <option selected>{{ old('kondisi', $barang->kondisi) }}</option>
            <option value="Baik">Baik</option>
            <option value="Rusak Ringan">Rusak Ringan</option>
            <option value="Rusak Berat">Rusak Berat</option>
          </select>
          @error('kondisi')
              <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="">Ruang</label>
        <select name="ruang_id" id="" class="form-control">
            @foreach ($ruang as $ruangs )
          <option value="{{ $ruangs->id }}" @if (old('ruang_id', $barang->ruang_id) == $ruangs->id) selected @endif >{{ $ruangs->nama_ruang }}</option>
            @endforeach
        </select>
        @error('ruang_id')
            <div class="text-danger" >{{ $message }}</div>
        @enderror
      </div>
    </div>
    <button type="submit" class="btn btn-success">Edit Barang</button>
  </form>
@endsection
