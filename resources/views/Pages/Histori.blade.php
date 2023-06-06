@extends('welcome')
@section('content')
    <div class="jumbotron  text-white">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class=" text-center ">
                    <h1 class="display-4 fw-bold">
                        <i><u>Katalog : Historiku</u></i>
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

                <div class="card border-danger">
                    <div class="card-body p-5">
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nomor Induk Kependudukan ( NIK )</th>
                                    <th scope="col">Pendonor</th>
                                    <th scope="col">No HP</th>
                                    <th scope="col">Golongan Darah</th>
                                    <th scope="col">Tanggal Donor Darah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pen as $pendataan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pendataan->user->nik }}</td>
                                        <td>{{ $pendataan->user->name }}</td>
                                        <td>{{ $pendataan->user->nohp }}</td>
                                        <td>{{ $pendataan->kategori->jenis_d }} </td>
                                        <td>{{ $pendataan->created_at->isoFormat('dddd, D MMMM Y') }}</td>
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

{{-- @push('css')
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
@endpush --}}
