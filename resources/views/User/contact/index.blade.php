@extends('layouts.app')

@section('title', 'Kontak - SDN Jatibarang 02')

@section('css')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
<style>
  /* Header styles */
  .navbar {
    background: white;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
  }
  
  .navbar .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 2rem;
  }
  
  .logo {
    display: flex;
    align-items: center;
    text-decoration: none;
  }
  
  .logo img {
    height: 40px;
    margin-right: 10px;
  }
  
  .logo span {
    color: var(--primary-color);
    font-weight: 700;
    font-size: 1.2rem;
  }
  
  .nav-links {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
    align-items: center;
  }
  
  .nav-links li {
    position: relative;
    margin-left: 1.5rem;
  }
  
  .nav-links a {
    color: #333;
    text-decoration: none;
    font-weight: 500;
    font-size: 0.95rem;
    transition: color 0.3s ease;
    display: flex;
    align-items: center;
  }
  
  .nav-links a i {
    margin-left: 5px;
    font-size: 0.8rem;
  }
  
  .nav-links a:hover, .nav-links a.active {
    color: var(--primary-color);
  }
  
  /* Make space for fixed navbar */
  body {
    padding-top: 70px;
  }

  /* Kontak styles */
  .kontak-hero {
    background: linear-gradient(135deg, #1e88e5, #0d47a1);
    color: white;
    padding: 5rem 0 3rem;
    text-align: center;
    border-radius: 0 0 50% 50% / 30px;
    margin-bottom: 4rem;
    position: relative;
    overflow: hidden;
  }

  .kontak-hero::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('{{ asset("assets/images/pattern.png") }}');
    opacity: 0.1;
    z-index: 0;
  }
  
  .kontak-hero .container {
    position: relative;
    z-index: 1;
  }

  .kontak-hero h1 {
    font-size: 2.5rem;
    margin-bottom: 1rem;
    position: relative;
    display: inline-block;
  }

  .kontak-hero h1::after {
    content: "";
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 70px;
    height: 3px;
    background-color: #fff;
  }

  .kontak-hero p {
    font-size: 1.1rem;
    max-width: 600px;
    margin: 0 auto;
    padding: 1rem 0;
  }

  .kontak-main-grid {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 2rem;
    margin-bottom: 4rem;
  }

  .kontak-card, .kontak-form, .kontak-cta {
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 4px 24px rgba(30,136,229,0.08);
    padding: 2rem 1.5rem;
    margin-bottom: 2rem;
  }

  .kontak-info-title {
    font-size: 1.3rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    color: #1e88e5;
    border-left: 4px solid #1e88e5;
    padding-left: 0.7rem;
  }

  .kontak-card {
    margin-bottom: 1.5rem;
    text-align: left;
    border-top: 3px solid #1e88e5;
    box-shadow: 0 2px 12px rgba(30,136,229,0.07);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    padding: 1.8rem 1.5rem;
    border-radius: 12px;
  }
  
  .kontak-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(30,136,229,0.12);
  }
  
  .kontak-card:after {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    width: 100px;
    height: 100px;
    background: rgba(30,136,229,0.05);
    border-radius: 0 0 0 100%;
    z-index: 0;
  }
  
  .kontak-card.primary {
    border-top-color: #1e88e5;
  }
  
  .kontak-card.success {
    border-top-color: #4CAF50;
  }
  
  .kontak-card.warning {
    border-top-color: #FF9800;
  }
  
  .kontak-card.danger {
    border-top-color: #F44336;
  }
  
  .kontak-card.info {
    border-top-color: #00BCD4;
  }

  .kontak-card .icon {
    font-size: 2.5rem;
    color: #1e88e5;
    margin-bottom: 1rem;
    text-align: center;
    position: relative;
    z-index: 1;
  }
  
  .kontak-card.primary .icon {
    color: #1e88e5;
  }
  
  .kontak-card.success .icon {
    color: #4CAF50;
  }
  
  .kontak-card.warning .icon {
    color: #FF9800;
  }
  
  .kontak-card.danger .icon {
    color: #F44336;
  }
  
  .kontak-card.info .icon {
    color: #00BCD4;
  }

  .kontak-card h3 {
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 0.7rem;
    color: #333;
    position: relative;
    z-index: 1;
  }

  .kontak-card p {
    margin-bottom: 0.7rem;
    font-size: 0.97rem;
    color: #444;
    display: flex;
    align-items: flex-start;
    position: relative;
    z-index: 1;
    line-height: 1.5;
  }

  .kontak-card p i {
    color: #1e88e5;
    margin-right: 10px;
    font-size: 1rem;
    margin-top: 4px;
    min-width: 20px;
    text-align: center;
  }
  
  .kontak-card.primary p i {
    color: #1e88e5;
  }
  
  .kontak-card.success p i {
    color: #4CAF50;
  }
  
  .kontak-card.warning p i {
    color: #FF9800;
  }
  
  .kontak-card.danger p i {
    color: #F44336;
  }
  
  .kontak-card.info p i {
    color: #00BCD4;
  }
  
  .kontak-card p span {
    flex: 1;
  }
  
  .kontak-card p strong {
    font-weight: 600;
    margin-right: 5px;
  }
  
  .jabatan-badge {
    display: inline-block;
    background: rgba(30,136,229,0.1);
    color: #1e88e5;
    font-size: 0.85rem;
    padding: 4px 12px;
    border-radius: 30px;
    margin-bottom: 0.8rem;
    font-weight: 500;
  }
  
  .kontak-card.primary .jabatan-badge {
    background: rgba(30,136,229,0.1);
    color: #1e88e5;
  }
  
  .kontak-card.success .jabatan-badge {
    background: rgba(76,175,80,0.1);
    color: #4CAF50;
  }
  
  .kontak-card.warning .jabatan-badge {
    background: rgba(255,152,0,0.1);
    color: #FF9800;
  }
  
  .kontak-card.danger .jabatan-badge {
    background: rgba(244,67,54,0.1);
    color: #F44336;
  }
  
  .kontak-card.info .jabatan-badge {
    background: rgba(0,188,212,0.1);
    color: #00BCD4;
  }

  .kontak-cta {
    background: linear-gradient(135deg, #1e88e5, #0d47a1);
    color: #fff;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    min-height: 100%;
    box-shadow: 0 4px 24px rgba(30,136,229,0.10);
  }

  .kontak-cta h2 {
    font-size: 1.5rem;
    margin-bottom: 1rem;
    font-weight: 700;
  }

  .kontak-cta p {
    font-size: 1.05rem;
    margin-bottom: 1.5rem;
  }

  .kontak-cta .contact-info {
    display: flex;
    flex-direction: column;
    gap: 0.7rem;
    align-items: center;
  }

  .kontak-cta .contact-item {
    display: flex;
    align-items: center;
    font-size: 1.08rem;
  }

  .kontak-cta .contact-item i {
    font-size: 1.3rem;
    margin-right: 0.7rem;
  }

  .kontak-form {
    box-shadow: 0 4px 24px rgba(30,136,229,0.10);
    border-top: 3px solid #1e88e5;
  }

  .kontak-form h2 {
    font-size: 1.2rem;
    font-weight: 700;
    color: #1e88e5;
    margin-bottom: 1.2rem;
    border-left: 4px solid #1e88e5;
    padding-left: 0.7rem;
  }

  .form-group {
    margin-bottom: 1.1rem;
  }

  .form-group label {
    font-weight: 500;
    color: #333;
    margin-bottom: 0.3rem;
    display: block;
  }

  .form-control {
    width: 100%;
    padding: 0.7rem 1rem;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    font-family: 'Poppins', sans-serif;
    font-size: 1rem;
    margin-bottom: 0.2rem;
  }

  .form-control:focus {
    border-color: #1e88e5;
    box-shadow: 0 0 0 2px rgba(30,136,229,0.10);
    outline: none;
  }

  .btn-submit {
    background: linear-gradient(90deg, #1e88e5, #0d47a1);
    color: #fff;
    border: none;
    padding: 0.8rem 1.5rem;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 600;
    font-size: 1rem;
    margin-top: 0.5rem;
    transition: all 0.2s;
    box-shadow: 0 2px 8px rgba(30,136,229,0.13);
  }

  .btn-submit:hover {
    background: #0d47a1;
  }

  /* Dropdown menu styles */
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
      z-index: 1000;
      list-style: none;
      margin: 0;
  }
  
  .dropdown-menu li {
      margin: 0;
      padding: 0;
  }
  
  .dropdown-menu li a {
      padding: 0.5rem 1rem;
      display: block;
      color: #333;
      font-size: 0.9rem;
  }
  
  .dropdown-menu li a:hover {
      background-color: #f8f9fa;
      color: var(--primary-color);
  }
  
  .dropdown:hover .dropdown-menu {
      display: block;
  }
  
  .dropdown-menu.show {
      display: block;
  }
  
  /* Hamburger menu */
  .hamburger {
      display: none;
      cursor: pointer;
      font-size: 1.5rem;
  }
  
  @media (max-width: 992px) {
      .kontak-main-grid {
          grid-template-columns: 1fr;
      }
      
      .kontak-cta .contact-info {
          flex-direction: column;
          align-items: center;
          gap: 1rem;
      }
  }
  
  @media (max-width: 768px) {
      .nav-links {
          position: fixed;
          top: 70px;
          left: -100%;
          width: 80%;
          height: calc(100vh - 70px);
          background: white;
          flex-direction: column;
          align-items: flex-start;
          padding: 1rem;
          transition: 0.3s;
          box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
          overflow-y: auto;
      }
      
      .nav-links.active {
          left: 0;
      }
      
      .nav-links li {
          margin: 1rem 0;
          width: 100%;
      }
      
      .hamburger {
          display: block;
      }
      
      .dropdown-menu {
          position: static;
          box-shadow: none;
          width: 100%;
          max-height: 0;
          overflow: hidden;
          transition: max-height 0.3s ease;
          display: none;
      }
      
      .dropdown-menu.show {
          max-height: 500px;
          display: block;
      }
      
      .dropdown:hover .dropdown-menu {
          display: none;
      }

      .kontak-hero h1 {
          font-size: 2rem;
      }
      
      .kontak-form {
          padding: 2rem;
      }
  }
</style>
@endsection

@section('content')
    <!-- Navbar -->
    <nav class="navbar">
      <div class="container">
        <a href="{{ route('home') }}" class="logo">
          <img src="{{ asset('assets/images/logo_sdnjatibarang.png') }}" alt="Logo SDN Jatibarang 02" />
          <span>SDN Jatibarang 02</span>
        </a>
        <ul class="nav-links">
          <li><a href="{{ route('home') }}">Beranda</a></li>
          <li class="dropdown">
            <a href="{{ route('profil.sekolah') }}">Profil <i class="fas fa-chevron-down"></i></a>
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
            <a href="{{ route('buku.pembelajaran') }}">Buku Pembelajaran <i class="fas fa-chevron-down"></i></a>
            <ul class="dropdown-menu">
              @for ($i = 1; $i <= 6; $i++)
                <li><a href="{{ route('buku.kelas' . $i) }}">Kelas {{ $i }}</a></li>
              @endfor
            </ul>
          </li>
          <li><a href="{{ route('galeri') }}">Galeri</a></li>
          <li><a href="{{ route('kontak.index') }}" class="active">Kontak</a></li>
        </ul>
        <div class="hamburger">
          <i class="fas fa-bars"></i>
        </div>
      </div>
    </nav>

    <!-- Hero Section -->
    <section class="kontak-hero">
      <div class="container">
        <h1 data-aos="fade-up" data-aos-duration="800">Hubungi Kami</h1>
        <p data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
          Jangan ragu untuk menghubungi kami untuk informasi lebih lanjut mengenai SDN Jatibarang 02 atau berbagai hal terkait pendidikan putra-putri Anda.
        </p>
      </div>
    </section>

    <div class="container">
      <div class="kontak-main-grid">
        <!-- Kiri: Informasi Kontak -->
        <div>
          <div class="kontak-info-title">Informasi Kontak</div>
          @foreach($kontaks as $kontak)
          <div class="kontak-card" data-aos="fade-up" data-aos-duration="800" data-aos-delay="{{ $loop->index * 100 }}">
            <div class="icon">
              <i class="fas fa-user-circle"></i>
            </div>
            <h3>{{ $kontak->nama }}</h3>
            <div class="jabatan-badge">{{ $kontak->jabatan }}</div>
            <p><i class="fas fa-phone"></i> <span>{{ $kontak->telepon }}</span></p>
            <p><i class="fas fa-envelope"></i> <span>{{ $kontak->email }}</span></p>
            <p><i class="fas fa-map-marker-alt"></i> <span>{{ $kontak->alamat }}</span></p>
          </div>
          @endforeach
        </div>
        <!-- Tengah: CTA -->
        <div>
          <div class="kontak-cta" data-aos="fade-up" data-aos-duration="800">
            <h2>Butuh Informasi Lebih Lanjut?</h2>
            <p>Anda dapat menghubungi kami langsung melalui nomor telepon atau email berikut. Kami siap membantu Anda untuk mendapatkan informasi terkait SDN Jatibarang 02.</p>
            <div class="contact-info">
              <div class="contact-item">
                <i class="fas fa-phone-alt"></i>
                <span>082325383803</span>
              </div>
              <div class="contact-item">
                <i class="fas fa-envelope"></i>
                <span>sdnegerijatibarang@gmail.com</span>
              </div>
            </div>
          </div>
        </div>
        <!-- Kanan: Formulir Kontak -->
        <div>
          <form class="kontak-form" data-aos="fade-left" data-aos-duration="800" action="#" method="POST">
            <h2>Kirim Pesan</h2>
            @csrf
            <div class="form-group">
              <label for="nama">Nama Lengkap</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap Anda" required>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email Anda" required>
            </div>
            <div class="form-group">
              <label for="telepon">Nomor Telepon</label>
              <input type="tel" class="form-control" id="telepon" name="telepon" placeholder="Masukkan nomor telepon Anda">
            </div>
            <div class="form-group">
              <label for="subject">Subject</label>
              <input type="text" class="form-control" id="subject" name="subject" placeholder="Masukkan subject pesan" required>
            </div>
            <div class="form-group">
              <label for="pesan">Pesan</label>
              <textarea class="form-control" id="pesan" name="pesan" placeholder="Tuliskan pesan Anda" required></textarea>
            </div>
            <button type="submit" class="btn-submit"><i class="fas fa-paper-plane"></i> Kirim Pesan</button>
          </form>
        </div>
      </div>
    </div>

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
@endsection

@section('js')
<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Mobile menu toggle
    const hamburger = document.querySelector(".hamburger");
    const navLinks = document.querySelector(".nav-links");
    
    hamburger.addEventListener("click", () => {
      navLinks.classList.toggle("active");
    });
    
    // Mobile dropdown toggle
    const dropdowns = document.querySelectorAll(".dropdown");
    
    dropdowns.forEach(dropdown => {
      const link = dropdown.querySelector("a");
      
      link.addEventListener("click", function(e) {
        if (window.innerWidth <= 768) {
          e.preventDefault();
          this.nextElementSibling.classList.toggle("show");
        }
      });
    });
  });
</script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
@endsection 