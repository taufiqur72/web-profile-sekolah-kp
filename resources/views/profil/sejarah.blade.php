@extends('layouts.layouts')

{{-- SEO Meta Tags --}}
@section('title', 'Sejarah Singkat - TK Al Husainiyah')
@section('description', 'Menelusuri jejak langkah dan perjalanan sejarah TK Al Husainiyah dalam dedikasinya membentuk generasi Qur\'ani sejak berdiri hingga saat ini.')

@section('content')
{{-- Hero Header --}}
<section id="header-sejarah" class="py-5 bg-white text-center">
    <div class="container py-5" data-aos="fade-up">
        <h1 class="fw-bolder display-5 text-dark mb-3">Sejarah Sekolah</h1>
        <div class="stripe-red mx-auto mb-4" style="width: 60px; height: 4px; background: var(--bs-success);"></div>
        <p class="text-muted fs-5">Mengenal jejak langkah dan perjalanan panjang kami</p>
    </div>
</section>

{{-- Content Section --}}
<section id="content-sejarah" class="pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8" data-aos="fade-up">
                {{-- Menggunakan tag <article> untuk SEO yang lebih baik --}}
                <article class="sejarah-content text-secondary lh-lg fs-5">
                    {!! $profile->konten_sejarah !!}
                </article>
            </div>
        </div>
    </div>
</section>
@endsection