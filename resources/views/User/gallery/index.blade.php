@extends('layouts.app')

@section('title', 'Galeri - SDN Jatibarang 02 Semarang')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css" />
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
@endsection

@section('content')
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Galeri - SDN Jatibarang 02 Semarang</title>
    <link
      rel="icon"
      href="{{ asset('assets/images/logo_sdnjatibarang.png') }}"
      type="image/png"
    />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css"
    />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar">
      <div class="container">
        <a href="{{ route('home') }}" class="logo">
          <img
            src="{{ asset('assets/images/logo_sdnjatibarang.png') }}"
            alt="Logo SDN Jatibarang 02"
          />
          <span>SDN Jatibarang 02</span>
        </a>
        <ul class="nav-links">
          <li><a href="{{ route('home') }}">Beranda</a></li>
          <li class="dropdown">
            <a href="{{ route('profil.sekolah') }}"
              >Profil <i class="fas fa-chevron-down"></i
            ></a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('profil.sekolah') }}">Profil Sekolah</a></li>
              <li><a href="{{ route('profil.guru') }}">Profil Guru</a></li>
              <li><a href="{{ route('profil.siswa') }}">Profil Siswa</a></li>
            </ul>
          </li>
          <li><a href="{{ route('berita.index') }}">Berita</a></li>
          <li><a href="{{ route('lomba.public') }}">Lomba</a></li>
          <li><a href="{{ route('kegiatan.public') }}">Kegiatan Sekolah</a></li>
          <li class="dropdown">
            <a href="{{ route('buku.pembelajaran') }}"
              >Buku Pembelajaran <i class="fas fa-chevron-down"></i
            ></a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('buku.kelas1') }}">Kelas 1</a></li>
              <li><a href="{{ route('buku.kelas2') }}">Kelas 2</a></li>
              <li><a href="{{ route('buku.kelas3') }}">Kelas 3</a></li>
              <li><a href="{{ route('buku.kelas4') }}">Kelas 4</a></li>
              <li><a href="{{ route('buku.kelas5') }}">Kelas 5</a></li>
              <li><a href="{{ route('buku.kelas6') }}">Kelas 6</a></li>
            </ul>
          </li>
          <li><a href="{{ route('galeri') }}" class="active">Galeri</a></li>
          <li><a href="{{ route('kontak.index') }}">Kontak</a></li>
        </ul>
        <div class="hamburger">
          <i class="fas fa-bars"></i>
        </div>
      </div>
    </nav>

    <!-- Header Galeri -->
    <section class="page-header">
      <div class="container">
        <h1>Galeri Sekolah</h1>
        <p>Kumpulan momen berharga di SDN Jatibarang 02</p>
      </div>
    </section>

    <!-- Galeri Section -->
    <section class="galeri">
      <div class="container">
        <div class="galeri-filter">
          <button class="filter-btn active" data-filter="all">Semua</button>
          <button class="filter-btn" data-filter="kegiatan">Kegiatan</button>
          <button class="filter-btn" data-filter="prestasi">Prestasi</button>
          <button class="filter-btn" data-filter="fasilitas">Fasilitas</button>
          <button class="filter-btn" data-filter="lainnya">Lainnya</button>
        </div>

        <div
          data-aos="fade-up"
          data-aos-duration="650"
          class="galeri-grid"
          id="lightgallery"
        >
          <!-- Foto 1 -->
          <a
            href="{{ asset('assets/images/upacara_pramuka.jpg') }}"
            class="galeri-item"
            data-category="kegiatan"
            data-sub-html="<h4>Kegiatan Upcara Memperingati Hari Pramuka 2023</h4><p>Kegiatan upacara untuk memperingati hari pramuka tahun 2024</p>"
          >
            <img
              src="{{ asset('assets/images/upacara_pramuka.jpg') }}"
              alt="Kegiatan Pramuka"
            />
            <div class="galeri-overlay">
              <i class="fas fa-search-plus"></i>
              <h3>Kegiatan Upacara Memperingati Hari Pramuka</h3>
            </div>
          </a>

          <!-- Foto 2 -->
          <a
            href="{{ asset('assets/images/tahrib1.jpg') }}"
            class="galeri-item"
            data-lg="group1"
            data-category="lainnya"
            data-sub-html="<h4>Tahrib</h4><p>Siswa-siswi SDN Jatibarang 02 mengikuti kegiatan Tahrib Ramadhan 1446 H.</p>"
          >
            <img src="{{ asset('assets/images/tahrib1.jpg') }}" alt="Tahrib" />
            <div class="galeri-overlay">
              <i class="fas fa-search-plus"></i>
              <h3>Juara Matematika</h3>
            </div>
          </a>

          <!-- Foto 3 -->
          <a
            href="{{ asset('assets/images/upacara.jpeg') }}"
            class="galeri-item"
            data-category="kegiatan"
            data-sub-html="<h4>Upacara Bendera</h4><p>Upacara bendera hari Senin di halaman sekolah</p>"
          >
            <img src="{{ asset('assets/images/upacara.jpeg') }}" alt="Upacara" />
            <div class="galeri-overlay">
              <i class="fas fa-search-plus"></i>
              <h3>Upacara Bendera</h3>
            </div>
          </a>

          <!-- Foto 4 -->
          <a
            href="{{ asset('assets/images/buka_bersama.jpeg') }}"
            class="galeri-item"
            data-category="kegiatan"
            data-sub-html="<h4>Buka Bersama</h4><p>Siswa-siswi dan guru-guru SDN Jatibarang 02 melaksanakan kegiatan buka bersama bulan Ramadhan 1446 H.</p>"
          >
            <img src="{{ asset('assets/images/buka_bersama.jpeg') }}" alt="Buka Bersama" />
            <div class="galeri-overlay">
              <i class="fas fa-search-plus"></i>
              <h3>Buka Bersama</h3>
            </div>
          </a>

          <!-- Foto 5 -->
          <a
            href="{{ asset('assets/images/lomba_mapsi.jpg') }}"
            class="galeri-item"
            data-category="prestasi"
            data-sub-html="<h4>Juara Lomba MAPSI</h4><p>Siswa0siswi SDN Jatibarang 02 meraih juara lomba MAPSI dalam beberapa kategori.</p>"
          >
            <img src="{{ asset('assets/images/lomba_mapsi.jpg') }}" alt="Lomba Menggambar" />
            <div class="galeri-overlay">
              <i class="fas fa-search-plus"></i>
              <h3>Juara Lomba MAPSI</h3>
            </div>
          </a>

          <!-- Foto 6 -->
          <a
            href="{{ asset('assets/images/gerbang.png') }}"
            class="galeri-item"
            data-category="fasilitas"
            data-sub-html="<h4>Gerbang Depan SDN Jatibarang 02</h4>"
          >
            <img src="{{ asset('assets/images/gerbang.png') }}" alt="Lab Komputer" />
            <div class="galeri-overlay">
              <i class="fas fa-search-plus"></i>
              <h3>Gerbang Depan SDN Jatibarang 02</h3>
            </div>
          </a>

          <!-- Foto 7 -->
          <a
            href="{{ asset('assets/images/dugderan.jpeg') }}"
            class="galeri-item"
            data-category="kegiatan"
            data-sub-html="<h4>Acara Dugderan</h4><p>Siswa-siswi SDN Jatibarang 02 beserta Kepala Sekolah dan Guru mengikuti acara Dugderan di Balaikota Semarang.</p>"
          >
            <img src="{{ asset('assets/images/dugderan.jpeg') }}" alt="Dugderan" />
            <div class="galeri-overlay">
              <i class="fas fa-search-plus"></i>
              <h3>Acara Dugderan Kota Semarang</h3>
            </div>
          </a>

          <!-- Foto 8 -->
          <a
            href="{{ asset('assets/images/kunjungan_marimas.jpeg') }}"
            class="galeri-item"
            data-category="lainnya"
            data-sub-html="<h4>Kunjungan ke Marimas</4><p>Siswa-siswi SDN Jatibarang 02 berkunjung ke Marimas</p>"
          >
            <img
              src="{{ asset('assets/images/kunjungan_marimas.jpeg') }}"
              alt="Kunjungan Marimas"
            />
            <div class="galeri-overlay">
              <i class="fas fa-search-plus"></i>
              <h3>Kunjungan ke Marimas</h3>
            </div>
          </a>

          <a
            href="{{ asset('assets/images/drumband.jpg') }}"
            class="galeri-item"
            data-category="kegiatan"
            data-sub-html="<h4>Ekstrakurikuler Drumband</h4><p>Pelaksanaan Ekstrakurikuler Drumband</p>"
          >
            <img src="{{ asset('assets/images/drumband.jpg') }}" alt="Drumband" />
            <div class="galeri-overlay">
              <i class="fas fa-search-plus"></i>
              <h3>Ekstrakurikuler Drumband</h3>
            </div>
          </a>
        </div>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>
    <script src="{{ asset('js/galeri.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
  </body>
</html>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>
<script src="{{ asset('js/galeri.js') }}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
@endsection
