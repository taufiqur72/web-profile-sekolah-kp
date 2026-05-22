
@extends('layouts.layouts')

@section('content')
<section id="header-profil" class="py-5 bg-light text-center">
    <div class="container py-5" data-aos="fade-up">
        <h1 class="fw-bold display-4 text-success">Sambutan Kepala Sekolah</h1>
        <p class="lead text-muted">Selamat datang di sambutan resmi Kepala Sekolah SMP Al Husainiyah</p>
    </div>
</section>

<section id="content-sambutan" class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 mb-4 mb-lg-0" data-aos="fade-right">
                <img
                    src="{{ $profile->foto_profil ? Storage::url($profile->foto_profil) : 'https://via.placeholder.com/400x500?text=Foto+Kepsek' }}"
                    class="img-fluid rounded shadow-lg"
                    alt="Kepala Sekolah"
                    onerror="this.src='https://via.placeholder.com/400x500?text=Foto+Kepsek'"
                >
            </div>
            <div class="col-lg-8" data-aos="fade-left">
                {!! $profile->konten_sambutan !!}
                <br>
                <h5 class="fw-bold text-success">{{ $profile->nama_kepsek }}</h5>
                <p class="text-muted small">{{ $profile->label }}</p>
            </div>
        </div>
    </div>
</section>
@endsection