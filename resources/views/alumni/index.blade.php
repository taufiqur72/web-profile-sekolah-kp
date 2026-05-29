@extends('layouts.layouts')

@section('title', 'Galeri Alumni - TK Al Husainiyyah')
@section('description', 'Kumpulan dokumentasi foto angkatan alumni TK Al Husainiyyah. Kenang kembali masa indah bersama teman seangkatan.')

@section('content')
    {{-- Header Modern --}}
    <section id="header-alumni" class="py-5 bg-white text-center">
        <div class="container py-4" data-aos="fade-up">
            <h1 class="fw-bolder display-5 text-dark mb-3">Galeri Alumni</h1>
            {{-- Stripe Red menggunakan class global --}}
            <div class="stripe-red mx-auto mb-4" style="width: 60px; height: 4px; background: var(--bs-success);"></div>
            <p class="text-muted fs-5">Jejaring angkatan alumni TK Al Husainiyyah yang terikat dalam tali silaturahmi</p>
        </div>
    </section>

    {{-- Content Grid --}}
    <section id="content-alumni" class="pb-5">
        <div class="container">
            <div class="row g-4">
                @forelse($alumnis as $alumni)
                    <div class="col-md-6 col-lg-4" data-aos="fade-up">
                        {{-- Menggunakan class 'gallery-item' untuk efek hover global --}}
                        <article class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden gallery-item">
                            
                            {{-- Thumbnail dengan class global --}}
                            <div class="position-relative overflow-hidden" style="aspect-ratio: 4/3;">
                                <img src="{{ asset('storage/' . $alumni->thumbnail_photos) }}" 
                                     class="w-100 h-100 img-fit-cover transition-img" 
                                     alt="{{ $alumni->nama_angkatan }}">
                            </div>

                            <div class="card-body p-4 text-center">
                                <h5 class="fw-bold text-dark mb-4">{{ $alumni->nama_angkatan }}</h5>
                                <a href="{{ url('/alumni/' . $alumni->id) }}"
                                   class="btn btn-outline-success rounded-pill px-4 fw-bold">
                                    Lihat Galeri <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </article>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div class="p-5 border rounded-4 bg-light">
                            <i class="bi bi-images fs-1 text-muted mb-3"></i>
                            <p class="text-muted fs-5">Belum ada data angkatan alumni yang tersedia.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection