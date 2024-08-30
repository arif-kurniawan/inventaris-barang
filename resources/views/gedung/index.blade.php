@extends('layouts.content')
@section('content');
<h1>Data Gedung</h1>
    <a href="{{ route('gedung.create') }}" class="btn btn-success btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-plus-circle"></i>
        </span>
        <span class="text">Tambah Gedung</span>
    </a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Gedung</h6>
        </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Gedung</th>
                <th>Lokasi</th>
                <th>Luas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gedung as $gedungs )
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $gedungs->nama_gedung }}</td>
                <td>{{ $gedungs->lokasi }}</td>
                <td>{{ $gedungs->luas }}</td>
                <td style="width:5px" >
                    <a href="{{ route('gedung.show', $gedungs->id) }}" class="btn btn-primary btn-circle btn-sm">
                        <i class="fas fa-info-circle"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
