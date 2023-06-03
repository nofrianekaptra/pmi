@extends('admin', ['title' => 'Pendataan Data Darah Keluar'])
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-danger">Pendataan Darah Keluar</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('pendataan.darahkeluarstore') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="" class="form-label">Nama Penerima</label>
                                    <input type="text" class="form-control" name="nama_penerima" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="" class="form-label">NIK ( Nomor Induk Kependudukan )</label>
                                    <input type="text" class="form-control" name="nik" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="" class="form-label">No HP ( Yang Bisa DiHubungi )</label>
                                    <input type="text" class="form-control" name="nohp" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Kondisi Penerima</label>
                            <textarea type="text" class="form-control" name="desk_kondisi" required rows="5"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Batas Tanggal Penerima Donor</label>
                            <input type="date" class="form-control" name="batas_tgl" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Golongan Darah</label>
                            <select name="kategori_id" class="form-control" required>
                                <option disabled selected>Pilih Golongan</option>
                                @foreach ($kat as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->jenis_d }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Qty ( Jumlah Darah Yang Dibutuhkan )</label>
                            <input type="number" class="form-control" name="qty" required>
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
