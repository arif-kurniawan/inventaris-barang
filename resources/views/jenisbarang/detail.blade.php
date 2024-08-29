@extends('layouts.content')
@section('content')
<div class="d-sm-flex align-items-center mb-4" >
    <a href="{{ route('jenisbarang.edit', $jenisbarang->id) }}" class="btn btn-primary btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-edit"></i>
        </span>
        <span class="text">Edit Data</span>
    </a>
    <form action="{{ route('jenisbarang.destroy', $jenisbarang->id) }}"method="POST">
        @method('DELETE')
        @csrf
        <button class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-trash"></i>
            </span>
            <span class="text" >Hapus</span></button>
    </form>
</div>

<div class="card-group" >
<div class="card d-flex flex-column justify-content-center align-items-center" style="width: 1rem;" >
    <img style="width: 15rem; height:auto" src="{{ asset('storage/'. $jenisbarang->gambar) }}" class="img-thumbnail" alt="...">

</div>
<div class="card">
    <div class="card-body">
      <h5 class="card-title">{{ $jenisbarang->nama_barang }}</h5>
      <label for="">Keterangan :</label><p class="card-text">{{ $jenisbarang->keterangan }}</p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Harga : {{ $jenisbarang->harga }}</li>
    </ul>
  </div>
</div>
@endsection
