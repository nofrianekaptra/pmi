@extends('welcome')
@section('content')
    <div class="jumbotron  text-white">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class=" text-center ">
                    <h1 class="display-4 fw-bold">
                        <i><u>Katalog : Pasien PMI</u></i>
                    </h1>
                    <p class="lead">
                        Sistem Informasi Donor Darah PMI Dharmasraya (SANDRA)
                    </p>
                    <hr class="my-4">
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="alert alert-danger border-0 shadow-sm" role="alert">
                    Bantuan anda untuk mereka sangat berarti, setiap darah yang anda berikan merupakan kontribusi terbaik
                    bagi mereka yang membutuhkan, mari bersama <b>PMI Dharmasraya</b> membantu kepada mereka yang
                    membutuhkan.
                </div>
                <div class="card border-danger">
                    <div class="card-body p-5">
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nomor Induk Kependudukan ( NIK )</th>
                                    <th scope="col">Nama Pasien</th>
                                    <th scope="col">Golongan Darah</th>
                                    <th scope="col">Jumlah Darah Yang DiButuhkan</th>
                                    <th scope="col">Status Pasien</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pen as $penerima)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ Str::of($penerima->nik)->limit(5, ' (...)') }}</td>
                                        <td>{{ $penerima->nama_penerima }}</td>
                                        <td>{{ $penerima->kategori->jenis_d }}</td>
                                        <td>{{ $penerima->qty }}</td>
                                        <td>
                                            @if ($penerima->status == 'Pending')
                                                <span>Masih Dalam Pengobatan</span>
                                            @else
                                                <span>Selesai</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet" />
@endpush
@push('js')
    <script src="{{ asset('jq.js') }}"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
    <script>
        $('#myTable').dataTable({
            "pageLength": 25
        });
    </script>
@endpush
