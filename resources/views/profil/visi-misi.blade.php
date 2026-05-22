@extends('layouts.layouts')

@section('content')
<section id="header-visimisi" class="py-5 bg-light text-center">
    <div class="container py-5" data-aos="fade-up">
        <h1 class="fw-bold display-4 text-success">Visi & Misi</h1>
        <p class="lead text-muted">Arah dan tujuan pendidikan di TK Al Husainiyah</p>
    </div>
</section>

<section id="content-visimisi" class="py-5">
    <div class="container">
        <div class="row g-5">
            {{-- Visi --}}
            <div class="col-lg-5" data-aos="fade-right">
                <div class="card h-100 border-0 shadow-lg bg-success text-white text-center p-5 rounded-4">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <i class="fas fa-eye fa-4x mb-4 text-warning"></i>
                        <h2 class="fw-bold mb-4">VISI</h2>
                        <div class="lead fst-italic">
                            {!! $profile->visi !!}
                        </div>
                    </div>
                </div>
            </div>

            {{-- Misi --}}
            <div class="col-lg-7" data-aos="fade-left">
                <div class="card h-100 border-0 shadow-sm p-4 rounded-4">
                    <div class="card-body">
                        <h2 class="fw-bold text-success mb-4 text-center">
                            <i class="fas fa-list-ul me-2"></i>MISI
                        </h2>
                        <div class="lead text-muted">
                            {!! $profile->misi !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection