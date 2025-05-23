<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SDN Jatibarang 02 | @yield('title', 'Semarang')</title>
    <link rel="icon" href="{{ asset('assets/images/logo_sdnjatibarang.png') }}" type="image/png" />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
</head>

<body>
    <!-- Navbar -->
    @include('Partials.Navbar')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-col">
                <h4>Tautan</h4>
                <a href="https://disdiksmg.semarangkota.go.id/">> Dinas Pendidikan</a>
                <a href="https://ppd.semarangkota.go.id/">> PPD Kota Semarang</a>
                <a href="https://www.kemdikbud.go.id/">> Kemendikbud</a>
            </div>
            <div class="footer-col">
                <h4>Kontak</h4>
                <p><i class="fas fa-phone"></i>082325383803</p>
                <p><i class="fas fa-envelope"></i>sdnegerijatibarang@gmail.com</p>
            </div>
            <div class="footer-col">
                <h4>Media Sosial</h4>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2025 SDN Jatibarang 02. All rights reserved.</p>
        </div>
    </footer>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    @yield('scripts')
</body>

</html> 