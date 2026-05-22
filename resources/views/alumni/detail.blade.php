@extends('layouts.layouts')

@section('content')
{{-- Header Halaman Detail Galeri --}}
<section id="header-alumni-gallery" class="py-5 bg-light text-center">
    <div class="container py-5" data-aos="fade-up">
        <h1 class="fw-bold display-4 text-success">Galeri Kenangan</h1>
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
            
            @php
                // Data dummy struktur tabel: alumnis_galery (image_galery, caption)
                // Foto menggunakan Unsplash premium-look agar tampilan mockup Anda menarik
                $galleryItems = [
                    [
                        'image' => 'https://images.unsplash.com/photo-1588072432836-e10032774350?w=1000&auto=format&fit=crop&q=80',
                        'caption' => 'Keseruan bermain bersama di halaman depan kelas utama TK Al Husainiyyah.'
                    ],
                    [
                        'image' => 'https://images.unsplash.com/photo-1577896851231-70ef18881754?w=1000&auto=format&fit=crop&q=80',
                        'caption' => 'Sesi foto bersama Ibu Guru wali kelas saat kegiatan belajar kelompok luar ruangan.'
                    ],
                    [
                        'image' => 'https://images.unsplash.com/photo-1564981797816-1043664bf78d?w=1000&auto=format&fit=crop&q=80',
                        'caption' => 'Dokumentasi penuh kehangatan seluruh siswa siswi se-angkatan.'
                    ],
                    [
                        'image' => 'https://images.unsplash.com/photo-1540479859555-17af45c78a62?w=1000&auto=format&fit=crop&q=80',
                        'caption' => 'Ekspresi ceria anak-anak saat merayakan hari kelulusan angkatan.'
                    ],
                    [
                        'image' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=1000&auto=format&fit=crop&q=80',
                        'caption' => '' // Contoh tanpa caption (null di database)
                    ],
                    [
                        'image' => 'https://images.unsplash.com/photo-1516627145497-ae6968895b74?w=1000&auto=format&fit=crop&q=80',
                        'caption' => 'Kegiatan pentas seni tahunan menampilkan tarian daerah oleh siswa TK.'
                    ]
                ];
            @endphp

            @foreach($galleryItems as $index => $item)
                {{-- Grid Item Card Foto --}}
                <div class="col-sm-6 col-md-4" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                    <div class="card border-0 shadow-sm overflow-hidden rounded-3 gallery-card h-100 position-relative">
                        
                        {{-- Wrapper Foto --}}
                        <div class="img-wrapper" style="height: 250px; overflow: hidden; cursor: pointer;" 
                             data-bs-toggle="modal" 
                             data-bs-target="#lightboxModal" 
                             data-img-src="{{ $item['image'] }}" 
                             data-img-caption="{{ $item['caption'] }}">
                            
                            <img src="{{ $item['image'] }}" class="w-100 h-100 object-cover transition-img" alt="Foto Kenangan">
                            
                            {{-- Overlay Efek Hijau saat Hover --}}
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

        </div>
    </div>
</section>

{{-- MODAL POPUP LIGHTBOX (Bootstrap 5 Bawaan) --}}
<div class="modal fade" id="lightboxModal" tabindex="-1" aria-labelledby="lightboxModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-dark border-0 overflow-hidden text-white rounded-4 shadow-lg">
            
            {{-- Tombol Close Pojok Kanan Atas --}}
            <div class="modal-header border-0 p-2 position-absolute top-0 end-0" style="z-index: 1055;">
                <button type="button" class="btn-close btn-close-white bg-dark p-2 rounded-circle" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            {{-- Wadah Gambar Resolusi Penuh --}}
            <div class="modal-body p-0 text-center bg-black d-flex flex-column align-items-center justify-content-center">
                <img src="" id="modalImage" class="img-fluid w-100 h-auto object-contain" style="max-height: 75vh;" alt="Preview Foto">
                
                {{-- Bagian Caption Otomatis Menyesuaikan via JavaScript --}}
                <div id="modalCaptionContainer" class="p-4 w-100 bg-dark text-start border-top border-secondary">
                    <h6 class="text-warning fw-bold mb-2"><i class="bi bi-info-circle me-1"></i> Keterangan Foto:</h6>
                    <p class="mb-0 small text-light-50" id="modalCaption"></p>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- JAVASCRIPT UNTUK AKSI POPUP MODAL --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const lightboxModal = document.getElementById('lightboxModal');
        
        lightboxModal.addEventListener('show.bs.modal', function (event) {
            // Mengambil elemen pembawa data yang di-klik
            const triggerElement = event.relatedTarget;
            
            // Ekstrak data dari atribut HTML
            const imgSrc = triggerElement.getAttribute('data-img-src');
            const imgCaption = triggerElement.getAttribute('data-img-caption');
            
            // Ambil element target di dalam modal
            const modalImage = document.getElementById('modalImage');
            const modalCaption = document.getElementById('modalCaption');
            const modalCaptionContainer = document.getElementById('modalCaptionContainer');
            
            // Masukkan link gambar baru ke tag <img> modal
            modalImage.src = imgSrc;
            
            // Cek apakah caption ada atau kosong/null
            if (imgCaption && imgCaption.trim() !== "") {
                modalCaption.textContent = imgCaption;
                modalCaptionContainer.style.display = 'block'; // Tampilkan wadah caption
            } else {
                modalCaptionContainer.style.display = 'none';  // Sembunyikan jika kosong
            }
        });
    });
</script>

{{-- CUSTOM SCOPED CSS STYLE --}}
<style>
    .object-cover {
        object-fit: cover;
    }
    .object-contain {
        object-fit: contain;
    }
    .transition-img {
        transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .img-wrapper {
        position: relative;
    }
    /* Efek gambar sedikit membesar saat kursor mendekat */
    .img-wrapper:hover .transition-img {
        transform: scale(1.06);
    }
    /* Masking overlay warna hijau khas sekolah al-husainiyyah */
    .gallery-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(25, 135, 84, 0.65);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .img-wrapper:hover .gallery-overlay {
        opacity: 1;
    }
    /* Bayangan halus pada card */
    .gallery-card {
        transition: box-shadow 0.3s ease;
    }
    .gallery-card:hover {
        box-shadow: 0 .75rem 1.5rem rgba(0,0,0,.15) !important;
    }
</style>
@endsection