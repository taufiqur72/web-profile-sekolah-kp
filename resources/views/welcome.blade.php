@extends('layouts.layouts')

@section('content')
    {{-- 1. HERO & PENDAFTARAN --}}
    <section id="hero" class="mt-0 pt-0" style="min-height: 80vh; overflow: hidden;">

        {{-- Gambar Background --}}
        <img src="{{ asset('assets/images/background-img.jpg') }}" alt="Hero Background"
            style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0; z-index: -1;">

        {{-- Overlay Gelap --}}
        <div
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 0;">
        </div>

        <div class="container text-center text-white position-relative" data-aos="zoom-out" style="z-index: 1;">
            <div class="glass-panel py-5 px-4 mx-auto"
                style="max-width: 850px; background: rgba(0,0,0,0.4); backdrop-filter: blur(5px); border-radius: 20px;">
                <h1 class="display-4 fw-bold mb-3">Selamat Datang di<br>Website Resmi TK Al-Husainiyyah</h1>
                <p class="lead mb-4">Membentuk Generasi yang Cerdas, Berkarakter, dan Religius.</p>

                {{-- Tombol Pendaftaran --}}
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    @if ($ppdb && $ppdb->is_active)
                        <a href="{{ $ppdb->link_pendaftaran }}" target="_blank"
                            class="btn btn-success btn-lg shadow-lg px-5 rounded-pill">
                            <i class="bi bi-person-plus-fill me-2"></i> {{ $ppdb->pesan_tutup ?? 'Daftar Sekarang' }}
                        </a>
                    @else
                        <button class="btn btn-secondary btn-lg shadow-lg px-5 rounded-pill" disabled>
                            {{ $ppdb->pesan_tutup ?? 'Pendaftaran Ditutup' }}
                        </button>
                    @endif

                    <a href="#galeri-alumni" class="btn btn-outline-light btn-lg px-5 rounded-pill">Lihat Galeri</a>
                </div>
            </div>
        </div>
    </section>

    {{-- 2. BERITA TERKINI --}}
    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="d-flex justify-content-between align-items-end mb-4">
                <div data-aos="fade-right">
                    <h2 class="fw-bold mb-0">Berita Terkini</h2>
                    <div class="stripe-red"
                        style="width: 50px; height: 3px; background: var(--bs-success); margin-top: 5px;"></div>
                </div>
                <a href="{{ route('berita.index') }}" class="text-success fw-bold text-decoration-none">
                    Lihat Semua Berita <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="row g-4">
                @forelse($beritaTerkini as $key => $news)
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $key * 100 }}">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                            <img src="{{ asset('storage/' . $news->image) }}" class="card-img-top" alt="{{ $news->slug }}"
                                style="height: 200px; object-fit: cover;">
                            <div class="card-body p-4">
                                <span class="badge mb-2 bg-success-subtle text-success">{{ $news->category->name }}</span>
                                <h5 class="fw-bold">{{ str_replace('-', ' ', $news->slug) }}</h5>
                                <p class="text-muted small">{{ Str::limit(strip_tags($news->news_content), 100) }}</p>
                                <a href="{{ route('berita.detail', $news->slug) }}"
                                    class="text-success fw-bold text-decoration-none small">
                                    BACA SELENGKAPNYA <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">Belum ada berita terbaru.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- 3. GURU & STAFF --}}
    <section class="py-5 bg-white">
        <div class="container py-4">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold">Guru & Staff Pengajar</h2>
                <div class="stripe-red mx-auto" style="width: 50px; height: 3px; background: var(--bs-success);"></div>
            </div>

            <div class="row g-4 text-center justify-content-center">
                @forelse($dataGuru as $key => $guru)
                    <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="{{ $key * 100 }}">
                        <img src="{{ asset('storage/' . $guru->foto) }}"
                            class="rounded-circle mb-3 shadow-sm border border-success border-3 p-1"
                            style="width: 130px; height: 130px; object-fit: cover;">
                        <h6 class="fw-bold mb-0">{{ $guru->nama_lengkap }}</h6>
                        <p class="text-muted small">{{ $guru->jabatan }}</p>
                    </div>
                @empty
                    <p class="text-muted">Data guru belum tersedia.</p>
                @endforelse
            </div>

            <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="300">
                <a href="{{ url('/profil/guru') }}" class="btn btn-outline-success btn-lg px-5 rounded-pill shadow-sm">
                    Lihat Semua Guru & Staff <i class="bi bi-people ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- 4. GALERI ALUMNI --}}
    <section id="galeri-alumni" class="py-5" style="background-color: #f8f9fa;">
        <div class="container py-4">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold">Galeri Alumni</h2>
                <div class="stripe-red mx-auto" style="width: 50px; height: 3px; background: var(--bs-success);"></div>
            </div>

            <div class="row g-4">
                @forelse($alumniList as $alumni)
                    <div class="col-md-4" data-aos="fade-up">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden transition-hover">
                            {{-- Ubah bagian ini --}}
                            {{-- Ubah bagian ini --}}
                            <div class="position-relative"
                                style="aspect-ratio: 4/3; overflow: hidden; background-color: #ffffff; display: flex; align-items: center; justify-content: center;">
                                <img src="{{ asset('storage/' . $alumni->thumbnail_photos) }}" class="img-fluid"
                                    style="max-width: 100%; max-height: 100%; object-fit: contain; transition: transform 0.5s ease;"
                                    alt="{{ $alumni->nama_angkatan }}">
                            </div>

                            <div class="card-body text-center p-3">
                                <h6 class="fw-bold mb-3 text-truncate">{{ $alumni->nama_angkatan }}</h6>
                                <a href="{{ url('/alumni/' . $alumni->id) }}"
                                    class="btn btn-sm btn-outline-success rounded-pill px-3 fw-bold">
                                    Lihat Galeri <i class="bi bi-images ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">Belum ada data alumni.</p>
                @endforelse
            </div>

            <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="200">
                <a href="{{ url('/alumni') }}" class="btn btn-success btn-lg px-5 rounded-pill shadow">
                    Lihat Daftar Alumni Lengkap <i class="bi bi-arrow-right-circle ms-2"></i>
                </a>
            </div>
        </div>
    </section>
@endsection
