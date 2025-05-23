<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kegiatan Sekolah - SDN Jatibarang 02 Semarang</title>
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
        .kegiatan-category {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: var(--primary-color);
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
        }
        
        .kegiatan-card .kegiatan-image {
            position: relative;
        }
        
        .kegiatan-card[data-category="akademik"] .kegiatan-category {
            background-color: #3498db; /* Biru */
        }
        
        .kegiatan-card[data-category="ekstrakurikuler"] .kegiatan-category {
            background-color: #2ecc71; /* Hijau */
        }
        
        .kegiatan-card[data-category="sosial"] .kegiatan-category {
            background-color: #e74c3c; /* Merah */
        }
        
        .kegiatan-card[data-category="budaya"] .kegiatan-category {
            background-color: #f39c12; /* Oranye */
        }
        
        .pagination .disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
        
        .filter-btn {
            margin: 0 5px;
            transition: all 0.3s ease;
        }
        
        .filter-btn:hover, .filter-btn.active {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .kegiatan-card {
            transition: all 0.5s ease;
        }
        
        .call-to-action {
            background: linear-gradient(135deg, #3498db, #2c3e50);
            color: #fff;
            padding: 4rem 0;
            margin-top: 2rem;
            text-align: center;
        }
        
        .call-to-action h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .call-to-action p {
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto 2rem;
        }
        
        .call-to-action .btn {
            background: #fff;
            color: #3498db;
            padding: 0.8rem 2rem;
            font-weight: 600;
            border-radius: 30px;
            transition: all 0.3s ease;
        }
        
        .call-to-action .btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            background: #f8f9fa;
        }
        
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
                <li><a href="{{ url('/berita') }}">Berita</a></li>
                <li><a href="{{ url('/lomba') }}">Lomba</a></li>
                <li><a href="{{ url('/kegiatan') }}" class="active">Kegiatan Sekolah</a></li>
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

<!-- Kegiatan Section -->
    <section class="kegiatan">
    <div class="container">
            <h1>Kegiatan Sekolah</h1>

            <div class="lomba-filter">
            <button class="filter-btn active" data-filter="all">Semua</button>
                @php
                    $categories = [];
                    foreach ($kegiatans as $kegiatan) {
                        $cat = strtolower($kegiatan->jenis);
                        if (!in_array($cat, $categories)) {
                            $categories[] = $cat;
                        }
                    }
                @endphp
                
                @foreach ($categories as $category)
                    <button class="filter-btn" data-filter="{{ $category }}">{{ ucfirst($category) }}</button>
                @endforeach
        </div>

            <div data-aos="fade-up" data-aos-duration="750" class="lomba-grid">
                @foreach ($kegiatans as $kegiatan)
            <div class="kegiatan-card" data-category="{{ strtolower($kegiatan->jenis) }}">
                <div class="kegiatan-image">
                            @php
                                $jenis = strtolower($kegiatan->jenis);
                                $gambar = 'kerja_bakti.png'; // default
                                
                                if (strpos($jenis, 'akademik') !== false) {
                                    $gambar = 'upacara.jpeg';
                                } elseif (strpos($jenis, 'ekstrakurikuler') !== false) {
                                    $gambar = 'upacara_pramuka.jpg';
                                } elseif (strpos($jenis, 'sosial') !== false) {
                                    $gambar = 'kunjungan_marimas.jpeg';
                                } elseif (strpos($jenis, 'budaya') !== false) {
                                    $gambar = 'dugderan.jpeg';
                                }
                            @endphp
                            <img src="{{ asset('assets/images/' . $gambar) }}"
                                alt="{{ $kegiatan->nama }}" />
                    <div class="kegiatan-category">{{ ucfirst($kegiatan->jenis) }}</div>
                </div>
                        <div class="lomba-content">
                    <h2>{{ $kegiatan->nama }}</h2>
                            <p class="lomba-date"><i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d F Y') }}</p>
                            <p class="lomba-location"><i class="fas fa-map-marker-alt"></i> {{ $kegiatan->tempat }}, {{ $kegiatan->lokasi }}</p>
                            <p class="lomba-location"><i class="fas fa-user"></i> {{ $kegiatan->penanggung_jawab }}</p>
                            <p class="lomba-desc">{{ \Illuminate\Support\Str::limit($kegiatan->deskripsi, 120) }}</p>
                    <a href="#" class="btn">Detail Kegiatan</a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Empty State -->
        @if($kegiatans->isEmpty())
        <div class="text-center py-12">
            <div class="text-5xl text-gray-300 mb-4">
                <i class="fas fa-calendar-times"></i>
            </div>
            <h3 class="text-xl font-medium text-gray-600">Belum ada kegiatan</h3>
            <p class="text-gray-500">Kegiatan akan ditampilkan di sini saat tersedia</p>
        </div>
        @endif

        <!-- Pagination -->
            @if ($kegiatans instanceof \Illuminate\Pagination\LengthAwarePaginator && $kegiatans->hasPages())
        <div class="pagination">
                    @if ($kegiatans->onFirstPage())
                        <a href="#" class="disabled"><i class="fas fa-chevron-left"></i></a>
                    @else
                        <a href="{{ $kegiatans->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a>
                    @endif
                    
                    @for ($i = 1; $i <= $kegiatans->lastPage(); $i++)
                        <a href="{{ $kegiatans->url($i) }}" class="{{ $kegiatans->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
                    @endfor
                    
                    @if ($kegiatans->hasMorePages())
                        <a href="{{ $kegiatans->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a>
                    @else
                        <a href="#" class="disabled"><i class="fas fa-chevron-right"></i></a>
                    @endif
        </div>
            @endif
    </div>
</section>

<!-- Call to Action -->
    <section class="call-to-action">
        <div class="container">
            <h2>Ingin Berpartisipasi dalam Kegiatan Sekolah?</h2>
            <p>Kami selalu terbuka untuk kolaborasi dan partisipasi dari wali murid, alumni, dan masyarakat dalam berbagai kegiatan sekolah</p>
            <a href="{{ url('kontak') }}" class="btn">Hubungi Kami</a>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
            // Filter kegiatan berdasarkan kategori
            const filterButtons = document.querySelectorAll('.filter-btn');
            const kegiatanCards = document.querySelectorAll('.kegiatan-card');

            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Hapus kelas active dari semua tombol
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    
                    // Tambahkan kelas active pada tombol yang diklik
                    button.classList.add('active');
                    
                    // Ambil nilai filter dari atribut data-filter
                    const filterValue = button.getAttribute('data-filter');
                    
                    // Filter kartu kegiatan
                    kegiatanCards.forEach(card => {
                        if (filterValue === 'all' || card.getAttribute('data-category') === filterValue) {
                            card.style.display = 'flex';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    });
</script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html> 