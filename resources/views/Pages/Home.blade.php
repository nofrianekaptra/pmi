@extends('welcome')
@section('content')
    <div class="jumbotron  text-white">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-8 text-center text-lg-start text-md-start">
                    <h1 class="display-4 fw-bold">
                        <i><u>SANDRA</u></i>
                    </h1>
                    <p class="lead">
                        Sistem Informasi Donor Darah PMI Dharmasraya (SANDRA)
                    </p>
                    <hr class="my-4">
                    <p>Selamat datang di <b>SANDRA PMI Dharmasraya</b>, Website ini merupakan sebagai wadah informasi untuk
                        segala
                        sesuatu yang berurusan dengan Darah</p>
                </div>
                <div class="col-md-4 text-center text-lg-end text-md-end d-none d-md-block">
                    <img src="{{ asset('asset/donation_thm.svg') }}"
                        alt="Sistem Informasi Donor Darah PMI Dharmasraya (SANDRA)" class="img-fluid"
                        style="max-height: 350px">
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: -50px">
        <div class="row d-flex justify-content-center">
            @foreach ($kat as $kategori)
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card    border-bottom border-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs text-uppercase mb-1">
                                        GOLONGAN DARAH <span class="text-danger fw-bold"> {{ $kategori->jenis_d }}</span>
                                    </div>
                                    <div class="h5 mb-0 fw-bold text-gray-800">STOK
                                        <span class="text-danger">{{ $kategori->stock_darah }}</span>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-box2-heart-fill" style="font-size: 50px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <section class="py-3">
        <div class="container">
            <div class="mb-3">
                <h3>Pasien Membutuhkan Bantuan Anda.</h3>
            </div>
            <div class="row">
                @forelse ($pen as $penerima)
                    <div class="col-md-4">
                        <div class="card border-danger h-100">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Nama Pasien</span>
                                        <span class="fw-bold text-danger">{{ $penerima->nama_penerima }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Golongan Darah</span>
                                        <span class="fw-bold text-danger">{{ $penerima->kategori->jenis_d }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Jumlah Yang Dibutuhkan</span>
                                        <span class="fw-bold text-danger">{{ $penerima->qty }} Kantong Darah</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Batas Tanggal</span>
                                        <span
                                            class="fw-bold text-danger">{{ $penerima->batas_tgl->isoFormat('dddd, D MMM Y') }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Kondisi Pasien : {{ $penerima->desk_kondisi }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-danger" role="alert">
                        Untuk saat ini pasien tidak tersedia.
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
