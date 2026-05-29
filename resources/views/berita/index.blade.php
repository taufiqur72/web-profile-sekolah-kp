@extends('layouts.layouts')

@section('content')
<section class="py-5 bg-light" style="margin-top: 76px;">
    <div class="container py-4">
        {{-- Bagian Header & Filter --}}
        <div class="mb-4 pb-3 border-bottom border-2 border-light-subtle">
            <h2 class="fw-bold text-dark mb-3">Berita Terkini</h2>
            
            {{-- Menu Filter Kategori --}}
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ url()->current() }}" class="btn {{ !request('category') ? 'btn-success' : 'btn-outline-success' }} btn-sm rounded-pill px-3">
                    Semua
                </a>
                {{-- Asumsi Anda memiliki variabel $categories atau bisa mengambil dari DB --}}
                @foreach($categories as $cat)
                    <a href="{{ url()->current() }}?category={{ $cat->name }}" 
                       class="btn {{ request('category') == $cat->name ? 'btn-success' : 'btn-outline-success' }} btn-sm rounded-pill px-3">
                        {{ $cat->name }}
                    </a>
                @endforeach
            </div>
        </div>

        {{-- Grid Berita --}}
        <div class="row g-4">
            @forelse($allNews as $item)
                {{-- ... (kode isi card berita Anda tetap sama) ... --}}
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden d-flex flex-column">
                        {{-- (Isi card tetap sama persis seperti kode asli Anda) --}}
                        <div class="position-relative" style="height: 224px;">
                            <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('assets/images/il-berita-01.png') }}" 
                                  alt="{{ $item->slug }}" class="w-100 h-100 object-fit-cover">
                        </div>
                        <div class="card-body p-4 d-flex flex-column flex-grow-1">
                            <div class="mb-3">
                                <span class="badge rounded-3 px-3 py-2 text-uppercase tracking-wider {{ $item->category && $item->category->name == 'Kegiatan' ? 'bg-success' : '' }} {{ $item->category && $item->category->name == 'Prestasi' ? 'bg-primary' : '' }} {{ $item->category && $item->category->name == 'Pengumuman' ? 'bg-warning text-dark' : '' }} {{ !$item->category || !in_array($item->category->name, ['Kegiatan', 'Prestasi', 'Pengumuman']) ? 'bg-secondary' : '' }}">
                                    {{ $item->category ? $item->category->name : 'Umum' }}
                                </span>
                            </div>
                            <h5 class="fw-bold text-dark mb-3 text-capitalize lh-sm">{{ $item->news_title ?? str_replace('-', ' ', $item->slug) }}</h5>
                            <p class="text-muted small mb-4 flex-grow-1" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">{{ strip_tags($item->news_content) }}</p>
                            <div class="mt-auto">
                                <a href="{{ route('berita.detail', $item->slug) }}" class="text-success fw-bold text-decoration-none small tracking-widest text-uppercase">
                                    BACA SELENGKAPNYA <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted small">Belum ada berita dalam kategori ini.</p>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-5">
            {{ $allNews->appends(['category' => request('category')])->links() }}
        </div>
    </div>
</section>
@endsection