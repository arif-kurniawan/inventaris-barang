@extends('layouts.content')
@section('content');
<h1>Data Sumber Dana</h1>
    <a href="{{ route('sumber_dana.create') }}" class="btn btn-success btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-plus-circle"></i>
        </span>
        <span class="text">Tambah Sumber Dana</span>
    </a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Sumber Dana</h6>
        </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Sumber Dana</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sumber_dana as $sumber_danas)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $sumber_danas->nama_sumber_dana }}</td>
                <td>{{ $sumber_danas->deskripsi }}</td>
                <td style="width:5px" >
                    <a href="{{ route('sumber_dana.show', $sumber_danas->id) }}" class="btn btn-primary btn-circle btn-sm">
                        <i class="fas fa-info-circle"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
