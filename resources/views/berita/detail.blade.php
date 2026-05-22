@extends('layouts.layouts')

{{-- 1. OPTIMASI META TAGS UTAMA UNTUK MESIN PENCARI (SEO) --}}
@section('meta_title', $news->news_title ?? str_replace('-', ' ', $news->slug))
@section('meta_description', Str::limit(strip_tags($news->news_content), 150))
@section('meta_keywords', 'berita, ' . ($news->category ? $news->category->name : 'umum') . ', sekolah, edukasi')

{{-- 2. OPTIMASI PROTOKOL OPEN GRAPH (FACEBOOK, WHATSAPP, DLL) & TWITTER CARDS --}}
@push('meta_tags')
<meta property="og:title" content="{{ $news->news_title ?? str_replace('-', ' ', $news->slug) }}">
<meta property="og:description" content="{{ Str::limit(strip_tags($news->news_content), 150) }}">
<meta property="og:image" content="{{ $news->image ? asset('storage/' . $news->image) : asset('assets/images/il-berita-01.png') }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:type" content="article">
<meta name="twitter:card" content="summary_large_image">
@endpush

@section('content')
<section class="py-5 bg-light" style="margin-top: 76px;">
    <div class="container py-4">
        {{-- Tombol Kembali --}}
        <div class="mb-4">
            <a href="{{ route('berita.index') }}" class="text-success fw-bold text-decoration-none small" rel="nofollow">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Berita
            </a>
        </div>

        <div class="row g-4">
            {{-- KOLOM KIRI: KONTEN UTAMA BERITA ($news) --}}
            <div class="col-lg-8">
                <article class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                    {{-- Deskripsi Gambar (Alt Text) yang SEO-Friendly --}}
                    <img src="{{ $news->image ? asset('storage/' . $news->image) : asset('assets/images/il-berita-01.png') }}"
                         class="img-fluid w-100 object-fit-cover" 
                         style="max-height: 450px;" 
                         alt="Gambar Berita: {{ $news->news_title ?? str_replace('-', ' ', $news->slug) }}">

                    <div class="card-body p-4 p-md-5">
                        <div class="d-flex flex-wrap gap-3 mb-3 small text-muted">
                            <span>
                                <i class="bi bi-calendar3 me-1 text-success"></i>
                                <strong>Dipublikasikan:</strong> 
                                <time datetime="{{ \Carbon\Carbon::parse($news->posted_at)->toIso8601String() }}">
                                    {{ \Carbon\Carbon::parse($news->posted_at)->translatedFormat('d F Y') }}
                                </time>
                            </span>
                            @if($news->category)
                            <span>
                                <i class="bi bi-tag me-1 text-success"></i>
                                <strong>Kategori:</strong> {{ $news->category->name }}
                            </span>
                            @endif
                        </div>

                        {{-- Judul Utama (H1) Terbaca Sempurna Oleh Crawler Google --}}
                        <h1 class="fw-bold mb-4 text-capitalize text-dark">
                            {{ $news->news_title ?? str_replace('-', ' ', $news->slug) }}
                        </h1>

                        {{-- Pembungkus Konten Utama --}}
                        <div class="content-text lh-lg text-secondary">
                            {!! $news->news_content !!}
                        </div>
                    </div>
                </article>
            </div>

            {{-- KOLOM KANAN: SIDEBAR BERITA LAINNYA ($relatedNews) --}}
            <div class="col-lg-4">
                <aside class="sticky-top" style="top: 100px;">
                    <div class="card border-0 shadow-sm rounded-4 p-4">
                        <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                            <h2 class="fw-bold mb-0 text-dark h5">Berita Lainnya</h2>
                            <a href="{{ route('berita.index') }}" class="text-success text-decoration-none small fw-bold">
                                Lihat Semua <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>

                        <div class="d-flex flex-column gap-3">
                            @forelse ($relatedNews as $related)
                                <a href="{{ route('berita.show', $related->slug) }}" class="text-decoration-none" title="Baca {{ $related->news_title ?? str_replace('-', ' ', $related->slug) }}">
                                    <div class="d-flex align-items-center gap-3">
                                        <div style="width: 80px; height: 70px;" class="flex-shrink-0">
                                            <img src="{{ $related->image ? asset('storage/' . $related->image) : asset('assets/images/il-berita-01.png') }}"
                                                 class="w-100 h-100 object-fit-cover rounded-3 shadow-sm" 
                                                 alt="Thumbnail: {{ $related->news_title ?? str_replace('-', ' ', $related->slug) }}">
                                        </div>
                                        <div class="overflow-hidden">
                                            <h3 class="text-dark fw-bold mb-1 small lh-sm h6" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                                {{ $related->news_title ?? str_replace('-', ' ', $related->slug) }}
                                            </h3>
                                            <small class="text-muted" style="font-size: 0.75rem;">
                                                {{ \Carbon\Carbon::parse($related->posted_at)->translatedFormat('d M Y') }}
                                            </small>
                                        </div>
                                    </div>
                                </a>
                                @if(!$loop->last) <hr class="my-0 opacity-25"> @endif
                            @empty
                                <p class="text-muted small text-center">Tidak ada berita lainnya.</p>
                            @endforelse
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
@endsection