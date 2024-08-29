@extends('layouts.content')
@section('content')
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
