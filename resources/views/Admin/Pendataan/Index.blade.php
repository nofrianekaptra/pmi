@extends('admin', ['title' => 'Pendataan Data Darah'])
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3">
                <a href="{{ route('pendataan.darahmasuk') }}" class="btn btn-danger">Keola Pendataan Darah Masuk</a>
                <a href="{{ route('pendataan.darahkeluar') }}" class="btn btn-outline-danger">Keola Pendataan Darah Keluar</a>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-danger">DataTables Pendataan Darah</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Pendonor</th>
                                    <th>Golongan Darah</th>
                                    <th>Qty ( Darah Masuk )</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($p as $pendataan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pendataan->user->name }}</td>
                                        <td>{{ $pendataan->kategori->jenis_d }}</td>
                                        <td>{{ $pendataan->qty }}</td>
                                        <td class="d-flex justify-content-start align-middle">
                                            <a href="" class="btn btn-dark btn-sm mr-2">Edit</a>
                                            <form action="" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
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
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-danger">DataTables Pendataan Keluar</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Penerima</th>
                                    <th>Golongan Darah</th>
                                    <th>Qty ( Darah DiButuhkan )</th>
                                    <th>Status Pasien</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pen as $penerima)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $penerima->nama_penerima }}</td>
                                        <td>{{ $penerima->kategori->jenis_d }}</td>
                                        <td>{{ $penerima->qty }}</td>

                                        <td>
                                            @if ($penerima->status == 'Pending')
                                                <span class="btn btn-danger btn-sm">{{ $penerima->status }}</span>
                                                &mdash;
                                                <a href="{{ route('pendataan.darahkeluarstoreendproses', $penerima->id) }}"
                                                    class="btn btn-outline-danger btn-sm">Selesaikan Proses</a>
                                            @else
                                                <span class="btn btn-dark btn-sm">Selesai</span>
                                            @endif
                                        </td>
                                        <td class="d-flex justify-content-start align-middle">
                                            <a href="" class="btn btn-outline-danger btn-sm ">Detail</a>
                                            <a href="" class="btn btn-dark btn-sm mx-2">Edit</a>
                                            <form action="" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        <div class="alert alert-danger" role="alert">
                            <b>INFORMASI PENTING</b>
                            <ul>
                                <li>Jika Muncul Status <span class="btn btn-danger btn-sm">Pending</span> Maka Proses Pasien
                                    Belum Selesai (Kekurangan Darah)</li>
                                <li>Jika Status Pasien Berubah Menjadi <span class="btn btn-dark btn-sm">Selesai</span>
                                    Maka Semua Urusan
                                    Pasien Telah Selesai</li>
                                <li>Klik Tombol <a href="#" class="btn btn-outline-danger btn-sm">Selesaikan
                                        Proses</a> Jika Stok Darah Tercukupi</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
@push('js')
    <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>
@endpush
