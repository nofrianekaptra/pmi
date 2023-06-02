<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Sistem Informasi Donor Darah &mdash; (SANDRA) PMI Dharmasraya</title>
    @stack('css')
    @vite(['resources/scss/style.scss', 'resources/js/app.js'])
</head>

<body>
    @include('sweetalert::alert')
    @include('Components.Header')
    @include('Components.Footer')
    <main>
        @yield('content')
    </main>
</body>
@stack('js')

</html>
