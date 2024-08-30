@extends('layouts.content')

@section('content')
<div class="container">

    <h1>Pencarian Ruang</h1>
    @csrf
        <form action="{{ route('search') }}" method="GET">
            <div class="input-group mb-3">
                {{-- <input type="text" class="form-control" name="cari" placeholder="Masukkan nama ruang"> --}}
                <select name="cari" class="form-control" aria-placeholder="Pilih Ruang">
                    <option value="">Pilih Ruang</option>
                    @foreach ($daftar as $data)
                        <option value="{{ $data->nama_ruang }}">{{ $data->nama_ruang }}</option>
                    @endforeach
                </select>
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
            </div>
        </form>

        @if (isset($ruang))
        <table id="daftar" class="table">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <h3 class=" d-inline-block text-primary p-2" >
                Daftar Ruang {{ $request->cari }}
            </h3>
            <tbody>
                @foreach ($ruang as $data)
                    <tr>
                        <td>{{ $data->jenis_barang }}</td>
                        <td>{{ $data->total }}</td>
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
