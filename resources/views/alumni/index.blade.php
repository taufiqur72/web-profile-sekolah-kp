@extends('layouts.layouts')

@section('content')
<section id="header-alumni-info" class="py-5 bg-light text-center">
    <div class="container py-5" data-aos="fade-up">
        <h1 class="fw-bold display-4 text-success">Daftar Alumni</h1>
        <p class="lead text-muted">Jejaring angkatan alumni TK Al Husainiyyah yang terikat dalam tali silaturahmi</p>
    </div>
</section>

<section id="content-alumni-info" class="py-5">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-lg-12">
                <h3 class="fw-bold text-success mb-4 border-bottom pb-2">Daftar Angkatan Alumni</h3>
            </div>
            
            {{-- DATA DINAMIS DARI DATABASE --}}
            @forelse($alumnis as $alumni)
                <div class="col-md-6 col-lg-4" data-aos="fade-up">
                    <div class="card h-100 border-0 shadow-sm overflow-hidden rounded-3 hover-shadow transition">
                        
                        {{-- Thumbnail Foto Angkatan --}}
                        <div class="position-relative" style="height: 240px; overflow: hidden;">
                            {{-- Menggunakan asset() untuk mengakses foto di folder storage --}}
                            <img src="{{ asset('storage/' . $alumni->thumbnail_photos) }}" 
                                 class="w-100 h-100 object-cover" 
                                 alt="Foto {{ $alumni->nama_angkatan }}">
                        </div>

                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <div class="mb-3">
                                <h5 class="fw-bold text-dark m-0">{{ $alumni->nama_angkatan }}</h5>
                            </div>
                            
                            <a href="{{ url('/alumni/' . $alumni->id) }}" class="btn btn-outline-success btn-sm w-100 rounded-pill fw-bold">
                                Lihat Galeri Foto <i class="bi bi-images ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Belum ada data angkatan alumni yang tersedia.</p>
                </div>
            @endforelse

        </div>
    </div>
</section>

<style>
    .object-cover { object-fit: cover; }
    .hover-shadow:hover {
        transform: translateY(-5px);
        box-shadow: 0 .5rem 1.5rem rgba(0,0,0,.1) !important;
    }
    .transition { transition: all 0.3s ease-in-out; }
</style>
@endsection