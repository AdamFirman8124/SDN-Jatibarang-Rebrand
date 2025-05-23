<li class="nav-item">
    <a href="{{ route('admin.siswa.index') }}" class="nav-link {{ request()->routeIs('admin.siswa.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user-graduate"></i>
        <p>Siswa</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.staff.index') }}" class="nav-link {{ request()->routeIs('admin.staff.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-chalkboard-teacher"></i>
        <p>Guru & Staff</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.berita.index') }}" class="nav-link {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-newspaper"></i>
        <p>Berita</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.lomba.index') }}" class="nav-link {{ request()->routeIs('admin.lomba.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-trophy"></i>
        <p>Lomba</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.kegiatan.index') }}" class="nav-link {{ request()->routeIs('admin.kegiatan.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-calendar-alt"></i>
        <p>Kegiatan</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.buku.index') }}" class="nav-link {{ request()->routeIs('admin.buku.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-book"></i>
        <p>Buku</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.kontak.index') }}" class="nav-link {{ request()->routeIs('admin.kontak.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-address-book"></i>
        <p>Kontak</p>
    </a>
</li>
