@extends('layouts.content')
@section('content')
<div class="d-sm-flex align-items-center mb-4" >
    <a href="{{ route('ruang.edit', $ruang->id) }}" class="btn btn-primary btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-edit"></i>
        </span>
        <span class="text">Edit Data</span>
    </a>
    <form action="{{ route('ruang.destroy', $ruang->id) }}"method="POST">
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
<div class="card" style="width: 1rem" >
    <img style="width: 15rem; height: auto" src="{{ asset('storage/'. $ruang->gambar) }}" class="img-thumbnail" alt="...">
    
    <div class="card-body">
      <h5 class="card-title">ID Ruang : {{ $ruang->id }}</h5>
    </div>
</div>
<div class="card">
    <div class="card-body">
      <h5 class="card-title">{{ $ruang->nama_ruang }}</h5>
      <p class="card-text">Lokasi/Gedung : {{ $ruang->gedung_id }}</p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Panjang : {{ $ruang->panjang }}</li>
      <li class="list-group-item">Lebar : {{ $ruang->lebar }}</li>
      <li class="list-group-item">Keterangan : {{ $ruang->keterangan }}</li>
    </ul>
  </div>
</div>
@endsection
