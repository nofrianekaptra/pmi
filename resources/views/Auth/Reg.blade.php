@extends('auth')
@section('content')
    <div class="container">
        <div class="row vh-100 d-flex align-items-center justify-content-center">
            <div class="col-md-6">
                <div class="card p-3">
                    <div class="card-body">
                        <form action="{{ route('regOn') }}" method="POST" id="myform">
                            @csrf
                            <div class="mb-3">
                                <div class="mb-2">
                                    <label for="">Name</label>
                                </div>
                                <div class="input-group ">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="bi bi-person-check"></i></span>
                                    <input type="text" class="form-control" name="name" placeholder="Jane Doe"
                                        value="{{ old('name') }}">
                                </div>
                                <x-error name="username" />
                            </div>
                            <div class="mb-3">
                                <div class="mb-2">
                                    <label for="">Username</label>
                                </div>
                                <div class="input-group ">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="bi bi-person-lock"></i></span>
                                    <input type="text" class="form-control" name="username" placeholder="janedoe"
                                        value="{{ old('username') }}">
                                </div>
                                <x-error name="username" />
                            </div>
                            <div class="mb-3">
                                <div class="mb-2">
                                    <label for="">Email</label>
                                </div>
                                <div class="input-group ">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="bi bi-envelope-check"></i></span>
                                    <input type="email" class="form-control" name="email" placeholder="you@domain.com"
                                        value="{{ old('email') }}">
                                </div>
                                <x-error name="email" />
                            </div>

                            <div class="mb-3">
                                <div class="mb-2">
                                    <label for="">Password</label>
                                </div>
                                <div class="input-group ">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock"></i></span>
                                    <input name="password" type="password" class="form-control" placeholder="...">
                                </div>
                                <x-error name="password" />
                            </div>

                            <div class="mb-3">
                                <div class="mb-2">
                                    <label for="">Password Konfirmasi</label>
                                </div>
                                <div class="input-group ">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock"></i></span>
                                    <input name="password_confirmation" type="password" class="form-control"
                                        placeholder="...">
                                </div>
                                <x-error name="password_confirmation" />
                            </div>

                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                <button type="submit" class="submit btn btn-danger px-5" type="button">
                                    <span class="spinner-border spinner-border-sm hide" role="status"
                                        aria-hidden="true"></span>
                                    <span class="btn-txt">{{ __('Register') }}</span>
                                </button>
                                <span>Sudah Punya Akun? <a href="{{ route('formLogin') }}">Login</a></span>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <B><i class="bi bi-info-circle"></i> INFORMASI PENTING !</B> <br>
                                Jangan Berikan Email / Password Anda Kepada Siapapun Termasuk Kepada Staff SANDRA
                                PMI
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
