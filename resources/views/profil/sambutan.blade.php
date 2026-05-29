@extends('layouts.layouts')

@section('title', 'Sambutan Kepala Sekolah - TK Al Husainiyah')
@section('description', 'Sambutan resmi dari Kepala Sekolah TK Al Husainiyah mengenai visi dan misi sekolah dalam
    mendidik generasi Qur\'ani.')

@section('content')
    {{-- Hero Section --}}
    <section id="header-profil" class="py-5 bg-white text-center">
        <div class="container py-4" data-aos="fade-up">
            <h1 class="fw-bolder display-5 text-dark mb-3">Sambutan Kepala Sekolah</h1>
            <div class="stripe-red mx-auto mb-4"></div>
            <p class="text-muted fs-5">Mengenal lebih dekat kepala sekolah TK Al Husainiyah</p>
        </div>
    </section>

    {{-- Content Section --}}
    <section id="content-sambutan" class="pb-5">
        <div class="container">
            <div class="row align-items-start g-4 g-lg-5">

                {{-- Foto Kepsek --}}
                @if ($profile->foto_profil)
                    <div class="col-12 col-lg-4" data-aos="fade-right">
                        <div class="position-relative overflow-hidden rounded-4">
                            <img src="{{ Storage::url($profile->foto_profil) }}" class="img-fluid shadow-sm w-100"
                                alt="Kepala Sekolah TK Al Husainiyah - {{ $profile->nama_kepsek }}"
                                style="aspect-ratio: 1/1; object-fit: cover; object-position: center; /* Default untuk Mobile */"
                                loading="lazy">
                            >
                        </div>
                    </div>
                @endif

                {{-- Konten Sambutan --}}
                <div class="{{ $profile->foto_profil ? 'col-lg-8' : 'col-lg-12' }}" data-aos="fade-left">
                    <article class="content-sambutan-text fs-5 text-secondary lh-lg px-2 px-lg-0">
                        {!! $profile->konten_sambutan !!}
                    </article>

                    <div class="mt-5 border-start border-4 border-success ps-4">
                        <h4 class="fw-bold text-dark mb-1">{{ $profile->nama_kepsek }}</h4>
                        <p class="text-success fw-medium mb-0">{{ $profile->label }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
