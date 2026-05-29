@extends('layouts.layouts')

@section('title', 'Galeri ' . $alumni->nama_angkatan . ' - TK Al Husainiyyah')

@section('content')
<section id="header-alumni-gallery" class="py-5 bg-white text-center">
    <div class="container py-4" data-aos="fade-up">
        <h1 class="fw-bolder display-5 text-dark mb-3">{{ $alumni->nama_angkatan }}</h1>
        <div class="stripe-red mx-auto mb-4" style="width: 60px; height: 4px; background: var(--bs-success);"></div>
        <p class="text-muted fs-5">Kumpulan dokumentasi foto kenangan angkatan</p>
        <div class="mt-4">
            <a href="{{ url('/alumni') }}" class="btn btn-outline-success rounded-pill px-4 fw-bold">
                <i class="bi bi-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>
</section>

<section id="content-alumni-gallery" class="pb-5">
    <div class="container">
        <div class="row g-4 justify-content-center">
            @foreach($alumni->galleries as $item)
                @if(is_array($item->image_galery))
                    @foreach($item->image_galery as $img)
                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up">
                            <article class="card border-0 shadow-sm rounded-4 overflow-hidden gallery-card h-100 position-relative">
                                <div class="img-wrapper" data-bs-toggle="modal" data-bs-target="#lightboxModal" 
                                     data-img-src="{{ asset('storage/' . $img) }}" 
                                     data-img-caption="{{ $item->caption }}">
                                    
                                    <img src="{{ asset('storage/' . $img) }}" 
                                         class="w-100 h-100 img-fit-cover transition-img" 
                                         alt="Foto {{ $alumni->nama_angkatan }}" loading="lazy">
                                    
                                    <div class="gallery-overlay d-flex align-items-center justify-content-center">
                                        <i class="bi bi-zoom-in fs-2 text-white"></i>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                @endif
            @endforeach
        </div>
    </div>
</section>

{{-- MODAL LIGHTBOX --}}
<div class="modal fade" id="lightboxModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body p-0 text-center">
                <img src="" id="modalImage" class="img-fluid rounded-4 shadow-lg" alt="Preview">
                <div class="mt-3">
                    <p id="modalCaption" class="text-white bg-dark d-inline-block px-4 py-2 rounded-pill shadow-sm small"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('lightboxModal').addEventListener('show.bs.modal', function (event) {
        const trigger = event.relatedTarget;
        const captionText = trigger.getAttribute('data-img-caption');
        const captionElement = document.getElementById('modalCaption');
        document.getElementById('modalImage').src = trigger.getAttribute('data-img-src');
        
        if (captionText && captionText.trim() !== "") {
            captionElement.textContent = captionText;
            captionElement.style.display = 'inline-block';
        } else {
            captionElement.style.display = 'none';
        }
    });
</script>
@endsection