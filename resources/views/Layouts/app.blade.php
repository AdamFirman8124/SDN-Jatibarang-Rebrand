<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'SDN Jatibarang 02 Semarang')</title>
    <link rel="icon" href="{{ asset('assets/images/logo_sdnjatibarang.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @yield('css')
</head>
<body>
    <!-- Navbar -->
    @include('Partials.Navbar')

    <!-- Content -->
    @yield('content')

    <!-- Footer -->
    @include('Partials.Footer')

    <!-- Scripts -->
    <script src="{{ asset('js/script.js') }}"></script>
    @yield('js')
</body>
</html>
