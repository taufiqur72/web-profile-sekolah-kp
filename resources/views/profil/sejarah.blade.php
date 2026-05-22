@extends('layouts.layouts')

@section('content')
<section id="header-sejarah" class="py-5 bg-light text-center">
    <div class="container py-5" data-aos="fade-up">
        <h1 class="fw-bold display-4 text-success">Sejarah Sekolah</h1>
        <p class="lead text-muted">Perjalanan panjang TK Al Husainiyah dalam mencerdaskan bangsa</p>
    </div>
</section>

<section id="content-sejarah" class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10" data-aos="fade-up">
                {!! $profile->konten_sejarah !!}
            </div>
        </div>
    </div>
</section>
@endsection