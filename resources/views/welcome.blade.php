@extends('layouts.layouts')

@section('content')

{{-- 1. HERO & PENDAFTARAN (BUTTON) --}}
<section id="hero" class="d-flex align-items-center" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1546410531-bb4caa6b424d?q=80&w=2071&auto=format&fit=crop'); background-size: cover; background-position: center;">
    <div class="container text-center text-white" data-aos="zoom-out">
        <div class="glass-panel py-5 px-4 mx-auto" style="max-width: 850px;">
            <h1 class="display-4 fw-bold mb-3">Selamat Datang di <br>SMP Al-Husainiyyah</h1>
            <p class="lead mb-4">Membentuk Generasi Qur'ani yang Cerdas, Berakhlak Mulia, dan Siap Menghadapi Tantangan Zaman.</p>
            {{-- Tombol Pendaftaran --}}
            <div class="d-flex gap-3 justify-content-center flex-wrap">
                <a href="#" class="btn btn-emerald btn-lg shadow-lg px-5">
                    <i class="bi bi-person-plus-fill me-2"></i> Daftar Sekarang (PPDB)
                </a>
                <a href="#galeri" class="btn btn-outline-white btn-lg px-5">Lihat Galeri</a>
            </div>
        </div>
    </div>
</section>

{{-- 2. BERITA TERKINI (DINAMIS) --}}
<section class="py-5 bg-light">
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div data-aos="fade-right">
                <h2 class="fw-bold mb-0">Berita Terkini</h2>
                <div class="stripe-red"></div>
            </div>
            <a href="{{ route('berita.index') }}" class="text-success fw-bold text-decoration-none">
                Lihat Semua Berita <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="row g-4">
            @forelse($beritaTerkini as $key => $news)
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $key * 100 }}">
                    <div class="card card-news h-100 border-0 shadow-sm">
                        {{-- Gambar Berita --}}
                        <img src="{{ asset('storage/' . $news->image) }}" class="card-img-top" alt="{{ $news->slug }}" style="height: 200px; object-fit: cover;">
                        
                        <div class="card-body flex-grow-1">
                            {{-- Badge Kategori Dinamis --}}
                            <span class="badge mb-2 
                                {{ $news->category->name == 'Kegiatan' ? 'bg-success' : '' }}
                                {{ $news->category->name == 'Prestasi' ? 'bg-primary' : '' }}
                                {{ $news->category->name == 'Pengumuman' ? 'bg-warning text-dark' : 'bg-secondary' }}">
                                {{ $news->category->name }}
                            </span>

                            {{-- Judul Berita (Slug ke Judul) --}}
                            <h5 class="fw-bold capitalize">
                                {{ str_replace('-', ' ', $news->slug) }}
                            </h5>

                            {{-- Ringkasan Konten --}}
                            <p class="text-muted small">
                                {{ Str::limit(strip_tags($news->news_content), 100) }}
                            </p>
                            
                            {{-- Link Detail --}}
                            <a href="{{ route('berita.detail', $news->slug) }}" class="btn-selengkapnya text-success fw-bold text-decoration-none small uppercase tracking-wider">
                                BACA SELENGKAPNYA
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada berita terbaru.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- 3. GURU & STAFF (DINAMIS) --}}
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="fw-bold">Guru & Staff Pengajar</h2>
            <div class="stripe-red mx-auto"></div>
        </div>

        <div class="row g-4 text-center">
            @forelse($dataGuru as $key => $guru)
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="{{ $key * 100 }}">
                    <div class="p-2">
                        {{-- Foto Guru --}}
                        <img src="{{ asset('storage/' . $guru->foto) }}" 
                             alt="{{ $guru->nama_lengkap }}"
                             class="rounded-circle mb-3 shadow-sm border border-success border-3 p-1" 
                             style="width: 130px; height: 130px; object-fit: cover;">
                        
                        {{-- Nama Lengkap --}}
                        <h6 class="fw-bold mb-0 text-dark">{{ $guru->nama_lengkap }}</h6>
                        
                        {{-- Jabatan --}}
                        <p class="text-muted small">{{ $guru->jabatan }}</p>
                        
                        {{-- Bidang Studi (Opsional) --}}
                        {{-- <p class="text-success x-small fw-bold">{{ $guru->bidang_studi }}</p> --}}
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted italic">Data guru belum tersedia.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- 4. ALUMNI --}}
<section class="py-5 text-white" style="background: var(--emerald-gradient);">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-white">Inspirasi Alumni</h2>
            <p class="opacity-75">Mereka yang pernah berproses bersama kami</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6" data-aos="fade-right">
                <div class="glass-panel p-4 h-100 border-0">
                    <p class="fst-italic mb-4">"Belajar di SMP Al-Husainiyyah bukan hanya soal akademik, tapi pembentukan karakter yang sangat berguna saat saya di bangku perkuliahan."</p>
                    <div class="d-flex align-items-center">
                        <img src="https://i.pravatar.cc/150?u=10" class="rounded-circle me-3" style="width: 50px; height: 50px; border: 2px solid white;">
                        <div>
                            <h6 class="fw-bold mb-0 text-white">Dr. Irfan Hakim</h6>
                            <small class="text-warning">Lulusan 2012 - Dokter Umum</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-left">
                <div class="glass-panel p-4 h-100 border-0">
                    <p class="fst-italic mb-4">"Lingkungan yang agamis membuat saya tetap teguh memegang prinsip meskipun sekarang bekerja di industri kreatif yang sangat dinamis."</p>
                    <div class="d-flex align-items-center">
                        <img src="https://i.pravatar.cc/150?u=11" class="rounded-circle me-3" style="width: 50px; height: 50px; border: 2px solid white;">
                        <div>
                            <h6 class="fw-bold mb-0 text-white">Sarah Fauziah</h6>
                            <small class="text-warning">Lulusan 2015 - Graphic Designer</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- 5. GALERI (BENTO GRID) --}}
<section id="galeri" class="py-5 bg-white">
    <div class="container py-4">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="fw-bold">Galeri Kegiatan</h2>
            <div class="stripe-red mx-auto"></div>
        </div>
        
        <div class="bento-grid">
            <div class="bento-item bento-large" data-aos="zoom-in">
                <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=2070&auto=format&fit=crop" alt="Kegiatan">
                <div class="bento-overlay">
                    <p class="mb-0 fw-bold">Gedung Utama Sekolah</p>
                </div>
            </div>
            <div class="bento-item bento-wide" data-aos="zoom-in" data-aos-delay="100">
                <img src="https://images.unsplash.com/photo-1511629091441-ee46146481b6?q=80&w=2070&auto=format&fit=crop" alt="Kegiatan">
                <div class="bento-overlay">
                    <p class="mb-0 fw-bold">Praktikum Laboratorium IPA</p>
                </div>
            </div>
            <div class="bento-item" data-aos="zoom-in" data-aos-delay="200">
                <img src="https://images.unsplash.com/photo-1491438590914-bc09fcaaf77a?q=80&w=2070&auto=format&fit=crop" alt="Kegiatan">
                <div class="bento-overlay">
                    <p class="mb-0 fw-bold">Kegiatan Ekstrakurikuler</p>
                </div>
            </div>
            <div class="bento-item" data-aos="zoom-in" data-aos-delay="300">
                <img src="https://images.unsplash.com/photo-1524178232363-1fb28f74b671?q=80&w=2070&auto=format&fit=crop" alt="Kegiatan">
                <div class="bento-overlay">
                    <p class="mb-0 fw-bold">Suasana Kelas</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection