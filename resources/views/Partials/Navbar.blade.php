<nav class="navbar">
    <div class="container">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('assets/images/logo_sdnjatibarang.png') }}" alt="Logo SDN Jatibarang 02" />
            <span>SDN Jatibarang 02</span>
        </a>
        <ul class="nav-links">
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a></li>
            <li class="dropdown">
                <a href="{{ route('profil.sekolah') }}" class="{{ request()->routeIs('profil.*') ? 'active' : '' }}">Profil <i class="fas fa-chevron-down"></i></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('profil.sekolah') }}" class="{{ request()->routeIs('profil.sekolah') ? 'active' : '' }}">Profil Sekolah</a></li>
                    <li><a href="{{ route('profil.guru') }}" class="{{ request()->routeIs('profil.guru') ? 'active' : '' }}">Profil Guru</a></li>
                    <li><a href="{{ route('profil.siswa') }}" class="{{ request()->routeIs('profil.siswa') ? 'active' : '' }}">Profil Siswa</a></li>
                </ul>
            </li>
            <li><a href="{{ route('berita.index') }}" class="{{ request()->routeIs('berita.*') ? 'active' : '' }}">Berita</a></li>
            <li><a href="{{ route('lomba.public') }}" class="{{ request()->routeIs('lomba.*') ? 'active' : '' }}">Lomba</a></li>
            <li><a href="{{ route('kegiatan.public') }}" class="{{ request()->routeIs('kegiatan.*') ? 'active' : '' }}">Kegiatan Sekolah</a></li>
            <li class="dropdown">
                <a href="{{ route('buku.pembelajaran') }}" class="{{ request()->routeIs('buku.*') ? 'active' : '' }}">Buku Pembelajaran <i class="fas fa-chevron-down"></i></a>
                <ul class="dropdown-menu">
                    @for ($i = 1; $i <= 6; $i++)
                        <li><a href="{{ route('buku.kelas' . $i) }}" class="{{ request()->routeIs('buku.kelas' . $i) ? 'active' : '' }}">Kelas {{ $i }}</a></li>
                    @endfor
                </ul>
            </li>
            <li><a href="{{ route('galeri') }}" class="{{ request()->routeIs('galeri') ? 'active' : '' }}">Galeri</a></li>
            <li><a href="{{ route('kontak.index') }}" class="{{ request()->routeIs('kontak.*') ? 'active' : '' }}">Kontak</a></li>
        </ul>
        <div class="hamburger">
            <i class="fas fa-bars"></i>
        </div>
        <a href="{{ route('login') }}" class="btn ml-4">Login</a>
    </div>
</nav>
