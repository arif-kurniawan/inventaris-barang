@extends('layouts.content')

@section('content')
<div class="container">

    <h1>Pencarian Ruang</h1>
    <div class="card shadow mb-2">
        <div class="card-header py-2" >
            <b class="font-weight-bold text-primary mr-2" >Cetak Jumlah Barang Dalam Ruang</b><a href="{{ route('cetakruangbarang') }}" target="_blank" >
                <button class="btn btn-success" >Cetak</button>
            </a>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-2" >
            <div class="input-group" >
                <b class="font-weight-bold text-primary mr-2" >Cetak Kondisi Barang Dalam Ruang</b>
                <form action="{{ route('cetak_kondisibarang') }}" method="GET">
                    <select name="cari" class="custom-select" aria-placeholder="Pilih Ruang">
                        <option value="">Pilih Ruang</option>
                        @foreach ($daftar as $data)
                            <option value="{{ $data->nama_ruang }}">{{ $data->nama_ruang }}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-success m-2" type="submit" >Cetak</button>
                </form>
                </div>
        </div>
    </div>
    @csrf
    <h6>Pilih Ruang- Untuk Cek Kondisi Barang Dalam Ruang</h6>
        <form action="{{ route('search') }}" method="GET">
            <div class="input-group mb-3">
                {{-- <input type="text" class="form-control" name="cari" placeholder="Masukkan nama ruang"> --}}
                <select name="cari" class="form-control" aria-placeholder="Pilih Ruang">
                    <option value="">Pilih Ruang</option>
                    @foreach ($daftar as $data)
                        <option value="{{ $data->nama_ruang }}">{{ $data->nama_ruang }}</option>
                    @endforeach
                </select>
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </form>

        @if (isset($ruang))
        <table id="daftar" class="table">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah Baik</th>
                    <th>Jumlah Rusak Ringan</th>
                    <th>Jumlah Rusak Berat</th>
                    <th>Total</th>
                </tr>
            </thead>
            <h3 class=" d-inline-block text-primary p-2" >
                Daftar Ruang {{ $request->cari }}
            </h3>
            <tbody>
                @foreach ($ruang as $data)
                    <tr>
                        <td>{{ $data->jenis_barang }}</td>
                        <td>{{ $data->sum_a }}</td>
                        <td>{{ $data->sum_b }}</td>
                        <td>{{ $data->sum_c }}</td>
                        <td>{{ $data->sum_a + $data->sum_b + $data->sum_c }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>  


    {{-- <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Ruang</th>
                <th scope="col">Barang</th>
                <th scope="col">jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ruang as $ruangs )
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $ruangs->nama_ruang }}</td>
                <td>{{ $ruangs->jenis_barang }}</td>
                <td>{{ $ruangs->total }}</td>
            </tr>
            @endforeach
    </table> --}}

</div>
@endsection
