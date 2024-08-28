
@extends('layouts.content')

@section('content')
<H2>Form Barang</H2>
    <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data" >
        @csrf
        <label for="">Nama</label>
        <input type="text" name="nama" value="{{ old('nama') }}" />
        @error('nama')
            <div>{{ $message }}</div>
        @enderror
        <br>
        <label for="">Gambar</label>
        <input type="file" name="gambar"/>
        @error('gambar')
            <div>{{ $message }}</div>
        @enderror
        <br>
        <label for="">Kategori</label>
        <select name="category_id" id="category">
            <option value="">--Pilih</option>
            @foreach ($category as $categor )
            <option value="{{ $categor->id }}">{{ $categor->nama }}</option>
            @endforeach
          </select>
          @error('category_id')
            <div>{{ $message }}</div>
        @enderror
        <br>
        <button>Add</button>
    </form>
@endsection
