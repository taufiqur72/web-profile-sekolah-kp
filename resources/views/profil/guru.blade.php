@extends('layouts.layouts')

@section('content')
    <section id="header-guru" class="py-5 bg-light text-center">
        <div class="container py-5" data-aos="fade-up">
            <h1 class="fw-bold display-4 text-success">Tenaga Pendidik</h1>
            <p class="lead text-muted">Guru-guru profesional yang siap membimbing siswa SMP Al Husainiyah</p>
        </div>
    </section>

    <section id="content-guru" class="py-5">
        <div class="container">
            <div class="row g-4 justify-content-center">
                @forelse($gurus as $guru)
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                        <div class="card border-0 shadow-sm text-center h-100 teacher-card">
                            <div class="card-body p-4">
                                <div class="mb-3">
                                    <img src="{{ $guru->foto ? asset('storage/' . $guru->foto) : 'https://via.placeholder.com/150' }}"
                                        class="rounded-circle img-fluid border border-4 border-white shadow-sm"
                                        alt="{{ $guru->nama_lengkap }}" style="width: 120px; height: 120px; object-fit: cover;">
                                </div>
                                <h5 class="fw-bold mb-1">{{ $guru->nama_lengkap }}</h5>
                                <p class="text-success small mb-2 fw-bold">{{ $guru->jabatan }}</p>
                                <p class="text-muted small">{{ $guru->bidang_studi }}</p>
                                @if($guru->label)
                                    <span class="badge bg-light text-secondary mt-2">{{ $guru->label }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">Data guru belum tersedia.</p>
                    </div>
                @endforelse
            </div>
    </section>
@endsection