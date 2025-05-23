<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lomba - SDN Jatibarang 02 Semarang</title>
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
        .berita-category {
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
        
        .lomba-card .lomba-image {
            position: relative;
        }
        
        .lomba-card[data-category="akademik"] .berita-category {
            background-color: #3498db; /* Biru */
        }
        
        .lomba-card[data-category="olahraga"] .berita-category {
            background-color: #2ecc71; /* Hijau */
        }
        
        .lomba-card[data-category="seni"] .berita-category {
            background-color: #e74c3c; /* Merah */
        }
        
        .lomba-card[data-category="budaya"] .berita-category {
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
        
        .lomba-card {
            transition: all 0.5s ease;
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
                <li><a href="{{ url('/lomba') }}" class="active">Lomba</a></li>
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

    <!-- Lomba Section -->
    <section class="lomba">
        <div class="container">
            <h1>Informasi Lomba</h1>

            <div class="lomba-filter">
                <button class="filter-btn active" data-filter="all">Semua</button>
                @php
                    $categories = [];
                    foreach ($lombas as $lomba) {
                        $cat = strtolower($lomba->jenis);
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
                @foreach ($lombas as $lomba)
                    <div class="lomba-card" data-category="{{ strtolower($lomba->jenis) }}">
                        <div class="lomba-image">
                            @php
                                $jenis = strtolower($lomba->jenis);
                                $gambar = 'lomba_mapsi.jpg'; // default
                                
                                if (strpos($jenis, 'akademik') !== false) {
                                    $gambar = 'osn.jpg';
                                } elseif (strpos($jenis, 'seni') !== false || strpos($jenis, 'budaya') !== false) {
                                    $gambar = 'lomba_jawa.png';
                                } elseif (strpos($jenis, 'olahraga') !== false) {
                                    $gambar = 'upacara_pramuka.jpg';
                                }
                            @endphp
                            <img src="{{ asset('assets/images/' . $gambar) }}"
                                alt="{{ $lomba->nama }}" />
                            <div class="berita-category">{{ ucfirst($lomba->jenis) }}</div>
                        </div>
                        <div class="lomba-content">
                            <h2>{{ $lomba->nama }}</h2>
                            <p class="lomba-date"><i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($lomba->tanggal)->format('d F Y') }}</p>
                            <p class="lomba-location"><i class="fas fa-map-marker-alt"></i> {{ $lomba->tempat }}, {{ $lomba->lokasi }}</p>
                            <p class="lomba-location"><i class="fas fa-user"></i> {{ $lomba->penyelenggara }}</p>
                            <p class="lomba-desc">{{ $lomba->deskripsi }}</p>
                            <a href="#" class="btn">Detail Lomba</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if ($lombas->hasPages())
                <div class="pagination">
                    @if ($lombas->onFirstPage())
                        <a href="#" class="disabled"><i class="fas fa-chevron-left"></i></a>
                    @else
                        <a href="{{ $lombas->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a>
                    @endif
                    
                    @for ($i = 1; $i <= $lombas->lastPage(); $i++)
                        <a href="{{ $lombas->url($i) }}" class="{{ $lombas->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
                    @endfor
                    
                    @if ($lombas->hasMorePages())
                        <a href="{{ $lombas->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a>
                    @else
                        <a href="#" class="disabled"><i class="fas fa-chevron-right"></i></a>
                    @endif
                </div>
            @endif
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
            // Filter lomba berdasarkan kategori
            const filterButtons = document.querySelectorAll('.filter-btn');
            const lombaCards = document.querySelectorAll('.lomba-card');

            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Hapus kelas active dari semua tombol
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    
                    // Tambahkan kelas active pada tombol yang diklik
                    button.classList.add('active');
                    
                    // Ambil nilai filter dari atribut data-filter
                    const filterValue = button.getAttribute('data-filter');
                    
                    // Filter kartu lomba
                    lombaCards.forEach(card => {
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
