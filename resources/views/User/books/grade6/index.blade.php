<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buku Pembelajaran Kelas 6 - SDN Jatibarang 02</title>
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

      /* Buku page styles */
      .buku-filter {
        margin-bottom: 2rem;
        text-align: center;
      }

      .filter-btn {
        padding: 8px 16px;
        margin: 0 5px;
        background-color: #f0f0f0;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        transition: all 0.3s ease;
      }

      .filter-btn.active,
      .filter-btn:hover {
        background-color: var(--primary-color);
        color: white;
      }

      .buku-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
      }

      .buku-card {
        display: flex;
        flex-direction: column;
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease;
      }

      .buku-card:hover {
        transform: translateY(-10px);
      }

      .buku-cover {
        height: 300px;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f0f0f0;
      }

      .buku-cover img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
      }

      .buku-detail {
        padding: 1.5rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
      }

      .buku-detail h2 {
        font-size: 1.2rem;
        margin-bottom: 1rem;
        color: var(--primary-color);
      }

      .buku-detail p {
        margin-bottom: 0.5rem;
        color: #666;
      }

      .buku-actions {
        margin-top: auto;
        display: flex;
        gap: 0.5rem;
        margin-top: 1rem;
      }

      .buku-actions .btn {
        flex: 1;
        text-align: center;
        padding: 0.5rem;
        font-size: 0.9rem;
      }

      .video-pembelajaran {
        margin-top: 4rem;
      }

      .video-pembelajaran h2 {
        text-align: center;
        margin-bottom: 2rem;
      }

      .video-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 2rem;
      }

      .video-card {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
      }

      .video-card iframe {
        width: 100%;
        border: none;
      }

      .video-card h3 {
        padding: 1rem 1rem 0.5rem;
        font-size: 1.1rem;
        color: var(--primary-color);
      }

      .video-card p {
        padding: 0 1rem 1rem;
        color: #666;
      }

      @media (max-width: 768px) {
        .buku-grid {
          grid-template-columns: 1fr;
        }

        .video-grid {
          grid-template-columns: 1fr;
        }
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
      }
    </style>
  </head>

  <body>
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
            <a href="{{ route('buku.pembelajaran') }}" class="active">Buku Pembelajaran <i class="fas fa-chevron-down"></i></a>
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

    <!-- Buku Section -->
    <section class="buku">
      <div class="container">
        <h1>Buku Pembelajaran Kelas 6</h1>

        <div class="buku-filter">
          <button class="filter-btn active" data-filter="all">Semua</button>
          <button class="filter-btn" data-filter="tematik">Tematik</button>
          <button class="filter-btn" data-filter="matematika">Matematika</button>
          <button class="filter-btn" data-filter="bahasa">Bahasa Indonesia</button>
          <button class="filter-btn" data-filter="agama">Agama</button>
        </div>

        <div class="buku-grid">
          <div class="buku-card" data-category="tematik">
            <div
              data-aos="flip-left"
              data-aos-duration="650"
              class="buku-cover"
            >
              <img
                src="{{ asset('assets/images/tematik-kelas6-tema1.png') }}"
                alt="Buku Tematik 1 Kelas 6"
              />
            </div>
            <div class="buku-detail">
              <h2>Buku Tematik 1: Selamatkan Makhluk Hidup</h2>
              <p><strong>Pengarang:</strong> Kemendikbud</p>
              <p><strong>Penerbit:</strong> Pusat Kurikulum dan Perbukuan</p>
              <p><strong>Tahun:</strong> 2023</p>
              <div class="buku-actions">
                <a href="{{ asset('assets/buku/tematik1-kelas6.pdf') }}" class="btn" download
                  ><i class="fas fa-download"></i> Unduh</a
                >
                <a
                  href="{{ asset('assets/buku/tematik1-kelas6.pdf') }}"
                  class="btn"
                  target="_blank"
                  ><i class="fas fa-eye"></i> Baca Online</a
                >
              </div>
            </div>
          </div>

          <div class="buku-card" data-category="tematik">
            <div
              data-aos="flip-left"
              data-aos-duration="650"
              class="buku-cover"
            >
              <img
                src="{{ asset('assets/images/tematik-kelas6-tema2.png') }}"
                alt="Buku Tematik 2 Kelas 6"
              />
            </div>
            <div class="buku-detail">
              <h2>Buku Tematik 2: Persatuan dalam Perbedaan</h2>
              <p><strong>Pengarang:</strong> Kemendikbud</p>
              <p><strong>Penerbit:</strong> Pusat Kurikulum dan Perbukuan</p>
              <p><strong>Tahun:</strong> 2023</p>
              <div class="buku-actions">
                <a href="{{ asset('assets/buku/tematik2-kelas6.pdf') }}" class="btn" download
                  ><i class="fas fa-download"></i> Unduh</a
                >
                <a
                  href="{{ asset('assets/buku/tematik2-kelas6.pdf') }}"
                  class="btn"
                  target="_blank"
                  ><i class="fas fa-eye"></i> Baca Online</a
                >
              </div>
            </div>
          </div>

          <div class="buku-card" data-category="matematika">
            <div
              data-aos="flip-left"
              data-aos-duration="650"
              class="buku-cover"
            >
              <img
                src="{{ asset('assets/images/buku-matematika-kelas6.png') }}"
                alt="Buku Matematika Kelas 6"
              />
            </div>
            <div class="buku-detail">
              <h2>Matematika untuk SD Kelas 6</h2>
              <p><strong>Pengarang:</strong> Drs. Ahmad Fauzi, M.Pd.</p>
              <p><strong>Penerbit:</strong> Erlangga</p>
              <p><strong>Tahun:</strong> 2022</p>
              <div class="buku-actions">
                <a href="{{ asset('assets/buku/matematika-kelas6.pdf') }}" class="btn" download
                  ><i class="fas fa-download"></i> Unduh</a
                >
                <a
                  href="{{ asset('assets/buku/matematika-kelas6.pdf') }}"
                  class="btn"
                  target="_blank"
                  ><i class="fas fa-eye"></i> Baca Online</a
                >
              </div>
            </div>
          </div>

          <div class="buku-card" data-category="bahasa">
            <div
              data-aos="flip-left"
              data-aos-duration="650"
              class="buku-cover"
            >
              <img
                src="{{ asset('assets/images/buku-bahasa-kelas6.png') }}"
                alt="Buku Bahasa Indonesia Kelas 6"
              />
            </div>
            <div class="buku-detail">
              <h2>Bahasa Indonesia untuk SD Kelas 6</h2>
              <p><strong>Pengarang:</strong> Dra. Siti Aminah, M.Pd.</p>
              <p><strong>Penerbit:</strong> Yudhistira</p>
              <p><strong>Tahun:</strong> 2021</p>
              <div class="buku-actions">
                <a
                  href="{{ asset('assets/buku/bahasa-indonesia-kelas6.pdf') }}"
                  class="btn"
                  download
                  ><i class="fas fa-download"></i> Unduh</a
                >
                <a
                  href="{{ asset('assets/buku/bahasa-indonesia-kelas6.pdf') }}"
                  class="btn"
                  target="_blank"
                  ><i class="fas fa-eye"></i> Baca Online</a
                >
              </div>
            </div>
          </div>

          <div class="buku-card" data-category="agama">
            <div
              data-aos="flip-left"
              data-aos-duration="650"
              class="buku-cover"
            >
              <img
                src="{{ asset('assets/images/buku-pai-kelas6.png') }}"
                alt="Buku PAI Kelas 6"
              />
            </div>
            <div class="buku-detail">
              <h2>Pendidikan Agama Islam Kelas 6</h2>
              <p><strong>Pengarang:</strong> Tim Penyusun Kemenag</p>
              <p><strong>Penerbit:</strong> Kementerian Agama</p>
              <p><strong>Tahun:</strong> 2023</p>
              <div class="buku-actions">
                <a href="{{ asset('assets/buku/pai-kelas6.pdf') }}" class="btn" download
                  ><i class="fas fa-download"></i> Unduh</a
                >
                <a href="{{ asset('assets/buku/pai-kelas6.pdf') }}" class="btn" target="_blank"
                  ><i class="fas fa-eye"></i> Baca Online</a
                >
              </div>
            </div>
          </div>
        </div>

        <div class="video-pembelajaran">
          <h2>Video Pembelajaran Kelas 6</h2>
          <div data-aos="fade-up" data-aos-duration="600" class="video-grid">
            <div class="video-card">
              <iframe
                width="375"
                height="200"
                src="https://www.youtube.com/embed/3OC6GpuvBQY?si=jSfph_5LkaMn3bWh"
              >
              </iframe>
              <h3>Operasi Hitung Campuran</h3>
              <p>Mata Pelajaran: Matematika</p>
            </div>
            <div class="video-card">
              <iframe
                width="375"
                height="200"
                src="https://www.youtube.com/embed/ipmcPCLnRTY?si=-CuVPMcA9fvU0uxw"
              >
              </iframe>
              <h3>Teks Laporan dan Karya Ilmiah</h3>
              <p>Mata Pelajaran: Bahasa Indonesia</p>
            </div>
            <div class="video-card">
              <iframe
                width="375"
                height="200"
                src="https://www.youtube.com/embed/Mo5t13Ijzhc?si=Wl2QEcxgAK7FdT2m"
              >
              </iframe>
              <h3>Empati dan Toleransi Beragama</h3>
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
      // Filter buku
      document.addEventListener("DOMContentLoaded", function () {
        const filterButtons = document.querySelectorAll(".filter-btn");

        filterButtons.forEach((button) => {
          button.addEventListener("click", function () {
            // Remove active class from all buttons
            filterButtons.forEach((btn) => btn.classList.remove("active"));
            // Add active class to clicked button
            this.classList.add("active");

            const filterValue = this.getAttribute("data-filter");
            const bukuCards = document.querySelectorAll(".buku-card");

            bukuCards.forEach((card) => {
              if (
                filterValue === "all" ||
                card.getAttribute("data-category") === filterValue
              ) {
                card.style.display = "flex";
              } else {
                card.style.display = "none";
              }
            });
          });
        });
        
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
  </body>
</html>
