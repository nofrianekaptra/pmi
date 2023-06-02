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
@endsection
