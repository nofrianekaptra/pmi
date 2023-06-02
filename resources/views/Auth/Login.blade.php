@extends('auth')
@section('content')
    <div class="container">
        <div class="row vh-100 d-flex align-items-center justify-content-center">
            <div class="col-md-6">
                <div class="card p-3">
                    <div class="card-body">
                        <form action="{{ route('loginOn') }}" method="POST" id="myform">
                            @csrf
                            <div class="mb-3">
                                <div class="mb-2">
                                    <label for="">Username / Email</label>
                                </div>
                                <div class="input-group ">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="bi bi-envelope-check"></i></span>
                                    <input type="username" class="form-control" name="username" placeholder="you@domain.com"
                                        value="{{ old('username') }}">
                                </div>
                                <x-error name="username" />
                            </div>
                            <div class="mb-3">
                                <div class="mb-2">
                                    <label for="">Password</label>
                                </div>
                                <div class="input-group ">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock"></i></span>
                                    <input name="password" type="password" class="form-control" placeholder="..."
                                        value="{{ old('password') }}">
                                </div>
                                <x-error name="password" />
                            </div>
                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                <button type="submit" class="submit btn btn-danger px-5" type="button">
                                    <span class="spinner-border spinner-border-sm hide" role="status"
                                        aria-hidden="true"></span>
                                    <span class="btn-txt">{{ __('Login') }}</span>
                                </button>
                                <span>Belum Punya Akun? <a href="{{ route('formReg') }}">Register</a></span>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <B><i class="bi bi-info-circle"></i> INFORMASI PENTING !</B> <br>
                                Jangan Berikan Email / Password Anda Kepada Siapapun Termasuk Kepada Staff SANDRA PMI
                                Dharmasraya.
                            </div>
                    </div>
                    </form>
                </div>
                <div class="mt-3 text-center">
                    <span>Kembali Ke <a href="/">Halaman Utama</a></span>
                </div>

            </div>
        </div>
    @endsection
