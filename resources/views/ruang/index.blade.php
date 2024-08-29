@extends('layouts.content')
@section('content');
<h1>Data Ruang</h1>
    <a href="{{ route('ruang.create') }}" class="btn btn-success btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-plus-circle"></i>
        </span>
        <span class="text">Tambah Ruang Kelas</span>
    </a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Ruang</h6>
        </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Ruang</th>
                <th>Lokasi/Gedung</th>
                <th>Panjang</th>
                <th>Lebar</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ruang as $ruangs )
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ruangs->nama_ruang }}</td>
                <td>{{ $ruangs->gedung_id }}</td>
                <td>{{ $ruangs->panjang }}</td>
                <td>{{ $ruangs->lebar }}</td>
                <td>{{ $ruangs->keterangan }}</td>
                <td style="width:5px" >
                    <a href="{{ route('ruang.show', $ruangs->id) }}" class="btn btn-primary btn-circle btn-sm">
                        <i class="fas fa-info-circle"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
