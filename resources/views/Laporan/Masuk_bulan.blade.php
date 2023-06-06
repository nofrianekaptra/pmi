<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        @media print {
            @page {
                margin: 0;
            }

            body {
                margin: 1.6cm;
            }
        }
    </style>
</head>

<body>
    <center>
        <h2>LAPORAN DARAH MASUK (PENDONOR) PMI DHARMASRAYA PER BULAN</h2>
        <h4>Sumatera Barat, Kabupaten Dharmasraya</h4>
    </center>
    <hr>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="align-middle">No</th>
                <th class="align-middle">NIK</th>
                <th class="align-middle">Pendonor</th>
                <th class="align-middle">Nomor HP</th>
                <th class="align-middle">Gol. Darah</th>
            </tr>
        </thead>
        <tbody>
            Cetak Laporan Darah Masuk Bulan : {{ date('F', mktime(0, 0, 0, $bulan, 1)) }}
            <hr>
            @foreach ($data as $pendataan)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $pendataan->user->nik }}</td>
                    <td class="align-middle">{{ $pendataan->user->name }}</td>
                    <td class="align-middle">{{ $pendataan->user->nohp }}</td>
                    <td class="align-middle">{{ $pendataan->kategori->jenis_d }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

    <script>
        window.print();
    </script>
</body>

</html>
