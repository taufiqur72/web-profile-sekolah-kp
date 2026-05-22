@extends('layouts.layouts')

@section('content')
<section class="py-5 bg-light" style="margin-top: 76px;">
    <div class="container py-4">
        {{-- Bagian Header --}}
        <div class="d-flex justify-content-between align-items-end mb-4 pb-3 border-bottom border-2 border-light-subtle">
            <div>
                <h2 class="fw-bold text-dark mb-0">Berita Terkini</h2>
                <div class="bg-success mt-2" style="height: 4px; width: 48px;"></div>
            </div>
        </div>

        {{-- Grid Berita (Memakai $allNews) --}}
        <div class="row g-4">
            @forelse($allNews as $item)
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden d-flex flex-column">
                        <div class="position-relative" style="height: 224px;">
                            <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('assets/images/il-berita-01.png') }}" 
                                 alt="{{ $item->slug }}" class="w-100 h-100 object-fit-cover">
                        </div>
                        
                        <div class="card-body p-4 d-flex flex-column flex-grow-1">
                            <div class="mb-3">
                                <span class="badge rounded-3 px-3 py-2 text-uppercase tracking-wider
                                    {{ $item->category && $item->category->name == 'Kegiatan' ? 'bg-success' : '' }}
                                    {{ $item->category && $item->category->name == 'Prestasi' ? 'bg-primary' : '' }}
                                    {{ $item->category && $item->category->name == 'Pengumuman' ? 'bg-warning text-dark' : '' }}
                                    {{ !$item->category || !in_array($item->category->name, ['Kegiatan', 'Prestasi', 'Pengumuman']) ? 'bg-secondary' : '' }}">
                                    {{ $item->category ? $item->category->name : 'Umum' }}
                                </span>
                            </div>

                            <h5 class="fw-bold text-dark mb-3 text-capitalize lh-sm">
                                {{ $item->news_title ?? str_replace('-', ' ', $item->slug) }}
                            </h5>

                            <p class="text-muted small mb-4 flex-grow-1" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                {{ strip_tags($item->news_content) }}
                            </p>

                            <div class="mt-auto">
                                {{-- Mengarah ke fungsi show() --}}
                                <a href="{{ route('berita.detail', $item->slug) }}" class="text-success fw-bold text-decoration-none small tracking-widest text-uppercase">
                                    BACA SELENGKAPNYA <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted small">Belum ada berita yang diterbitkan.</p>
                </div>
            @endforelse
        </div>

        {{-- Navigasi Halaman / Pagination --}}
        <div class="d-flex justify-content-center mt-5">
            {{ $allNews->links() }}
        </div>
    </div>
</section>
@endsection