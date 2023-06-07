@extends('admin', ['title' => 'Pendataan Data Darah'])
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3">
                <a href="{{ route('pendataan.darahmasuk') }}" class="btn btn-danger">Keola Pendataan Darah Masuk</a>
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
                                    <th>No HP</th>
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
                                        <td>{{ $pendataan->user->nohp }}</td>
                                        <td>{{ $pendataan->user->name }}</td>
                                        <td>{{ $pendataan->kategori->jenis_d }}</td>
                                        <td>{{ $pendataan->qty }}</td>
                                        <td class="d-flex justify-content-start align-middle">
                                            <a href="{{ route('pendataan.edit', $pendataan->id) }}"
                                                class="btn btn-dark btn-sm mr-2">Edit</a>
                                            <form action="{{ route('pendataan.delete', $pendataan->id) }}" method="post">
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
            <div class="alert alert-danger" role="alert">
                <b>INFORMASI PENTING</b>
                <ul>
                    <li>Diharapkan ketelitian anda untuk menginput stok darah masuk (pendonor) karena bisa membahayakan
                        perhitungan laporan anda kedepannya.</li>
                    <li>Perhitungan data stok semuanya otomatis , jadi jangan terlalu sering menggunakan tombol <span
                            class="btn btn-dark btn-sm border-0">Edit</span> atau <span
                            class="btn btn-danger btn-sm border-0">Hapus</span> </li>
                    <li>Kerjasama anda dan kita semua sangat dibutuhkan.</li>
                </ul>
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
