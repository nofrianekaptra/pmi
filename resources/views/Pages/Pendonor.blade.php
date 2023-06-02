@extends('welcome')
@section('content')
    <div class="jumbotron  text-white">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class=" text-center ">
                    <h1 class="display-4 fw-bold">
                        <i><u>Katalog : Pendonor</u></i>
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
                @if ($cek_pendonor)
                    <div class="alert alert-danger border-0 shadow-sm" role="alert">
                        <b><i class="bi bi-info-circle"></i> INFORMASI</b> : Anda Telah Terdaftar Sebagai Pendonor,
                        Terimakasih Atas Kerjasamanya.
                    </div>
                @else
                    @auth
                        <div class="mb-3">
                            <button type="submit" class="btn btn-danger" id="btn-pendonor">Daftar Sebagai Pendonor</button>
                        </div>
                    @endauth
                    @guest
                        <div class="alert alert-danger border-0 shadow-sm" role="alert">
                            <b><i class="bi bi-info-circle"></i> INFORMASI</b> : Anda belum login , klik <a
                                href="{{ route('formLogin') }}">Login</a> Untuk melanjutkan
                        </div>
                    @endguest
                @endif
                <div class="card border-danger">
                    <div class="card-body p-5">
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nomor Induk Kependudukan ( NIK )</th>
                                    <th scope="col">Pendonor</th>
                                    <th scope="col">No HP</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($p as $pendonor)
                                    <tr id="index_{{ $pendonor->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ Str::of($pendonor->nik)->limit(5, ' (...)') }}</td>
                                        <td>{{ $pendonor->user->name }}</td>
                                        <td>{{ Str::of($pendonor->nohp)->limit(5, ' (...)') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade " id="modal-create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Daftar Sebagai Pendonor</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('pendonor.store') }}" method="POST">
                    @csrf
                    <div class="modal-body ">
                        <div class="mb-3">
                            <div class="mb-2">
                                <label for="">Nomor Induk Kependudukan ( NIK )</label>
                            </div>
                            <div class="input-group ">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-check"></i></span>
                                <input type="text" class="form-control" id="nik">
                            </div>
                            <div class="text-danger" role="alert" id="alert-nik"></div>
                        </div>
                        <div class="mb-3">
                            <div class="mb-2">
                                <label for="">Nomor HP</label>
                            </div>
                            <div class="input-group ">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone"></i></span>
                                <input type="text" class="form-control" id="nohp">
                            </div>
                            <div class="text-danger" role="alert" id="alert-nohp"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-danger" id="store">Daftar</button>
                    </div>
                </form>
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
        let table = new DataTable('#myTable');
        //button create post event
        $('body').on('click', '#btn-pendonor', function() {
            //open modal
            $('#modal-create').modal('show');
        });

        //action create post
        $('#store').click(function(e) {
            e.preventDefault();

            //define variable
            let nik = $('#nik').val();
            let nohp = $('#nohp').val();
            let token = $("meta[name='csrf-token']").attr("content");

            //ajax
            $.ajax({

                url: `/pendonor`,
                type: "POST",
                cache: false,
                data: {
                    "nik": nik,
                    "nohp": nohp,
                    "_token": token
                },
                success: function(response) {
                    Swal.fire({
                        type: 'success',
                        icon: 'success',
                        title: `${response.message}`,
                        showConfirmButton: false,
                        timer: 2500
                    }).then((result) => {
                        location.reload();
                    });
                },
                error: function(error) {

                    if (error.responseJSON.nik[0]) {

                        //show alert
                        $('#alert-nik').removeClass('d-none');
                        $('#alert-nik').addClass('d-block');

                        //add message to alert
                        $('#alert-nik').html(error.responseJSON.nik[0]);
                    }

                    if (error.responseJSON.nohp[0]) {

                        //show alert
                        $('#alert-nohp').removeClass('d-none');
                        $('#alert-nohp').addClass('d-block');

                        //add message to alert
                        $('#alert-nohp').html(error.responseJSON.nohp[0]);
                    }


                }

            });

        });
    </script>
@endpush
