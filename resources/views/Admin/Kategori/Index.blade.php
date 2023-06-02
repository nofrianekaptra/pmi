@extends('admin', ['title' => 'Kategori Golongan Darah'])
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="row">
        <div class="col-md-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-danger">DataTables Kategori Golongan Darah</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tipe Darah</th>
                                    <th>Deskripsi</th>
                                    <th>Stok Darah</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($k as $kategoris)
                                    <tr>
                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle">{{ $kategoris->jenis_d }}</td>
                                        <td class="align-middle">{{ $kategoris->keterangan }}</td>
                                        <td class="align-middle">{{ $kategoris->stock_darah }}</td>
                                        <td class="d-flex justify-content-start align-middle">
                                            <a href="{{ route('kategori.edit', $kategoris->id) }}"
                                                class="btn btn-dark btn-sm mr-2">Edit</a>
                                            <form action="{{ route('kategori.destroy', $kategoris->id) }}" method="post">
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
        <div class="col-md-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-danger">Form Create/Update Kategori Golongan Darah</h6>
                </div>
                <div class="card-body">
                    @empty($kategori)
                        <form action="{{ route('kategori.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label>Tipe Darah</label>
                                <input type="text" class="form-control" name="jenis_d">
                                <x-error name="jenis_d" />
                            </div>
                            <div class="mb-3">
                                <label>Deskripsi</label>
                                <textarea type="text" class="form-control" name="keterangan"></textarea>
                                <x-error name="keterangan" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-danger">Simpan Data</button>
                            </div>
                        </form>
                    @else
                        <form action="{{ route('kategori.update', $kategori->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="mb-3">
                                <label>Tipe Darah</label>
                                <input type="text" class="form-control" name="jenis_d"
                                    value="{{ old('jenis_d') ?? $kategori->jenis_d }}">
                                <x-error name="jenis_d" />
                            </div>
                            <div class="mb-3">
                                <label>Deskripsi</label>
                                <textarea type="text" class="form-control" name="keterangan">{{ $kategori->keterangan }}</textarea>
                                <x-error name="keterangan" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-danger">Update Data</button>
                                <a href="{{ route('kategori.index') }}" class="btn btn-dark">Kembali ke Form Tambah
                                    Kategori</a>
                            </div>
                        </form>
                    @endempty

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
