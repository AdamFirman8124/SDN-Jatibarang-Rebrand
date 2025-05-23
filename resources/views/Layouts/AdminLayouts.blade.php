<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreUI Dashboard</title>
    <!-- Tailwind CSS via CDN -->
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    @vite('resources/css/app.css')
    @vite('resources/js/modal.js')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-gray-100 min-h-screen">
    <!-- Top Navigation Bar -->
    <nav class="bg-white border-b border-gray-200 flex items-center h-14 px-4">
        <!-- Logo -->
        <a href="#" class="flex items-center font-bold text-gray-800 mr-6">
            <span>ADMIN PANEL</span>
        </a>

        <!-- Nav Links -->
        <div class="flex items-center flex-grow">
        </div>

        <!-- Right Nav -->
        <div class="flex items-center">
            <div class="flex items-center ml-4">
                <span class="text-gray-700">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="ml-4">
                    @csrf
                    <button type="submit" class="text-gray-700 hover:text-red-600 transition-colors duration-200">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white">
            <!-- General Section -->
            <div class="py-3">
                <div class="px-5 py-2 text-xs font-bold text-gray-400">GENERAL</div>
                <a href="/admin/siswa" class="flex items-center px-5 py-2 {{ request()->is('admin/siswa') ? 'bg-gray-700 border-l-4 border-blue-500 text-white' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}">
                    <span class="w-5 text-center mr-2">📊</span> Dashboard
                </a>

                <!-- Data Management Section -->
                <div class="px-5 py-2 text-xs font-bold text-gray-400 mt-4">DATA MANAGEMENT</div>
                <a href="{{ route('admin.siswa.index') }}" class="flex items-center px-5 py-2 text-gray-400 hover:bg-gray-700 hover:text-white {{ request()->routeIs('admin.siswa.*') ? 'bg-gray-700 border-l-4 border-blue-500 text-white' : '' }}">
                    <i class="fas fa-user-graduate w-5 text-center mr-2"></i> Siswa
                </a>
                <a href="{{ route('admin.staff.index') }}" class="flex items-center px-5 py-2 text-gray-400 hover:bg-gray-700 hover:text-white {{ request()->routeIs('admin.staff.*') ? 'bg-gray-700 border-l-4 border-blue-500 text-white' : '' }}">
                    <i class="fas fa-chalkboard-teacher w-5 text-center mr-2"></i> Guru & Staff
                </a>

                <!-- Content Management Section -->
                <div class="px-5 py-2 text-xs font-bold text-gray-400 mt-4">CONTENT MANAGEMENT</div>
                <a href="{{ route('admin.berita.index') }}" class="flex items-center px-5 py-2 text-gray-400 hover:bg-gray-700 hover:text-white {{ request()->routeIs('admin.berita.*') ? 'bg-gray-700 border-l-4 border-blue-500 text-white' : '' }}">
                    <i class="fas fa-newspaper w-5 text-center mr-2"></i> Berita
                </a>
                <a href="{{ route('admin.lomba.index') }}" class="flex items-center px-5 py-2 text-gray-400 hover:bg-gray-700 hover:text-white {{ request()->routeIs('admin.lomba.*') ? 'bg-gray-700 border-l-4 border-blue-500 text-white' : '' }}">
                    <i class="fas fa-trophy w-5 text-center mr-2"></i> Lomba
                </a>
                <a href="{{ route('admin.kegiatan.index') }}" class="flex items-center px-5 py-2 text-gray-400 hover:bg-gray-700 hover:text-white {{ request()->routeIs('admin.kegiatan.*') ? 'bg-gray-700 border-l-4 border-blue-500 text-white' : '' }}">
                    <i class="fas fa-calendar-alt w-5 text-center mr-2"></i> Kegiatan
                </a>
                <a href="{{ route('admin.buku.index') }}" class="flex items-center px-5 py-2 text-gray-400 hover:bg-gray-700 hover:text-white {{ request()->routeIs('admin.buku.*') ? 'bg-gray-700 border-l-4 border-blue-500 text-white' : '' }}">
                    <i class="fas fa-book w-5 text-center mr-2"></i> Buku
                </a>
                <a href="{{ route('admin.kontak.index') }}" class="flex items-center px-5 py-2 text-gray-400 hover:bg-gray-700 hover:text-white {{ request()->routeIs('admin.kontak.*') ? 'bg-gray-700 border-l-4 border-blue-500 text-white' : '' }}">
                    <i class="fas fa-address-book w-5 text-center mr-2"></i> Kontak
                </a>
            </div>

            <!-- System Section -->
            <div class="py-3">
                <div class="px-5 py-2 text-xs font-bold text-gray-400">SYSTEM</div>
                <a href="#" class="flex items-center px-5 py-2 text-gray-400 hover:bg-gray-700 hover:text-white">
                    <span class="w-5 text-center mr-2">👤</span> Access
                </a>
                <a href="#" class="flex items-center px-5 py-2 text-gray-400 hover:bg-gray-700 hover:text-white">
                    <span class="w-5 text-center mr-2">📄</span> Pages Management
                </a>
                <a href="#" class="flex items-center px-5 py-2 text-gray-400 hover:bg-gray-700 hover:text-white">
                    <span class="w-5 text-center mr-2">❓</span> Faq Management
                </a>
                <a href="#" class="flex items-center px-5 py-2 text-gray-400 hover:bg-gray-700 hover:text-white">
                    <span class="w-5 text-center mr-2">✉️</span> Email Templates
                </a>
                <a href="#" class="flex items-center px-5 py-2 text-gray-400 hover:bg-gray-700 hover:text-white">
                    <span class="w-5 text-center mr-2">📝</span> Blog Management
                </a>
                <a href="#" class="flex items-center px-5 py-2 text-gray-400 hover:bg-gray-700 hover:text-white">
                    <span class="w-5 text-center mr-2">📋</span> Log Viewer
                </a>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1">
            <div class="p-5">
                <!-- Flash Messages -->
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                        <strong class="font-bold">Berhasil!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif

                @if(session('warning'))
                    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-4" role="alert">
                        <strong class="font-bold">Peringatan!</strong>
                        <span class="block sm:inline">{{ session('warning') }}</span>
                    </div>
                @endif

                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <ul class="mt-2 list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="bg-white rounded shadow-sm">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @yield('Insert Modal')
    @yield('Edit Modal')
    @yield('Delete Modal')
    @yield('scripts')

    <!-- Auto-hide flash messages after 5 seconds -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('[role="alert"]');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 300);
                }, 5000);
            });
        });
    </script>
</body>

</html>
