@extends('layouts.content')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Download Excel</div>
                <div class="card-body">
                    <div class="card shadow mb-2">

                        <div class="card-header py-2 d-flex justify-content-between" >
                            <b class="font-weight-bold text-primary mr-2" >jenis Barang</b>
                            <a href="{{ route('cetakjenisbarang') }}" target="_blank" >
                                <button class="btn btn-success" >Download</button>
                            </a>
                        </div>
                        <div class="card-header py-2 d-flex justify-content-between" >
                            <b class="font-weight-bold text-primary mr-2" >Jumlah Barang Dalam Ruang</b>
                            <a href="{{ route('cetakruangbarang') }}" target="_blank" >
                                <button class="btn btn-success" >Download</button>
                            </a>
                        </div>

                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-2 " >
                            <div class="input-group" >
                                <b class="font-weight-bold text-primary mr-5" >Kondisi Barang Berdasarkan Ruang</b>
                                <form action="{{ route('cetak_kondisibarang') }}" method="GET">
                                    <select name="cari" class="custom-select" aria-placeholder="Pilih Ruang">
                                        <option value="">Pilih Ruang</option>
                                        @foreach ($daftar as $data)
                                            <option value="{{ $data->nama_ruang }}">{{ $data->nama_ruang }}</option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-success m-2" type="submit" >Download</button>
                                </form>
                                </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>
@endsection
