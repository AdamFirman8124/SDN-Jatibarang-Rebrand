<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buku Pembelajaran | SDN Jatibarang 02 Semarang</title>
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
            <a href="{{ route('buku.pembelajaran') }}" class="active"
              >Buku Pembelajaran <i class="fas fa-chevron-down"></i
            ></a>
            <ul class="dropdown-menu">
              @for ($i = 1; $i <= 6; $i++)
                <li><a href="{{ route('buku.kelas' . $i) }}" class="{{ request()->routeIs('buku.kelas' . $i) ? 'active' : '' }}">Kelas {{ $i }}</a></li>
              @endfor
            </ul>
          </li>
          <li><a href="{{ route('galeri') }}">Galeri</a></li>
          <li><a href="{{ route('kontak.index') }}">Kontak</a></li>
        </ul>
        <div class="hamburger">
          <i class="fas fa-bars"></i>
        </div>
      </div>
    </nav>

    <!-- Buku Pembelajaran Section -->
    <section id="buku">
      <div class="container">
        <h2>Buku Pembelajaran</h2>

        <!-- Kelas 1 -->
        <div class="kelas-section">
          <h3>Kelas 1</h3>
          <div
            data-aos="fade-up"
            data-aos-duration="600"
            class="card-container"
          >
            <div class="card">
              <img
                src="{{ asset('assets/images/tematik-kelas1-tema1.png') }}"
                alt="Buku Tema 1"
                class="card-img"
              />
              <div class="card-content">
                <h4>Buku Tema 1</h4>
              </div>
            </div>
            <div class="card">
              <img
                src="{{ asset('assets/images/buku-matematika-kelas1.png') }}"
                alt="Buku Matematika"
                class="card-img"
              />
              <div class="card-content">
                <h4>Matematika</h4>
              </div>
            </div>
            <div class="card">
              <img
                src="{{ asset('assets/images/buku-bahasa-kelas1.png') }}"
                alt="Buku Bahasa Indonesia"
                class="card-img"
              />
              <div class="card-content">
                <h4>Bahasa Indonesia</h4>
              </div>
            </div>
          </div>
          <a href="{{ route('buku.kelas1') }}" class="btn-lihat">Lihat Selengkapnya</a>
        </div>

        <!-- Kelas 2 -->
        <div class="kelas-section">
          <h3>Kelas 2</h3>
          <div
            data-aos="fade-up"
            data-aos-duration="600"
            class="card-container"
          >
            <div class="card">
              <img
                src="{{ asset('assets/images/tematik-kelas2-tema1.png') }}"
                alt="Buku Tema 1"
                class="card-img"
              />
              <div class="card-content">
                <h4>Buku Tema 1</h4>
              </div>
            </div>
            <div class="card">
              <img
                src="{{ asset('assets/images/buku-matematika-kelas2.png') }}"
                alt="Buku Matematika"
                class="card-img"
              />
              <div class="card-content">
                <h4>Matematika</h4>
              </div>
            </div>
            <div class="card">
              <img
                src="{{ asset('assets/images/buku-bahasa-kelas2.png') }}"
                alt="Buku Bahasa Indonesia"
                class="card-img"
              />
              <div class="card-content">
                <h4>Bahasa Indonesia</h4>
              </div>
            </div>
          </div>
          <a href="{{ route('buku.kelas2') }}" class="btn-lihat">Lihat Selengkapnya</a>
        </div>

        <!-- Kelas 3 -->
        <div class="kelas-section">
          <h3>Kelas 3</h3>
          <div
            data-aos="fade-up"
            data-aos-duration="600"
            class="card-container"
          >
            <div class="card">
              <img
                src="{{ asset('assets/images/tematik-kelas3-tema1.png') }}"
                alt="Buku Tema 1"
                class="card-img"
              />
              <div class="card-content">
                <h4>Buku Tema 1</h4>
              </div>
            </div>
            <div class="card">
              <img
                src="{{ asset('assets/images/buku-matematika-kelas3.png') }}"
                alt="Buku Matematika"
                class="card-img"
              />
              <div class="card-content">
                <h4>Matematika</h4>
              </div>
            </div>
            <div class="card">
              <img
                src="{{ asset('assets/images/buku-bahasa-kelas3.png') }}"
                alt="Buku Bahasa Indonesia"
                class="card-img"
              />
              <div class="card-content">
                <h4>Bahasa Indonesia</h4>
              </div>
            </div>
          </div>
          <a href="{{ route('buku.kelas3') }}" class="btn-lihat">Lihat Selengkapnya</a>
        </div>

        <!-- Kelas 4 -->
        <div class="kelas-section">
          <h3>Kelas 4</h3>
          <div
            data-aos="fade-up"
            data-aos-duration="600"
            class="card-container"
          >
            <div class="card">
              <img
                src="{{ asset('assets/images/tematik-kelas4-tema1.png') }}"
                alt="Buku Tema 1"
                class="card-img"
              />
              <div class="card-content">
                <h4>Buku Tema 1</h4>
              </div>
            </div>
            <div class="card">
              <img
                src="{{ asset('assets/images/buku-matematika-kelas4.png') }}"
                alt="Buku Matematika"
                class="card-img"
              />
              <div class="card-content">
                <h4>Matematika</h4>
              </div>
            </div>
            <div class="card">
              <img
                src="{{ asset('assets/images/buku-bahasa-kelas4.png') }}"
                alt="Buku Bahasa Indonesia"
                class="card-img"
              />
              <div class="card-content">
                <h4>Bahasa Indonesia</h4>
              </div>
            </div>
          </div>
          <a href="{{ route('buku.kelas4') }}" class="btn-lihat">Lihat Selengkapnya</a>
        </div>

        <!-- Kelas 5 -->
        <div class="kelas-section">
          <h3>Kelas 5</h3>
          <div
            data-aos="fade-up"
            data-aos-duration="600"
            class="card-container"
          >
            <div class="card">
              <img
                src="{{ asset('assets/images/tematik-kelas5-tema1.png') }}"
                alt="Buku Tema 1"
                class="card-img"
              />
              <div class="card-content">
                <h4>Buku Tema 1</h4>
              </div>
            </div>
            <div class="card">
              <img
                src="{{ asset('assets/images/buku-matematika-kelas5.png') }}"
                alt="Buku Matematika"
                class="card-img"
              />
              <div class="card-content">
                <h4>Matematika</h4>
              </div>
            </div>
            <div class="card">
              <img
                src="{{ asset('assets/images/buku-bahasa-kelas5.png') }}"
                alt="Buku Bahasa Indonesia"
                class="card-img"
              />
              <div class="card-content">
                <h4>Bahasa Indonesia</h4>
              </div>
            </div>
          </div>
          <a href="{{ route('buku.kelas5') }}" class="btn-lihat">Lihat Selengkapnya</a>
        </div>

        <!-- Kelas 6 -->
        <div class="kelas-section">
          <h3>Kelas 6</h3>
          <div
            data-aos="fade-up"
            data-aos-duration="600"
            class="card-container"
          >
            <div class="card">
              <img
                src="{{ asset('assets/images/tematik-kelas6-tema1.png') }}"
                alt="Buku Tema 1"
                class="card-img"
              />
              <div class="card-content">
                <h4>Buku Tema 1</h4>
              </div>
            </div>
            <div class="card">
              <img
                src="{{ asset('assets/images/buku-matematika-kelas6.png') }}"
                alt="Buku Matematika"
                class="card-img"
              />
              <div class="card-content">
                <h4>Matematika</h4>
              </div>
            </div>
            <div class="card">
              <img
                src="{{ asset('assets/images/buku-bahasa-kelas6.png') }}"
                alt="Buku Bahasa Indonesia"
                class="card-img"
              />
              <div class="card-content">
                <h4>Bahasa Indonesia</h4>
              </div>
            </div>
          </div>
          <a href="{{ route('buku.kelas6') }}" class="btn-lihat">Lihat Selengkapnya</a>
        </div>

        <div class="video-pembelajaran">
          <h2>Video Pembelajaran</h2>
          <div data-aos="fade-up" data-aos-duration="600" class="video-grid">
            <div class="video-card">
              <iframe
                width="375"
                height="200"
                src="https://www.youtube.com/embed/3OC6GpuvBQY?si=jSfph_5LkaMn3bWh"
              >
              </iframe>
              <h3>Belajar Berhitung 1-10</h3>
              <p>Mata Pelajaran: Matematika</p>
            </div>
            <div class="video-card">
              <iframe
                width="375"
                height="200"
                src="https://www.youtube.com/embed/ipmcPCLnRTY?si=-CuVPMcA9fvU0uxw"
              >
              </iframe>
              <h3>Membaca Huruf dan Suku Kata</h3>
              <p>Mata Pelajaran: Bahasa Indonesia</p>
            </div>
            <div class="video-card">
              <iframe
                width="375"
                height="200"
                src="https://www.youtube.com/embed/Mo5t13Ijzhc?si=Wl2QEcxgAK7FdT2m"
              >
              </iframe>
              <h3>Mengenal Rukun Iman</h3>
              <p>Mata Pelajaran: Pendidikan Agama Islam</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <div class="footer-col">
          <h4>Tautan</h4>
          <a href="https://disdiksmg.semarangkota.go.id/"
            >> Dinas Pendidikan</a
          >
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
      
      // Dropdown menu functionality
      document.addEventListener("DOMContentLoaded", function () {
        const dropdowns = document.querySelectorAll('.dropdown');
        
        // Add hover event for desktop
        dropdowns.forEach(dropdown => {
            dropdown.addEventListener('mouseenter', function() {
                if (window.innerWidth >= 768) {
                    this.querySelector('.dropdown-menu').classList.add('show');
                }
            });
            
            dropdown.addEventListener('mouseleave', function() {
                if (window.innerWidth >= 768) {
                    this.querySelector('.dropdown-menu').classList.remove('show');
                }
            });
        });
        
        // Add click event for mobile
        dropdowns.forEach(dropdown => {
            const dropdownLink = dropdown.querySelector('a');
            if (dropdownLink) {
                dropdownLink.addEventListener('click', function(e) {
                    if (window.innerWidth < 768) {
                        e.preventDefault();
                        this.parentNode.querySelector('.dropdown-menu').classList.toggle('show');
                    }
                });
            }
        });
        
        // Toggle hamburger menu
        const hamburger = document.querySelector('.hamburger');
        const navLinks = document.querySelector('.nav-links');
        
        if (hamburger) {
            hamburger.addEventListener('click', function() {
                navLinks.classList.toggle('active');
            });
        }
      });
    </script>
  </body>
</html>
