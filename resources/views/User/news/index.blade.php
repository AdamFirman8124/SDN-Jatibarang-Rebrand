<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Berita - SDN Jatibarang 02 Semarang</title>
    <link rel="icon" href="{{ asset('assets/images/logo_sdnjatibarang.png') }}" type="image/png" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
    <style>
        /* Dropdown menu enhancement */
        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background: #fff;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            padding: 0.5rem 0;
            min-width: 200px;
            z-index: 100;
            list-style: none;
            padding-left: 0;
            margin: 0;
        }
        
        .dropdown-menu.show {
            display: block;
        }
        
        @media (max-width: 768px) {
            .dropdown-menu {
                position: static;
                box-shadow: none;
                background: rgba(0, 0, 0, 0.05);
                border-radius: 0;
                padding-left: 1rem;
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.3s ease;
            }
            
            .dropdown-menu.show {
                max-height: 500px;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('assets/images/logo_sdnjatibarang.png') }}" alt="Logo SDN Jatibarang 02" />
                <span>SDN Jatibarang 02</span>
            </a>
            <ul class="nav-links">
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li class="dropdown">
                    <a href="{{ url('/profil_sekolah') }}">Profil <i class="fas fa-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/profil_sekolah') }}">Profil Sekolah</a></li>
                        <li><a href="{{ url('/profil_guru') }}">Profil Guru</a></li>
                        <li><a href="{{ url('/profil_siswa') }}">Profil Siswa</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('/berita') }}" class="active">Berita</a></li>
                <li><a href="{{ url('/lomba') }}">Lomba</a></li>
                <li><a href="{{ url('/kegiatan') }}">Kegiatan Sekolah</a></li>
                <li class="dropdown">
                    <a href="{{ url('/buku_pembelajaran') }}">Buku Pembelajaran <i class="fas fa-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        @for ($i = 1; $i <= 6; $i++)
                            <li><a href="{{ url('/buku_kelas' . $i) }}">Kelas {{ $i }}</a></li>
                        @endfor
                    </ul>
                </li>
                <li><a href="{{ url('/galeri') }}">Galeri</a></li>
                <li><a href="{{ url('/kontak') }}">Kontak</a></li>
            </ul>
            <div class="hamburger">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>

    <!-- Berita Section -->
    <section class="lomba">
        <div class="container">
            <h1>Berita Terkini</h1>

            <div class="lomba-filter">
                <button class="filter-btn active" data-filter="all">Semua</button>
                <button class="filter-btn" data-filter="pengumuman">Pengumuman</button>
                <button class="filter-btn" data-filter="kegiatan">Kegiatan</button>
                <button class="filter-btn" data-filter="prestasi">Prestasi</button>
            </div>

            <div data-aos="fade-up" data-aos-duration="750" class="lomba-grid">
                {{-- <!-- Contoh berita statis -->
                @php
                    $beritas = [
                        [
                            'judul' => 'Penerimaan Peserta Didik Baru 2023/2024',
                            'tanggal' => '15 Juni 2023',
                            'kategori' => 'pengumuman',
                            'penulis' => 'Admin Sekolah',
                            'gambar' => 'berita1.jpg',
                            'deskripsi' =>
                                'Pendaftaran siswa baru SDN Jatibarang 02 akan dibuka mulai 1 Juli 2023. Persyaratan dan informasi lengkap bisa dilihat di halaman ini.',
                        ],
                        [
                            'judul' => 'Kegiatan Persami Angkatan 2023',
                            'tanggal' => '10 Juni 2023',
                            'kategori' => 'kegiatan',
                            'penulis' => 'Pembina Pramuka',
                            'gambar' => 'berita2.jpg',
                            'deskripsi' =>
                                'SDN Jatibarang 02 sukses menyelenggarakan kegiatan Perkemahan Sabtu-Minggu bagi siswa kelas 4 dan 5.',
                        ],
                        [
                            'judul' => 'Siswa SDN Jatibarang 02 Juara Matematika',
                            'tanggal' => '5 Juni 2023',
                            'kategori' => 'prestasi',
                            'penulis' => 'Guru Matematika',
                            'gambar' => 'berita3.jpg',
                            'deskripsi' =>
                                'Ananda Rizky kelas 5 meraih juara 1 Lomba Matematika Tingkat Kota Semarang yang diselenggarakan Dinas Pendidikan.',
                        ],
                    ];
                @endphp --}}

                @foreach ($beritas as $berita)
                    <div class="lomba-card" data-category="{{ $berita['kategori'] }}">
                        <div class="lomba-image">
                            <img src="{{ asset('assets/images/' . $berita['gambar']) }}"
                                alt="{{ $berita['judul'] }}" />
                            <div class="berita-category">{{ ucfirst($berita['kategori']) }}</div>
                        </div>
                        <div class="lomba-content">
                            <h2>{{ $berita['judul'] }}</h2>
                            <p class="lomba-date"><i class="far fa-calendar-alt"></i> {{ $berita['tanggal'] }}</p>
                            <p class="lomba-location"><i class="fas fa-user"></i> {{ $berita['penulis'] }}</p>
                            <p class="lomba-desc">{{ $berita['deskripsi'] }}</p>
                            <a href="{{ url('/berita-detail') }}" class="btn">Baca Selengkapnya</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <a href="#" class="active">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#"><i class="fas fa-chevron-right"></i></a>
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
    <script src="{{ asset('js/berita.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
