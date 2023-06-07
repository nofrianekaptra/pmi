@extends('admin', ['title' => 'Dashboard'])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card border-danger">
                <div class="card-header">
                    Cetak Laporan Pendataan Darah Masuk (Pendonor)
                </div>
                <div class="card-body">
                    <form action="{{ route('laporan.dmt') }}" method="get" target="_blank"
                        onSubmit="window.location.reload()">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Cetak Laporan Tahunan</label>
                            <select name="tahun" class="form-control">
                                <option value="0" selected> Pilih Tahun</option>
                                <?php
                                $year = date('Y');
                                $min = $year - 10;
                                $max = $year;
                                for ($i = $max; $i >= $min; $i--) {
                                    echo '<option value=' . $i . '>' . $i . '</option>';
                                } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-danger">Cetak Laporan Tahunan</button>
                        </div>
                    </form>
                    <hr>
                    <form action="{{ route('laporan.dmb') }}" method="get" target="_blank"
                        onSubmit="window.location.reload()">
                        <div class="mb-3">
                            <label for="" class="form-label">Cetak Laporan Tahunan</label>
                            <select name="bulan" class="form-control">
                                <option value="0" selected> Pilih Bulan</option>
                                <?php for( $m=1; $m<=12; ++$m ) {
                                $month_label = date('F', mktime(0, 0, 0, $m, 1));
                                ?>
                                <option value="<?php echo $m; ?>"><?php echo $month_label; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-danger">Cetak Laporan Bulanan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
