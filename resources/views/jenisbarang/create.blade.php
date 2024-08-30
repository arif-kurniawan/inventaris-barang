@extends('layouts.content')
@section('content')
<form action="{{ route('jenisbarang.store') }}" id="myForm" method="POST" enctype="multipart/form-data" >
  @csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="">Nama Jenis Barang</label>
      <input type="text" name="jenis_barang" class="form-control">
      @error('jenis_barang')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="">Harga</label>
      <input type="text" name="harga" class="form-control">
      @error('harga')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="">Keterangan</label>
      <textarea type="" name="keterangan" class="form-control"></textarea>
      @error('keterangan')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      {{-- <div class="custom-file"> --}}
        <input name="gambar" type="file" class="form-control" required>
        {{-- <label class="custom-file-label" for="validatedInputGroupCustomFile">Choose file...</label>
      </div> --}}
    </div>
  </div>
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#verifyModal">ADD Jenis Barang</button>
</form>

<div class="modal fade" id="verifyModal" tabindex="-1" role="dialog" aria-labelledby="verifyModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="verifyModalLabel">Verify Submission</h5>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin ingin tambah Jenis Barang ini?</p>
        </div>
      <div class="modal-footer d-flex justify-content-center align-items-center">
        <button type="submit" form="myForm" class="btn btn-success">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
