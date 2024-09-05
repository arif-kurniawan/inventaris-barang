@extends('layouts.content')
@section('style')
<style>
.wrapper{
width:200px;
padding:20px;
height: 150px;
}
</style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Kartu Ruang</div>
                <div class="card-body">

                    <form action="{{ route('caricetak') }}" method="POST">
                    <div class="input-group">
                        @csrf
                        <select class="custom-select" name="sumberdana" id="sumberdana" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                          <option value="" selected>Pilih Sumber Dana</option>
                          @foreach ($sumber as $sumbers )
                          <option value="{{ $sumbers->nama_sumber_dana }}">{{ $sumbers->nama_sumber_dana }}</option>
                          @endforeach
                        </select>

                        <select class="custom-select" name="namaruang" id="namaruang" onfocus='this.size=8;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                          <option value="" selected>Pilih Ruang</option>
                          @foreach ($ruang as $data )
                          <option value="{{ $data->nama_ruang }}">{{ $data->nama_ruang }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="card-footer" ><div class="input-group">
                        <button class="btn btn-success" type="submit">Cetak</button>
                    </div></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
