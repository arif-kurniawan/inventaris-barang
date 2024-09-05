<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ public_path('bootstrap-5.0.2/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container" >
        <div class="row">
            @foreach ($barang as $data)
            <div class="col-6 mt-2 mb-1 ml-1 border">
                <div class="card px-2 overflow-hidden border-dark">
                    <div class="row" style="margin: 0px !important">
                        <div class="col-3 p-0">
                            <img src="{{ public_path('Logo Provinsi Jawa Timur.png') }}" width="100px" height="150px" alt="">
                        </div>
                        <div class="col-9 p-0 ">
                            <h2 class="text-center" >{{ $data->jenisbarang->sumber_dana }}</h2>
                            <div class="row p-0">
                                <div class="col-6 bg bg-danger p-0">
                                    <h4 class="text-center" text-white >KODE RUANG</h4>
                                </div>
                                <div class="col-6 bg bg-primary p-0">
                                    <h4 class="text-center" text-white >NO URUT</h4>
                                </div>
                            </div>
                            <div class="mt-1 mb-1" >
                                <p class="text-center fs-5" style="font-weight: bold;" >
                                    {{ $data->kode_barang }}
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-6 bg bg-warning">
                                    <h6 class="text-center" >
                                        SMK NEGERI 9 MALANG
                                    </h6>
                                </div>
                                <div class="col-6" >
                                    <h5 class="text-center">
                                        {{ $data->jenisbarang->jenis_barang }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3 bg bg-danger p-0">
                            <h4 class="text-center text-white" >
                                {{ $data->ruang->nama_ruang }}
                            </h4>
                        </div>
                        <div class="col-9 bg bg-secondary p-0">
                            <h4 class="text-center text-dark">
                                {{ $data->jenisbarang->keterangan }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
