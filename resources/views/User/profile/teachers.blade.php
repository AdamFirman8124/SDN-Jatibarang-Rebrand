@extends('layouts.app')

@section('title', 'Profil Guru | SDN Jatibarang 02 Semarang')

@section('content')
    <!-- Profil Guru Section -->
    <section class="profil-guru">
      <div class="container">
        <h1>Profil Guru dan Staff</h1>

        <div class="kepala-sekolah">
          <div class="kepala-image">
            <img
              src="{{ asset('assets/images/kepala_sekolah.jpeg') }}"
              alt="Kepala Sekolah SDN Jatibarang 02"
            />
          </div>
          <div class="kepala-text">
            <h2>Kepala Sekolah</h2>
            <h3>Drs. H. Ahmad Supriyadi, M.Pd.</h3>
            <p><strong>NIP:</strong> -</p>
            <p><strong>Pendidikan:</strong> -</p>
            <p><strong>Masa Jabatan:</strong> -</p>
            <p><strong>Prestasi:</strong> -</p>
          </div>
        </div>

        <div class="guru-list">
          <h2>Daftar Guru</h2>
          <div class="search-box">
            <input type="text" placeholder="Cari guru..." />
            <button><i class="fas fa-search"></i></button>
          </div>

          <div class="guru-grid">
            <div class="guru-card">
              <img src="{{ asset('assets/images/guru1.jpg') }}" alt="Guru SDN Jatibarang 02" />
              <h3>Siti Aminah, S.Pd.</h3>
              <p>Guru Kelas 1</p>
              <p>NIP: 198003122345678902</p>
            </div>
            <div class="guru-card">
              <img src="{{ asset('assets/images/guru2.jpg') }}" alt="Guru SDN Jatibarang 02" />
              <h3>Budi Santoso, S.Pd.</h3>
              <p>Guru Kelas 2</p>
              <p>NIP: 197805102345678903</p>
            </div>
            <div class="guru-card">
              <img src="{{ asset('assets/images/guru3.jpg') }}" alt="Guru SDN Jatibarang 02" />
              <h3>Dewi Lestari, S.Pd.</h3>
              <p>Guru Kelas 3</p>
              <p>NIP: 198112152345678904</p>
            </div>
            <div class="guru-card">
              <img src="{{ asset('assets/images/guru4.jpg') }}" alt="Guru SDN Jatibarang 02" />
              <h3>Rudi Hermawan, S.Pd.</h3>
              <p>Guru Kelas 4</p>
              <p>NIP: 197903252345678905</p>
            </div>
            <div class="guru-card">
              <img src="{{ asset('assets/images/guru5.jpg') }}" alt="Guru SDN Jatibarang 02" />
              <h3>Ani Wijayanti, S.Pd.</h3>
              <p>Guru Kelas 5</p>
              <p>NIP: 198206302345678906</p>
            </div>
            <div class="guru-card">
              <img src="{{ asset('assets/images/guru6.jpg') }}" alt="Guru SDN Jatibarang 02" />
              <h3>Eko Prasetyo, S.Pd.</h3>
              <p>Guru Kelas 6</p>
              <p>NIP: 197911202345678907</p>
            </div>
          </div>
        </div>

        <div class="staff-list">
          <h2>Daftar Staff</h2>
          <div class="staff-grid">
            <div class="staff-card">
              <i class="fas fa-user-tie"></i>
              <h3>Agus Salim</h3>
              <p>Staff Tata Usaha</p>
            </div>
            <div class="staff-card">
              <i class="fas fa-user-tie"></i>
              <h3>Sri Rahayu</h3>
              <p>Staff Perpustakaan</p>
            </div>
            <div class="staff-card">
              <i class="fas fa-user-tie"></i>
              <h3>Joko Susilo</h3>
              <p>Staff Kebersihan</p>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection

@section('js')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
@endsection
