@extends('layouts.layouts')

@section('content')
{{-- Header Halaman Detail Galeri --}}
<section id="header-alumni-gallery" class="py-5 bg-light text-center">
    <div class="container py-5" data-aos="fade-up">
        <h1 class="fw-bold display-4 text-success">{{ $alumni->nama_angkatan }}</h1>
        <p class="lead text-muted">Kumpulan dokumentasi foto dari Angkatan Alumni TK Al Husainiyyah</p>
        <div class="mt-4">
            <a href="{{ url('/alumni') }}" class="btn btn-outline-success rounded-pill px-4 fw-bold">
                <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Alumni
            </a>
        </div>
    </div>
</section>

{{-- Konten Utama Grid Foto --}}
<section id="content-alumni-gallery" class="py-5">
    <div class="container">
        <div class="row g-4 justify-content-center">
            
            @foreach($alumni->galleries as $item)
                @if(is_array($item->image_galery))
                    @foreach($item->image_galery as $img)
                        {{-- Grid Item Card Foto --}}
                        <div class="col-sm-6 col-md-4" data-aos="fade-up">
                            <div class="card border-0 shadow-sm overflow-hidden rounded-3 gallery-card h-100 position-relative">
                                
                                {{-- Wrapper Foto dengan fitur Modal --}}
                                <div class="img-wrapper" style="height: 250px; overflow: hidden; cursor: pointer;" 
                                     data-bs-toggle="modal" 
                                     data-bs-target="#lightboxModal" 
                                     data-img-src="{{ asset('storage/' . $img) }}" 
                                     data-img-caption="{{ $item->caption }}">
                                    
                                    <img src="{{ asset('storage/' . $img) }}" class="w-100 h-100 object-cover transition-img" alt="Foto Kenangan">
                                    
                                    <div class="gallery-overlay d-flex align-items-center justify-content-center">
                                        <div class="text-center text-white">
                                            <i class="bi bi-search fs-3 mb-2"></i>
                                            <p class="small m-0 fw-bold">Klik untuk Memperbesar</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            @endforeach

        </div>
    </div>
</section>

{{-- MODAL POPUP LIGHTBOX --}}
<div class="modal fade" id="lightboxModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-dark border-0 overflow-hidden text-white rounded-4 shadow-lg">
            <div class="modal-header border-0 p-2 position-absolute top-0 end-0" style="z-index: 1055;">
                <button type="button" class="btn-close btn-close-white bg-dark p-2 rounded-circle" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0 text-center bg-black d-flex flex-column align-items-center justify-content-center">
                <img src="" id="modalImage" class="img-fluid w-100 h-auto object-contain" style="max-height: 75vh;" alt="Preview">
                <div id="modalCaptionContainer" class="p-4 w-100 bg-dark text-start border-top border-secondary">
                    <h6 class="text-warning fw-bold mb-2"><i class="bi bi-info-circle me-1"></i> Keterangan:</h6>
                    <p class="mb-0 small" id="modalCaption"></p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- SCRIPT JAVASCRIPT --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const lightboxModal = document.getElementById('lightboxModal');
        lightboxModal.addEventListener('show.bs.modal', function (event) {
            const trigger = event.relatedTarget;
            document.getElementById('modalImage').src = trigger.getAttribute('data-img-src');
            const caption = trigger.getAttribute('data-img-caption');
            const container = document.getElementById('modalCaptionContainer');
            if (caption && caption.trim() !== "") {
                document.getElementById('modalCaption').textContent = caption;
                container.style.display = 'block';
            } else {
                container.style.display = 'none';
            }
        });
    });
</script>

<style>
    .object-cover { object-fit: cover; }
    .object-contain { object-fit: contain; }
    .transition-img { transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1); }
    .img-wrapper:hover .transition-img { transform: scale(1.06); }
    .gallery-overlay {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(25, 135, 84, 0.65); opacity: 0; transition: opacity 0.3s ease;
    }
    .img-wrapper:hover .gallery-overlay { opacity: 1; }
    .gallery-card { transition: box-shadow 0.3s ease; }
    .gallery-card:hover { box-shadow: 0 .75rem 1.5rem rgba(0,0,0,.15) !important; }
</style>
@endsection