@extends('layouts.layouts')

@section('content')
<section id="header-sejarah" class="py-5 bg-light text-center">
    <div class="container py-5" data-aos="fade-up">
        <h1 class="fw-bold display-4 text-success">Sejarah Sekolah</h1>
        <p class="lead text-muted">Perjalanan panjang SMP Al Husainiyah dalam mencerdaskan bangsa</p>
    </div>
</section>

<section id="content-sejarah" class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10" data-aos="fade-up">
                <div class="timeline-wrapper">
                    <div class="card border-0 shadow-sm mb-4 p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="badge bg-success fs-5 px-3 py-2 rounded-pill me-3">2010</div>
                            <h4 class="fw-bold mb-0">Pendirian Yayasan</h4>
                        </div>
                        <p class="text-muted">
                            Yayasan Pendidikan Al Husainiyah didirikan dengan niat tulus untuk memberikan akses pendidikan berkualitas 
                            bagi masyarakat sekitar yang membutuhkan, dengan basis nilai-nilai keislaman yang kuat.
                        </p>
                    </div>

                    <div class="card border-0 shadow-sm mb-4 p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="badge bg-success fs-5 px-3 py-2 rounded-pill me-3">2012</div>
                            <h4 class="fw-bold mb-0">Berdirinya SMP Al Husainiyah</h4>
                        </div>
                        <p class="text-muted">
                            SMP Al Husainiyah resmi beroperasi dengan angkatan pertama sebanyak 45 siswa dan 3 ruang kelas. 
                            Fasilitas yang terbatas tidak menyurutkan semangat para pendidik untuk memberikan yang terbaik.
                        </p>
                    </div>

                    <div class="card border-0 shadow-sm mb-4 p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="badge bg-success fs-5 px-3 py-2 rounded-pill me-3">2016</div>
                            <h4 class="fw-bold mb-0">Akreditasi B</h4>
                        </div>
                        <p class="text-muted">
                            Setelah 4 tahun berjalan, SMP Al Husainiyah berhasil mendapatkan akreditasi B dari Badan Akreditasi Nasional Sekolah/Madrasah (BAN-S/M), 
                            sebuah pencapaian yang membanggakan bagi seluruh civitas akademika.
                        </p>
                    </div>

                    <div class="card border-0 shadow-sm mb-4 p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="badge bg-success fs-5 px-3 py-2 rounded-pill me-3">2026</div>
                            <h4 class="fw-bold mb-0">Era Digital & Modernisasi</h4>
                        </div>
                        <p class="text-muted">
                            Kini, SMP Al Husainiyah telah berkembang menjadi sekolah modern dengan fasilitas lengkap seperti laboratorium komputer, 
                            perpustakaan digital, dan ruang kelas multimedia, siap mencetak generasi emas di era digital.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
