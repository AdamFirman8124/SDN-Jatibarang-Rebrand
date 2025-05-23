<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\LombaController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KontakController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.home.index');
})->name('home');

Route::prefix('/admin')->name('admin.')->middleware('auth')->group(function () {
    // Siswa Routes
    Route::prefix('/siswa')->name('siswa.')->group(function () {
        Route::get('/', [SiswaController::class, 'indexAdmin'])->name('index');
        Route::post('/store', [SiswaController::class, 'store'])->name('store');
        Route::put('/{id}/update', [SiswaController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [SiswaController::class, 'destroy'])->name('destroy');
    });

    // Staff Routes
    Route::prefix('/staff')->name('staff.')->group(function () {
        Route::get('/', [StaffController::class, 'indexAdmin'])->name('index');
        Route::post('/store', [StaffController::class, 'store'])->name('store');
        Route::put('/{id}/update', [StaffController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [StaffController::class, 'destroy'])->name('destroy');
    });

    // Berita Routes
    Route::prefix('/berita')->name('berita.')->group(function () {
        Route::get('/', [BeritaController::class, 'indexAdmin'])->name('index');
        Route::post('/store', [BeritaController::class, 'store'])->name('store');
        Route::put('/{id}/update', [BeritaController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [BeritaController::class, 'destroy'])->name('destroy');
    });

    // Lomba Routes
    Route::prefix('/lomba')->name('lomba.')->group(function () {
        Route::get('/', [LombaController::class, 'index'])->name('index');
        Route::post('/store', [LombaController::class, 'store'])->name('store');
        Route::put('/{id}/update', [LombaController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [LombaController::class, 'destroy'])->name('destroy');
    });

    // Kegiatan Routes
    Route::prefix('/kegiatan')->name('kegiatan.')->group(function () {
        Route::get('/', [KegiatanController::class, 'index'])->name('index');
        Route::post('/store', [KegiatanController::class, 'store'])->name('store');
        Route::put('/{id}/update', [KegiatanController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [KegiatanController::class, 'destroy'])->name('destroy');
    });

    // Buku Routes
    Route::prefix('/buku')->name('buku.')->group(function () {
        Route::get('/', [BukuController::class, 'index'])->name('index');
        Route::post('/store', [BukuController::class, 'store'])->name('store');
        Route::put('/{id}/update', [BukuController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [BukuController::class, 'destroy'])->name('destroy');
    });

    // Kontak Routes
    Route::prefix('/kontak')->name('kontak.')->group(function () {
        Route::get('/', [KontakController::class, 'index'])->name('index');
        Route::post('/store', [KontakController::class, 'store'])->name('store');
        Route::put('/{id}/update', [KontakController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [KontakController::class, 'destroy'])->name('destroy');
    });
});

// Authentication Routes
Route::get('/login', function () {
    return view('Admin.Login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Public Routes
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/lomba', [LombaController::class, 'index'])->name('lomba.public');
Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.public');
Route::get('/profil/siswa', [SiswaController::class, 'index'])->name('profil.siswa');

Route::get('/kontak', function () {
    $kontaks = App\Models\Kontak::latest()->get();
    return view('user.contact.index', compact('kontaks'));
})->name('kontak.index');

// Rute untuk Buku Pembelajaran
Route::get('/buku_pembelajaran', function () {
    return view('user.books.index');
})->name('buku.pembelajaran');

// Rute untuk Buku Kelas 1-6
Route::get('/buku_kelas1', function () {
    return view('user.books.grade1.index');
})->name('buku.kelas1');

Route::get('/buku_kelas2', function () {
    return view('user.books.grade2.index');
})->name('buku.kelas2');

Route::get('/buku_kelas3', function () {
    return view('user.books.grade3.index');
})->name('buku.kelas3');

Route::get('/buku_kelas4', function () {
    return view('user.books.grade4.index');
})->name('buku.kelas4');

Route::get('/buku_kelas5', function () {
    return view('user.books.grade5.index');
})->name('buku.kelas5');

Route::get('/buku_kelas6', function () {
    return view('user.books.grade6.index');
})->name('buku.kelas6');

// Rute untuk Profil
Route::get('/profil_sekolah', function () {
    return view('user.profile.school');
})->name('profil.sekolah');

Route::get('/profil_guru', function () {
    return view('user.profile.teachers');
})->name('profil.guru');

// Rute untuk Galeri
Route::get('/galeri', function () {
    return view('user.gallery.index');
})->name('galeri');
