@extends('layouts.content')
@section('content')
    <h1>Data Barang</h1>
    <a href="{{ route('barang.create') }}" class="btn btn-success btn-icon-split mb-4">
        <span class="icon text-white-50">
            <i class="fas fa-plus-circle"></i>
        </span>
        <span class="text">Tambah Data</span>
    </a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar <b>Barang</b></h6>
        </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kode</th>
                <th>Harga</th>
                <th>Kondisi</th>
                <th>Ruang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barang as $barangs )
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $barangs->jenisbarang->jenis_barang }}</td>
                <td>{{ $barangs->kode_barang }}</td>
                <td>{{ 'Rp.'.$barangs->jenisbarang->harga }}</td>
                <td>{{ $barangs->kondisi }}</td>
                <td>{{ $barangs->ruang->nama_ruang }}</td>
                <td style="width:5px" >
                    <a href="{{ route('barang.show', $barangs->id) }}" class="btn btn-primary btn-circle btn-sm">
                        <i class="fas fa-info-circle"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
