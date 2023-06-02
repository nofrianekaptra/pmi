<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistem Informasi Donor Darah &mdash; (SANDRA) PMI Dharmasraya</title>
    @vite(['resources/scss/style.scss', 'resources/js/app.js'])
</head>

<body>
    @include('sweetalert::alert')
    <main>
        @yield('content')
    </main>
</body>

</html>
