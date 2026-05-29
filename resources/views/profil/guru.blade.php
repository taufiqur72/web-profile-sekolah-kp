@extends('layouts.layouts')

@section('title', 'Tenaga Pendidik - TK Al Husainiyah')
@section('description', 'Kenali para tenaga pendidik profesional dan berdedikasi di TK Al Husainiyah yang siap membimbing buah hati Anda.')

@section('content')
    {{-- Header Section --}}
    <section id="header-guru" class="py-5 bg-white text-center">
        <div class="container py-4" data-aos="fade-up">
            <h1 class="fw-bolder display-5 text-dark mb-3">Tenaga Pendidik</h1>
            <div class="stripe-red mx-auto mb-4" style="width: 60px; height: 4px; background: var(--bs-success);"></div>
            <p class="text-muted fs-5">Guru-guru profesional yang berdedikasi membangun karakter generasi Cerdas, Berkarakter dan Religius</p>
        </div>
    </section>

    {{-- Content Section --}}
    <section id="content-guru" class="pb-5">
        <div class="container">
            <div class="row g-4 justify-content-center">
                @forelse($gurus as $guru)
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 50 }}">
                        <div class="card h-100 border-0 shadow-sm rounded-4 teacher-card text-center p-3">
                            <div class="card-body">
                                {{-- Foto Guru --}}
                                @if($guru->foto)
                                    <div class="position-relative d-inline-block mb-3">
                                        <img src="{{ asset('storage/' . $guru->foto) }}"
                                             class="rounded-circle shadow-sm"
                                             alt="{{ $guru->nama_lengkap }} - Guru TK Al Husainiyah" 
                                             style="width: 130px; height: 130px; object-fit: cover; border: 4px solid #fff;">
                                    </div>
                                @endif
                                
                                {{-- Detail Guru --}}
                                <h5 class="fw-bold text-dark mb-1">{{ $guru->nama_lengkap }}</h5>
                                <p class="text-success small fw-bold text-uppercase tracking-wider mb-2">{{ $guru->jabatan }}</p>
                                <p class="text-muted small mb-3">{{ $guru->bidang_studi }}</p>
                                
                                @if($guru->label)
                                    <span class="badge bg-success-subtle text-success rounded-pill px-3">{{ $guru->label }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted italic">Data tenaga pendidik belum tersedia.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection