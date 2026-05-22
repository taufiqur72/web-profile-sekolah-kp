@extends('layouts.layouts')

@section('content')
<section id="header-alumni-info" class="py-5 bg-light text-center">
    <div class="container py-5" data-aos="fade-up">
        <h1 class="fw-bold display-4 text-success">Daftar Alumni</h1>
        <p class="lead text-muted">Jejaring angkatan alumni TK Al Husainiyyah yang terikat dalam tali silaturahmi</p>
    </div>
</section>

<section id="content-alumni-info" class="py-5">
    <div class="container">
        {{-- Grid Daftar Angkatan Alumni --}}
        <div class="row g-4 justify-content-center">
            <div class="col-lg-12">
                <h3 class="fw-bold text-success mb-4 border-bottom pb-2">Daftar Angkatan Alumni</h3>
            </div>
            
            {{-- DATA DUMMY STATIS (Hanya Nama Angkatan & Foto) --}}
            @php
                $dummyAlumni = [
                    [
                        'id' => 1,
                        'nama_angkatan' => 'Angkatan 2020/2021',
                        'foto' => 'https://images.unsplash.com/photo-1588072432836-e10032774350?w=500&auto=format&fit=crop&q=60',
                    ],
                    [
                        'id' => 2,
                        'nama_angkatan' => 'Angkatan 2021/2022',
                        'foto' => 'https://images.unsplash.com/photo-1577896851231-70ef18881754?w=500&auto=format&fit=crop&q=60',
                    ],
                    [
                        'id' => 3,
                        'nama_angkatan' => 'Angkatan 2022/2023',
                        'foto' => 'https://images.unsplash.com/photo-1564981797816-1043664bf78d?w=500&auto=format&fit=crop&q=60',
                    ],
                ];
            @endphp

            @foreach($dummyAlumni as $alumni)
                {{-- Alumni Card Item --}}
                <div class="col-md-6 col-lg-4" data-aos="fade-up">
                    <div class="card h-100 border-0 shadow-sm overflow-hidden rounded-3 hover-shadow transition">
                        
                        {{-- Thumbnail Foto Angkatan --}}
                        <div class="position-relative" style="height: 240px; overflow: hidden;">
                            <img src="{{ $alumni['foto'] }}" class="w-100 h-100 object-cover" alt="Foto {{ $alumni['nama_angkatan'] }}">
                        </div>

                        {{-- Konten Card (Hanya Nama Angkatan & Tombol) --}}
                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <div class="mb-3">
                                <h5 class="fw-bold text-dark m-0">{{ $alumni['nama_angkatan'] }}</h5>
                            </div>
                            
                            {{-- Tombol interaksi menuju galeri foto --}}
                            <a href="#" class="btn btn-outline-success btn-sm w-100 rounded-pill fw-bold">
                                Lihat Galeri Foto <i class="bi bi-images ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>

{{-- Tambahan CSS sedikit agar rasio foto konsisten dan rapi --}}
<style>
    .object-cover {
        object-fit: cover;
    }
    .hover-shadow:hover {
        transform: translateY(-5px);
        box-shadow: 0 .5rem 1.5rem rgba(0,0,0,.1) !important;
    }
    .transition {
        transition: all 0.3s ease-in-out;
    }
</style>
@endsection