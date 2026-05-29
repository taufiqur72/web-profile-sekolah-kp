@extends('layouts.layouts')

{{-- SEO Meta Tags --}}
@section('title', 'Visi & Misi - TK Al Husainiyah')
@section('description', 'Menjelajahi visi dan misi TK Al Husainiyah dalam mewujudkan pendidikan anak usia dini yang islami, cerdas, dan berkarakter.')

@section('content')
{{-- Hero Section --}}
<section id="header-visimisi" class="py-5 bg-white text-center">
    <div class="container py-4" data-aos="fade-up">
        <h1 class="fw-bolder display-5 text-dark mb-3">Visi & Misi</h1>
        <div class="mx-auto mb-4" style="width: 60px; height: 4px; background: var(--bs-success);"></div>
        <p class="text-muted fs-5">Arah dan tujuan mulia dalam mendidik tunas bangsa</p>
    </div>
</section>

{{-- Content Section --}}
<section id="content-visimisi" class="pb-5">
    <div class="container">
        <div class="row g-5 align-items-stretch">
            
            {{-- Visi --}}
            <div class="col-lg-5" data-aos="fade-up">
                <div class="card h-100 border-0 shadow-sm bg-success text-white p-4 p-md-5 rounded-4">
                    <div class="card-body">
                        <div class="mb-4 text-warning">
                            <i class="bi bi-eye fs-1"></i>
                        </div>
                        <h2 class="fw-bold mb-4">Visi</h2>
                        <article class="lead fst-italic lh-lg">
                            {!! $profile->visi !!}
                        </article>
                    </div>
                </div>
            </div>

            {{-- Misi --}}
            <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 border-0 shadow-sm p-4 p-md-5 rounded-4">
                    <div class="card-body">
                        <div class="mb-4 text-success">
                            <i class="bi bi-check2-circle fs-1"></i>
                        </div>
                        <h2 class="fw-bold text-dark mb-4">Misi</h2>
                        {{-- Menggunakan class custom untuk list agar lebih clean --}}
                        <article class="misi-content text-secondary lh-lg">
                            {!! $profile->misi !!}
                        </article>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection