@extends('admin', ['title' => 'Pendataan Data Darah Masuk'])
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-danger">Pendataan Darah Masuk</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('pendataan.update', $pendataan->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="mb-3">
                            <label for="" class="form-label">Pendonor</label>
                            <select name="user_id" class="form-control" required>
                                @foreach ($donor as $pendonor)
                                    <option {{ $pendonor->id == $pendataan->user_id ? 'selected' : null }}
                                        value="{{ $pendonor->id }}">{{ $pendonor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Golongan Darah</label>
                            <select name="kategori_id" class="form-control" required>
                                <option disabled selected>Pilih Golongan</option>
                                @foreach ($kat as $kategori)
                                    <option {{ $kategori->id == $pendataan->kategori_id ? 'selected' : null }}
                                        value="{{ $kategori->id }}">{{ $kategori->jenis_d }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Qty ( Jumlah Yang DiTerima )</label>
                            <input type="number" class="form-control" name="qty" required
                                value="{{ $pendataan->qty }}">
                            <input type="hidden" name="stock_lama" value="{{ $pendataan->qty }}">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-danger">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
