@extends('layouts.content')
@section('content')
    <h1>Data Produk</h1>
    <a href="{{ route('barang.create') }}" class="btn btn-success btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-check"></i>
        </span>
        <span class="text">Tambah Data</span>
    </a>
    <br>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Nama</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Satuan</th>
                <th>Kondisi</th>
                <th>Ruang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barang as $barangs )
            <tr>
                <td align="center" >{{ $loop->iteration }}</td>
                <td>{{ $barangs->nama_barang }}</td>
                <td align="center" >{{ $barangs->Stok }}</td>
                <td align="center" >{{ 'Rp.'.$barangs->harga }}</td>
                <td align="center" >{{ $barangs->satuan }}</td>
                <td align="center" >{{ $barangs->kondisi }}</td>
                <td align="center" >{{ $barangs->ruang_id }}</td>
                <td><a href="{{ route('products.show', $produk->id) }}"><button>Show</button></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
