@extends('layouts.content')
@section('content')
<form action="{{ route('sumber_dana.update', $sumber_dana->id) }}" method="POST" enctype="multipart/form-data" >
    @method('put')
    @csrf
    <div class="form-row">
      <div class="form-group col-md-2">
        <label for="">Nama Sumber Dana</label>
        <input type="text" name="nama_sumber_dana" class="form-control" value="{{ $sumber_dana->nama_sumber_dana }}">
      </div>
      <div class="form-group col-md-6">
        <label for="">Deskripsi</label>
        <input type="text" name="deskripsi" class="form-control" value="{{ $sumber_dana->deskripsi}}">
      </div>
    </div>
    <button type="submit" class="btn btn-success">Ubah Sumber Dana</button>
  </form>
@endsection
