<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Cetak Kartu ruang</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ public_path('bootstrap-5.0.2/css/bootstrap.min.css') }}">
</head>
<body>
    <table width="100%" cellspacing="0" cellpadding="5" >
        @foreach ($barang as $key => $data)
        @if (($key+1) % 2 == 1)
        <tr>
        @endif
            <td width="50%" >

    <table width="100%" border="1" cellspacing="0" cellpadding="5" >
        <tr>
            <td rowspan="4" width="25%" style="padding: 0; text-align: center; vertical-align: middle">
                <img src="{{ public_path('Logo Provinsi Jawa Timur.png') }}" width="50" height="auto" alt="">
            </td>
            <td colspan="2" style="text-align: center">
                <h3>{{ $data->jenisbarang->sumber_dana }}</h3>
            </td>
        </tr>
        <tr>
            <td width="50%" style="text-align: center" class="bg-danger">
                <h4 style="color: #fff" >KODE RUANG</h4>
            </td>
            <td width="50%" style="text-align: center" class="bg-primary">
                <h4 style="color: #fff">NO URUT</h4>
            </td>
        </tr>
        <tr>
            <td colspan="2" width="50%" style="text-align: center; vertical-align: middle; font-weight: bold; font-size: 15px">
                <p class="text-bold">{{ $data->kode_barang }}</p>
            </td>

        </tr>
        <tr>
            <td class="bg-warning" style="text-align: center">
                <p style="text-bold; font-weight: bold; font-size:8px;">SMK NEGERI 9 MALANG</p>
            </td>
            <td class="bg-Primary" style="text-align: center">
                <p style="text-bold; font-weight: bold; font-size:10px;">{{ $data->jenisbarang->jenis_barang }}</p>
            </td>
        </tr>
        <tr>
            <td class="bg-danger" style="text-align: center">
                <h4>{{ $data->ruang->nama_ruang }}</h4>
            </td>
            <td colspan="2" class="bg-secondary" style="text-align: center">
                <h4>{{ $data->jenisbarang->keterangan }}</h4>
            </td>
        </tr>
        <!-- Empty Row for Spacing -->
        <tr>
            <td colspan="3"></td>
        </tr>
    </table>
</td>
@if (($key + 1) % 2 == 0)
</tr>
@endif
@endforeach
</table>
</body>
</html>
