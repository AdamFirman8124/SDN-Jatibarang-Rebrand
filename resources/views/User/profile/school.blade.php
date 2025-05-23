@extends('layouts.app')

@section('title', 'Profil Sekolah | SDN Jatibarang 02 Semarang')

@section('css')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
@endsection

@section('content')
    <!-- Profil Sekolah Section -->
    <section class="profil-sekolah">
      <div class="container">
        <h1>Profil Sekolah</h1>
        <div class="profil-content">
          <div
            data-aos="fade-up-right"
            data-aos-duration="1500"
            class="profil-image"
          >
            <img
              src="{{ asset('assets/images/profil_sekolah.jpeg') }}"
              alt="Gedung SDN Jatibarang 02"
            />
          </div>
          <div class="profil-text">
            <h2>Visi dan Misi</h2>
            <h3>Visi:</h3>
            <p>
              "Terwujudnya generasi yang beriman dan bertaqwa, cerdas, trampil,
              berkarakter serta berwawasan lingkungan."
            </p>
            <h3>Misi:</h3>
            <ul>
              <li>
                Meletakkan pondasi penguasaan ilmu pengetahuan yang dilandasi
                keimanan dan ketaqwaan kepada Tuhan Yang Maha Esa.
              </li>
              <li>
                Menanamkan aqidah atau norma dan budi pekerti yang luhur pada
                peserta didik dalam kehidupan sehari – hari.
              </li>
              <li>
                Melaksanakan pembelajaran yang optimal dan mengembangkan
                kecerdasan akademik dan non akademik.
              </li>
              <li>
                Membina kemandirian peserta didik melalui kegiatan pembiasaan
                dan pengembangan diri yang terencana dan berkesinambungan.
              </li>
              <li>
                Menyelenggarakan pelayanan kesehatan sebagai wahana
                pembelajaran.
              </li>
              <li>Menumbuhkembangkan sikap peduli dan cinta lingkungan.</li>
              <li>
                Menumbuhkan kreaktifitas dan menjaga dan mengelola lingkungan
                melalui kegiatan ekstrakurikuler, olahraga, keterampilan dan
                pengembangan diri.
              </li>
              <li>
                Menumbuhkan kreatifitas dalam mengelola lingkungan melalui
                kegiatan ekstrakurikuler, olahraga, keterampilan, dan
                pengembangan diri.
              </li>
              <li>
                Memberikan pelayanan pendidikan kepada masyarakat dengan penuh
                tanggung jawab.
              </li>
            </ul>
          </div>
        </div>

        <div class="detail-sekolah">
          <h2>Identitas Sekolah</h2>
          <div data-aos="fade-up" data-aos-duration="750" class="detail-grid">
            <div class="detail-card">
              <i class="fas fa-school"></i>
              <h3>Nama Sekolah</h3>
              <p>SD Negeri Jatibarang 02</p>
            </div>
            <div class="detail-card">
              <i class="fas fa-map-marker-alt"></i>
              <h3>Alamat</h3>
              <p>
                Jl.Sidodadi - Jatibarang Kel. Jatibarang Kode Pos 50219 Kec.
                Mijen Kota Semarang
              </p>
            </div>
            <div class="detail-card">
              <i class="fas fa-phone"></i>
              <h3>Telepon</h3>
              <p>082325383803</p>
            </div>
            <div class="detail-card">
              <i class="fas fa-envelope"></i>
              <h3>Email</h3>
              <p>sdnegerijatibarang@gmail.com</p>
            </div>
            <div class="detail-card">
              <i class="fas fa-user-tie"></i>
              <h3>Kepala Sekolah</h3>
              <p>Eko Pujiono, S.Pd.</p>
            </div>
            <div class="detail-card">
              <i class="fas fa-chalkboard-teacher"></i>
              <h3>Jumlah Guru</h3>
              <p>25</p>
            </div>
            <div class="detail-card">
              <i class="fas fa-users"></i>
              <h3>Jumlah Siswa</h3>
              <p>250 Siswa</p>
            </div>
            <div class="detail-card">
              <i class="fas fa-certificate"></i>
              <h3>Akreditasi</h3>
              <p>A</p>
            </div>
          </div>
        </div>

        <div class="sejarah">
          <h2>Sejarah Singkat</h2>
          <p>
            SD Negeri Jatibarang 02 didirikan pada tahun 1975 dengan jumlah
            siswa awal sebanyak 60 orang. Sekolah ini telah mengalami berbagai
            perkembangan baik dari segi fisik bangunan maupun kualitas
            pendidikan. Pada tahun 2010, sekolah ini mendapatkan penghargaan
            sebagai Sekolah Adiwiyata tingkat kota Semarang.
          </p>
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
