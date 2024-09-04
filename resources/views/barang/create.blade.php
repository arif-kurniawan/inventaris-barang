@extends('layouts.content')
@section('content')
<form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data" >
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <input type="hidden" class="form-control" name="jenis_barang_id" id="jenis_barang_id" value="">
            <input type="text" id="jenis_barang" class="form-control"
                        placeholder="Ketik jenis barang" required />
                    <div id="barangList"></div>
        </div>
        </div>
    <div class="form-row">
        <div class="form-group col-md-6">
          <label for="">Kode Barang</label>
          <input type="text" id="kode_barang" name="kode_barang" class="form-control">
        </div>
      </div>
    <div class="form-row">
        <div class="form-group col-md-4">
          <label for="">Kondisi</label>
          <select name="kondisi" id="" class="form-control">
            <option selected>Pilih...</option>
            <option value="Baik">Baik</option>
            <option value="Rusak Ringan">Rusak Ringan</option>
            <option value="Rusak Berat">Rusak Berat</option>
          </select>
        </div>
      </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="">Ruang</label>
        <select name="ruang_id" id="" class="form-control">
          <option selected>Pilih...</option>
            @foreach ($ruang as $ruangs )
          <option value="{{ $ruangs->id }}">{{ $ruangs->nama_ruang }}</option>
            @endforeach
        </select>
      </div>
    </div>
    <button type="submit" class="btn btn-success">ADD Barang</button>
  </form>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('#jenis_barang').keyup(function() {
            var query = $(this).val();
            console.log(query);

            if (query != '') {
                var _token = $('input[name="csrf-token"]').val();
                $.ajax({
                    url: '/autocompletebarang',
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
            $('#jenis_barang_id').val($(this).data('kode'));
            $('#jenis_barang').val($(this).text());
            $('#barangList').fadeOut();

            let id = $(this).data('kode');
            $.ajax({
            url: "{{ route('getkode') }}",
            type: "GET",
            data: {
                id:id
            },
            success: function(data) {
                console.log(data)
                $('#kode_barang').val(data?.kode_jenis?.kode_jenis? data?.kode_jenis?.kode_jenis+'-':'-')
            }
        });

        });

    });

</script>
{{-- <script type="text/javascript">
    $('#jenis_barang_id').on('input', function() {
        var id = $(this).val();
        console.log(id)
        $.ajax({
            url: "{{ route('getkode') }}",
            type: "GET",
            data: {
                id:id
            },
            success: function(data) {
                console.log(data)
                $('#kode_barang').val(data?.kode_jenis?.kode_jenis? data?.kode_jenis?.kode_jenis+'-':'-')
            }
        });
    })
</script> --}}
@endsection
