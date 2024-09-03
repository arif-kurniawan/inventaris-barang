@extends('layouts.content')
@section('content')
    <h1>Data Barang</h1>
    <a href="{{ route('jenisbarang.create') }}" class="btn btn-success btn-icon-split mb-4">
        <span class="icon text-white-50">
            <i class="fas fa-plus-circle"></i>
        </span>
        <span class="text">Tambah Data</span>
    </a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar <b>Jenis Barang</b></h6>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3" >
                <b>Cetak jenis Barang</b><a href="{{ route('cetakjenisbarang') }}" target="_blank" ><button class="btn btn-warning" >Cetak</button></a>
            </div>
        </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Keterangan</th>
                <th>Sumber Dana</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jbarang as $jbarangs )
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $jbarangs->jenis_barang }}</td>
                <td>{{ 'Rp.'.$jbarangs->harga }}</td>
                <td>{{ $jbarangs->keterangan }}</td>
                <td>{{ $jbarangs->sumber_dana }}</td>
                <td style="width:5px" >
                    <a href="{{ route('jenisbarang.show', $jbarangs->id) }}" class="btn btn-primary btn-circle btn-sm">
                        <i class="fas fa-info-circle"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
