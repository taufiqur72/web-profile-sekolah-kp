@extends('layouts.layouts')

@section('content')
<section id="header-alumni-prestasi" class="py-5 bg-light text-center">
    <div class="container py-5" data-aos="fade-up">
        <h1 class="fw-bold display-4 text-success">Prestasi Alumni</h1>
        <p class="lead text-muted">Jejak langkah membanggakan para lulusan SMP Al Husainiyah</p>
    </div>
</section>

<section id="content-alumni-prestasi" class="py-5">
    <div class="container">
        
        <div class="row g-4">
            {{-- Alumni Achievement Item --}}
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="row g-0 h-100">
                        <div class="col-md-4">
                            <img src="https://via.placeholder.com/300x400" class="img-fluid h-100 w-100 object-fit-cover" alt="Alumni 1">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4 d-flex flex-column justify-content-center h-100">
                                <span class="badge bg-warning text-dark align-self-start mb-2">Akademik</span>
                                <h4 class="card-title fw-bold">Dr. Fulan bin Fulan</h4>
                                <p class="text-muted mb-2">Angkatan 2012</p>
                                <p class="card-text">
                                    Lulusan terbaik Universitas Indonesia dan kini menjabat sebagai peneliti muda di lembaga riset nasional.
                                    Berhasil mempublikasikan 10 jurnal internasional bereputasi.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="row g-0 h-100">
                        <div class="col-md-4">
                            <img src="https://via.placeholder.com/300x400" class="img-fluid h-100 w-100 object-fit-cover" alt="Alumni 2">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4 d-flex flex-column justify-content-center h-100">
                                <span class="badge bg-success text-white align-self-start mb-2">Olahraga</span>
                                <h4 class="card-title fw-bold">Rizky Pratama</h4>
                                <p class="text-muted mb-2">Angkatan 2018</p>
                                <p class="card-text">
                                    Atlet bulutangkis nasional yang telah menjuarai berbagai turnamen tingkat Asia Tenggara. 
                                    Mengharumkan nama bangsa dan almamater.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="row g-0 h-100">
                        <div class="col-md-4">
                            <img src="https://via.placeholder.com/300x400" class="img-fluid h-100 w-100 object-fit-cover" alt="Alumni 3">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4 d-flex flex-column justify-content-center h-100">
                                <span class="badge bg-info text-white align-self-start mb-2">Wirausaha</span>
                                <h4 class="card-title fw-bold">Anita Wijaya</h4>
                                <p class="text-muted mb-2">Angkatan 2015</p>
                                <p class="card-text">
                                    Founder start-up teknologi pendidikan "EduPintar" yang telah memiliki 1 juta pengguna aktif di seluruh Indonesia.
                                    Masuk dalam daftar Forbes 30 under 30.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="row g-0 h-100">
                        <div class="col-md-4">
                            <img src="https://via.placeholder.com/300x400" class="img-fluid h-100 w-100 object-fit-cover" alt="Alumni 4">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4 d-flex flex-column justify-content-center h-100">
                                <span class="badge bg-danger text-white align-self-start mb-2">Seni & Budaya</span>
                                <h4 class="card-title fw-bold">Dimas Anggara</h4>
                                <p class="text-muted mb-2">Angkatan 2019</p>
                                <p class="card-text">
                                    Seniman lukis muda yang karyanya telah dipamerkan di galeri seni terkemuka di Eropa. 
                                    Mendedikasikan karyanya untuk pelestarian budaya lokal.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
