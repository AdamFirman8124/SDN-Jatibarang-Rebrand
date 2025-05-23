<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SDN Jatibarang 02 | Semarang</title>
    <link rel="icon" href="{{ asset('assets/images/logo_sdnjatibarang.png') }}" type="image/png" />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
</head>

<body>
    <!-- Navbar -->
    @include('Partials.Navbar')

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="sambutan-content reverse"></div>
            <div class="hero-text">
                <h1>Selamat Datang di SDN Jatibarang 02</h1>
                <p>Sekolah berbasis karakter dengan lingkungan belajar yang menyenangkan.</p>
                <a href="#sambutan" class="btn">Sambutan Kepala Sekolah</a>
                <a href="#program" class="btn">Lihat Program Kami</a>
            </div>
            <div class="hero-image">
                <img src="{{ asset('assets/images/logo_tampilan.jpeg') }}" alt="Siswa SD belajar" />
            </div>
        </div>
    </section>

    <!-- Sambutan Kepala Sekolah -->
    <section id="sambutan" class="sambutan">
        <div data-aos="zoom-in-up" data-aos-duration="1000" class="container">
            <h2>Sambutan Kepala Sekolah</h2>
            <div class="sambutan-content">
                <div class="sambutan-text">
                    <p>Semangat pagi dan salam sejahtera bagi kita semua,</p>
                    <p>
                        Puji syukur kami panjatkan ke hadirat Tuhan Yang Maha Esa , karena atas limpahan kasih dan
                        karuniaNya,
                        SDN Jatibarang 02 berhasil membuat website sekolah...
                        (konten disingkat untuk kejelasan, lanjutkan sesuai kebutuhan Anda)
                    </p>
                    <p><strong>Selamat berkarya.</strong></p>
                    <p><strong>- Eko Pujiono, S.Pd.</strong></p>
                </div>
                <div class="sambutan-image">
                    <img src="{{ asset('assets/images/kepala_sekolah.jpeg') }}"
                        alt="Kepala Sekolah SDN Jatibarang 02" />
                </div>
            </div>
        </div>
    </section>

    <!-- Program Unggulan -->
    <section id="program" class="program">
        <div data-aos="zoom-in-up" data-aos-duration="1000" class="container">
            <h2>Program Unggulan</h2>
            <div class="program-grid">
                <div class="program-card">
                    <i class="fas fa-book-open"></i>
                    <h3>Kurikulum Merdeka</h3>
                    <p>Pembelajaran berpusat pada minat siswa.</p>
                </div>
                <div class="program-card">
                    <i class="fas fa-paint-brush"></i>
                    <h3>Ekstrakurikuler</h3>
                    <p>Pramuka, Seni, dan Robotik.</p>
                </div>
                <div class="program-card">
                    <i class="fas fa-seedling"></i>
                    <h3>Program Adiwiyata</h3>
                    <p>Sekolah hijau berwawasan lingkungan.</p>
                </div>
            </div>
        </div>
    </section>

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
</body>

</html>
