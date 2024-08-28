@extends('layouts.content')
@section('content')
<div class="card-group" >
<div class="card" style="width: 1rem" >
    <img style="width: 15rem; height: auto" src="{{ asset('storage/'. $barang->gambar) }}" class="img-thumbnail" alt="...">
    
    <div class="card-body">
      <h5 class="card-title">Kode : {{ $barang->kode_barang }}</h5>
    </div>
</div>
<div class="card">
    <div class="card-body">
      <h5 class="card-title">{{ $barang->nama_barang }}</h5>
      <p class="card-text">{{ $barang->ruang->keterangan }}</p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Stock : {{ $barang->stok }}</li>
      <li class="list-group-item">Kondisi : {{ $barang->kondisi }}</li>
      <li class="list-group-item">Harga : {{ $barang->harga }} / Satuan : {{ $barang->satuan }}</li>
    </ul>
  </div>
</div>
@endsection
