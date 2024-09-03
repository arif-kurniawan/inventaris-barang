@extends('layouts.content')
@section('content')
<form action="{{ route('sumber_dana.store') }}" method="POST" enctype="multipart/form-data" >
    @csrf
    <div class="form-row">
      <div class="form-group col-md-2">
        <label for="">Sumber Dana</label>
        <input type="text" name="nama_sumber_dana" class="form-control">
      </div>
      <div class="form-group col-md-6">
        <label for="">Deskripsi</label>
        <input type="text" name="deskripsi" class="form-control">
      </div>
    </div>
    <button type="submit" class="btn btn-success">Tambah Sumber Dana</button>
  </form>
@endsection
