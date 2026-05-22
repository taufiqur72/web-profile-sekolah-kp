<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SchoolProfileController;
use App\Http\Controllers\AlumniController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman Beranda
Route::get('/', function () {
    // 1. Ambil 3 berita terbaru
    $beritaTerkini = \App\Models\News::with('category')
        ->latest('posted_at')
        ->take(3)
        ->get();

    // 2. Ambil 4 guru
    $dataGuru = \App\Models\Guru::orderBy('nama_lengkap', 'asc')
        ->take(4)
        ->get();

    // 3. AMBIL 3 ALUMNI TERBARU UNTUK GALERI
    $alumniList = \App\Models\Alumni::latest()
        ->take(3)
        ->get();

    // 4. Masukkan ke dalam compact
    return view('welcome', compact('beritaTerkini', 'dataGuru', 'alumniList'));
});

// Group Profil Sekolah (Sudah ditutup dengan benar)
Route::prefix('profil')->group(function () {
    Route::get('/sambutan', [SchoolProfileController::class, 'sambutan'])->name('profil.sambutan');
    Route::get('/sejarah', [SchoolProfileController::class, 'sejarah'])->name('profil.sejarah');
    Route::get('/visi-misi', [SchoolProfileController::class, 'visiMisi'])->name('profil.visiMisi');
    
    Route::get('/guru', function () {
        $gurus = \App\Models\Guru::all();
        return view('profil.guru', compact('gurus'));
    });
}); // <--- Penutup group profil yang tadinya hilang

Route::prefix('alumni')->group(function () {
    // Arahkan ke method index di controller
    Route::get('/', [AlumniController::class, 'index']); 

    // Arahkan ke method show di controller
    Route::get('/{id}', [AlumniController::class, 'show']);
});

// Berita
Route::get('/berita', [NewsController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [NewsController::class, 'show'])->name('berita.detail');

// Kontak 
Route::get('/kontak', [ContactController::class, 'index'])->name('kontak.index');