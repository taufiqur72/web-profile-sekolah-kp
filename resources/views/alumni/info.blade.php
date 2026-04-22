@extends('layouts.layouts')

@section('content')
<section id="header-alumni-info" class="py-5 bg-light text-center">
    <div class="container py-5" data-aos="fade-up">
        <h1 class="fw-bold display-4 text-success">Informasi Alumni</h1>
        <p class="lead text-muted">Jejaring alumni SMP Al Husainiyah yang tersebar di berbagai bidang</p>
    </div>
</section>

<section id="content-alumni-info" class="py-5">
    <div class="container">
        
        <div class="row mb-5" data-aos="fade-up">
            <div class="col-12 text-center">
                <div class="card bg-success text-white border-0 shadow-lg p-5 rounded-4">
                    <h3 class="fw-bold mb-3">Bergabunglah dengan Ikatan Alumni!</h3>
                    <p class="mb-4">Pererat tali silaturahmi dan bangun jaringan profesional bersama ribuan alumni lainnya.</p>
                    <div>
                         <a href="#" class="btn btn-warning btn-lg px-5 shadow-sm rounded-pill fw-bold text-dark">Daftar Alumni Sekarang</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-lg-12">
                <h3 class="fw-bold text-success mb-4 border-bottom pb-2">Kabar Alumni</h3>
            </div>
            
            {{-- Alumni News Item --}}
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 border-0 shadow-sm overflow-hidden">
                    <img src="https://via.placeholder.com/400x250" class="card-img-top" alt="Reuni Akbar">
                    <div class="card-body p-4">
                        <small class="text-muted"><i class="bi bi-calendar3 me-2"></i>12 Januari 2026</small>
                        <h5 class="fw-bold mt-2 mb-3">Reuni Akbar Angkatan 2015-2020</h5>
                        <p class="text-muted small">Ribuan alumni memadati halaman sekolah dalam acara reuni akbar yang penuh kehangatan...</p>
                        <a href="#" class="text-success fw-bold text-decoration-none smal">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card h-100 border-0 shadow-sm overflow-hidden">
                    <img src="https://via.placeholder.com/400x250" class="card-img-top" alt="Seminar Karir">
                    <div class="card-body p-4">
                        <small class="text-muted"><i class="bi bi-calendar3 me-2"></i>05 Desember 2025</small>
                        <h5 class="fw-bold mt-2 mb-3">Seminar Karir: Sukses di Era Digital</h5>
                        <p class="text-muted small">Alumni memberikan pembekalan kepada siswa kelas IX tentang peluang karir di masa depan...</p>
                        <a href="#" class="text-success fw-bold text-decoration-none smal">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
             <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card h-100 border-0 shadow-sm overflow-hidden">
                    <img src="https://via.placeholder.com/400x250" class="card-img-top" alt="Donasi Buku">
                    <div class="card-body p-4">
                        <small class="text-muted"><i class="bi bi-calendar3 me-2"></i>20 November 2025</small>
                        <h5 class="fw-bold mt-2 mb-3">Donasi 1000 Buku dari Alumni</h5>
                        <p class="text-muted small">Gerakan literasi sekolah didukung penuh oleh alumni dengan sumbangan buku bacaan berkualitas...</p>
                        <a href="#" class="text-success fw-bold text-decoration-none smal">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
