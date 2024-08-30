@extends('layouts.content')
@section('content')
<div class="d-sm-flex align-items-center mb-4" >
    <a href="{{ route('gedung.edit', $gedung->id) }}" class="btn btn-primary btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-edit"></i>
        </span>
        <span class="text">Edit Data</span>
    </a>
    <form action="{{ route('gedung.destroy', $gedung->id) }}"method="POST">
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
      <img style="width: 15rem; height: auto" src="{{ asset('storage/'.$gedung->id) }}" class="img-thumbnail" alt="...">
      
      <div class="card-body">
        <h5 class="card-title">{{ $gedung->nama_gedung }}</h5>
      </div>
  </div>
  <div class="card">
      <ul class="list-group list-group-flush">
      <li class="list-group-item">ID Gedung : {{ $gedung->id }}</li>
        <li class="list-group-item">Lokasi : {{ $gedung->lokasi }}</li>
        <li class="list-group-item">Luas : {{ $gedung->luas }}</li>
      </ul>
    </div>
</div>
@endsection
