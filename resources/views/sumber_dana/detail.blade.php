@extends('layouts.content')
@section('content')
<div class="d-sm-flex align-items-center mb-4" >
    <a href="{{ route('sumber_dana.edit', $sumber_dana->id) }}" class="btn btn-primary btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-edit"></i>
        </span>
        <span class="text">Edit Data Sumber Dana</span>
    </a>
    <form action="{{ route('sumber_dana.destroy', $sumber_dana->id) }}"method="POST">
        @method('DELETE')
        @csrf
        <button class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-trash"></i>
            </span>
            <span class="text">Hapus</span></button>
    </form>
</div>
<div class="card-group" >
  <div class="card">
      <ul class="list-group list-group-flush">
      <li class="list-group-item">ID Sumber Dana : {{ $sumber_dana->id }}</li>
        <li class="list-group-item">Nama Sumber Dana : {{ $sumber_dana->nama_sumber_dana }}</li>
        <li class="list-group-item">Deskripsi : {{ $sumber_dana->deskripsi }}</li>
      </ul>
    </div>
</div>
@endsection
