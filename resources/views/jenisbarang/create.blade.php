@extends('layouts.content')

@section('content')
<form action="{{ route('jenisbarang.store') }}" id="myForm" method="POST" enctype="multipart/form-data" >
  @csrf
  <div class="form-row">
    <div class="form-group col-md-6">
        <input type="text" class="form-control" name="kode_jenis" id="kode_jenis" value="" readonly>
        <input type="text" id="nama_jenis" class="form-control"
                    placeholder="Ketik nama barang" required />
                <div id="barangList"></div>

    </div>
  </div>
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
      <label for="">Sumber Dana</label>
        <select name="sumber_dana" id="sumber_dana" class="form-control">
          <option selected>Pilih Sumber Dana</option>
              @foreach ($sumber_dana as $sumber_danas)
           <option value="{{ $sumber_danas->nama_sumber_dana }}">{{ $sumber_danas->nama_sumber_dana }}</option>
            @endforeach
        </select>
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

        <input name="gambar" type="file" class="form-control" required>

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
@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('#nama_jenis').keyup(function() {
            var query = $(this).val();
            console.log(query);

            if (query != '') {
                var _token = $('input[name="csrf-token"]').val();
                $.ajax({
                    url: '/autocomplete',
                    method: "GET",
                    data: {
                        query: query,
                        _token: _token
                    },
                    success: function(data) {
                        $('#barangList').fadeIn();
                        $('#barangList').html(data);
                    }
                });
            }
        });

        $(document).on('click', 'li', function() {
            $('#kode_jenis').val($(this).data('kode'));
            $('#nama_jenis').val($(this).text());
            $('#barangList').fadeOut();

        });

    });

</script>

@endsection
