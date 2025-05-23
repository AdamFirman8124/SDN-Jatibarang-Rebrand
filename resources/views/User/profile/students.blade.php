@extends('layouts.app')

@section('title', 'Profil Siswa | SDN Jatibarang 02 Semarang')

@section('css')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
@endsection

@section('content')
    <!-- Profil Siswa Section -->
    <section class="profil-siswa">
        <div class="container">
            <h1>Profil Siswa</h1>

            <div class="siswa-stats">
                <div class="stat-card">
                    <i class="fas fa-users"></i>
                    <h3>Total Siswa</h3>
                    <p>{{ $total }}</p>
                </div>
                <div class="stat-card">
                    <i class="fas fa-male"></i>
                    <h3>Siswa Laki-laki</h3>
                    <p>{{ $laki }}</p>
                </div>
                <div class="stat-card">
                    <i class="fas fa-female"></i>
                    <h3>Siswa Perempuan</h3>
                    <p>{{ $perempuan }}</p>
                </div>
            </div>

            <div class="kelas-list">
                <h2>Daftar Siswa per Kelas</h2>

                <div class="kelas-tabs">
                    <a href="{{ route('profil.siswa') }}">
                        <button class="tab-btn {{ !$filterKelas ? 'active' : '' }}">
                            Semua Kelas
                        </button>
                    </a>
                    @for ($i = 1; $i <= 6; $i++)
                        @php
                            $kelasValue = "Kelas $i";
                        @endphp
                        <a href="{{ route('profil.siswa', ['kelas' => $kelasValue]) }}">
                            <button class="tab-btn {{ $filterKelas === $kelasValue ? 'active' : '' }}">
                                Kelas {{ $i }}
                            </button>
                        </a>
                    @endfor
                </div>

                @if($siswas->isEmpty())
                    <div class="tab-content" style="display: block">
                        <p class="text-center">Tidak ada data siswa yang tersedia.</p>
                    </div>
                @else
                    @foreach ($siswas as $kelas => $siswaKelas)
                        <div class="tab-content" style="display: block">
                            <h3>{{ $kelas }}</h3>
                            <div class="siswa-table">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Siswa</th>
                                            <th>NIS</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Wali Kelas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($siswaKelas as $index => $siswa)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $siswa->nama }}</td>
                                                <td>{{ $siswa->nis }}</td>
                                                <td>{{ $siswa->jenis_kelamin }}</td>
                                                <td>{{ $siswa->kelas->staff->nama ?? 'Belum ditentukan' }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">Tidak ada data siswa untuk kelas ini.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>

            <div class="prestasi-siswa">
                <h2>Prestasi Siswa</h2>
                <div class="prestasi-grid">
                    <div class="prestasi-card">
                        <i class="fas fa-trophy"></i>
                        <h3>Juara 1 Lomba Matematika</h3>
                        <p>Ananda Rizky - Kelas 5</p>
                        <p>Lomba Matematika Tingkat Kota 2023</p>
                    </div>
                    <div class="prestasi-card">
                        <i class="fas fa-trophy"></i>
                        <h3>Juara 2 Lomba Menggambar</h3>
                        <p>Dewi Larasati - Kelas 4</p>
                        <p>Lomba Menggambar Tingkat Kecamatan 2023</p>
                    </div>
                    <div class="prestasi-card">
                        <i class="fas fa-trophy"></i>
                        <h3>Juara 3 Pramuka</h3>
                        <p>Tim Pramuka SDN Jatibarang 02</p>
                        <p>Jamboree Tingkat Kota 2023</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
<script>
    function openKelas(evt, kelasName) {
        var i, tabcontent, tabbuttons;
        tabcontent = document.getElementsByClassName("tab-content");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tabbuttons = document.getElementsByClassName("tab-btn");
        for (i = 0; i < tabbuttons.length; i++) {
            tabbuttons[i].className = tabbuttons[i].className.replace(" active", "");
        }
        document.getElementById(kelasName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
@endsection
