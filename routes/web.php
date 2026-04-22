<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\NewsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // 1. Ambil 3 berita terbaru
    $beritaTerkini = \App\Models\News::with('category')
        ->latest('posted_at')
        ->take(3)
        ->get();

    // 2. Ambil 4 guru untuk ditampilkan di beranda (Tambahkan ini!)
    $dataGuru = \App\Models\Guru::orderBy('nama_lengkap', 'asc')
        ->take(4)
        ->get();

    // 3. Masukkan dataGuru ke dalam compact
    return view('welcome', compact('beritaTerkini', 'dataGuru'));
});

Route::prefix('profil')->group(function () {
    Route::get('/sambutan', function () {
        return view('profil.sambutan');
    });
    Route::get('/sejarah', function () {
        return view('profil.sejarah');
    });
    Route::get('/visi-misi', function () {
        return view('profil.visi-misi');
    });
    Route::get('/guru', function () {
        $gurus = \App\Models\Guru::all();
        return view('profil.guru', compact('gurus'));
    });
});

Route::prefix('alumni')->group(function () {
    Route::get('/info', function () {
        return view('alumni.info');
    });
    Route::get('/prestasi', function () {
        return view('alumni.prestasi');
    });
});


Route::prefix('berita')->group(function () {
    // Ubah nama route di sini
    Route::get('/', [NewsController::class, 'index'])->name('berita.index'); 
    Route::get('/{slug}', [NewsController::class, 'show'])->name('berita.detail');
});