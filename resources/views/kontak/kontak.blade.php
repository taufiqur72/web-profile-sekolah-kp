@extends('layouts.layouts')

{{-- OPTIMASI SEO DINAMIS --}}
@section('meta_title', 'Hubungi Kami | TK Al Husainiyah')
@section('meta_description', 'Hubungi pusat layanan informasi resmi TK Al Husainiyah. Temukan alamat lengkap sekolah, nomor telepon aktif, email resmi, dan peta lokasi kami.')

@section('content')
    <section id="kontak" class="pt-5">
        <div class="container py-5">
            {{-- HERO SECTION BANNER --}}
            <section class="py-5 text-white pt-5" style="margin-top: 76px; background-color: var(--emerald-green, #009b4d); border-radius: 15px;">
                <div class="container py-5 text-center">
                    <span class="badge text-bg-light text-success mb-2 px-3 py-2 rounded-pill fw-bold border-0 shadow-sm"
                        data-aos="fade-down">Pusat Layanan</span>
                    <h1 class="display-4 fw-bold" data-aos="fade-down" data-aos-delay="100">Hubungi Kami</h1>
                    <p class="lead mb-0 opacity-75 mx-auto mt-2" style="max-width: 600px;" data-aos="fade-up"
                        data-aos-delay="200">
                        Silakan hubungi kami melalui informasi di bawah ini atau kunjungi langsung lokasi sekolah kami pada jam kerja.
                    </p>
                </div>
            </section>

            {{-- DETAIL INFORMASI UTAMA --}}
            <section class="py-5 bg-light">
                <div class="container py-5">

                    {{-- DETAIL KONTAK HORIZONTAL --}}
                    <div class="row g-4 mb-5" data-aos="fade-up">
                        {{-- Cek apakah variabel $kontak ada dan isinya tidak null --}}
                        @if (isset($kontak) && $kontak)
                            {{-- Alamat --}}
                            <div class="col-md-4">
                                <div class="card border-0 shadow-sm h-100 p-4 contact-card bg-white rounded-4">
                                    <div class="d-flex align-items-start">
                                        <div class="icon-box fs-3" style="color: #009b4d;">
                                            <i class="bi bi-geo-alt-fill"></i>
                                        </div>
                                        <div class="ms-3 flex-grow-1" style="min-width: 0;">
                                            <h2 class="text-muted d-block small fw-bold mb-1 uppercase tracking-wider h6">Alamat Sekolah</h2>
                                            <span class="text-dark fw-medium lh-sm d-block">{{ $kontak->address }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="col-md-4">
                                <div class="card border-0 shadow-sm h-100 p-4 contact-card bg-white rounded-4">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box fs-3" style="color: #009b4d;">
                                            <i class="bi bi-envelope-at-fill"></i>
                                        </div>
                                        <div class="ms-3 flex-grow-1" style="min-width: 0;">
                                            <h2 class="text-muted d-block small fw-bold mb-1 uppercase tracking-wider h6">Email Resmi</h2>
                                            <a href="mailto:{{ $kontak->email }}"
                                                class="fw-medium text-dark text-decoration-none d-block text-break">
                                                {{ $kontak->email }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Telepon --}}
                            <div class="col-md-4">
                                <div class="card border-0 shadow-sm h-100 p-4 contact-card bg-white rounded-4">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box fs-3" style="color: #009b4d;">
                                            <i class="bi bi-telephone-fill"></i>
                                        </div>
                                        <div class="ms-3 flex-grow-1" style="min-width: 0;">
                                            <h2 class="text-muted d-block small fw-bold mb-1 uppercase tracking-wider h6">Nomor Telepon</h2>
                                            <a href="tel:{{ preg_replace('/\s+/', '', $kontak->phone) }}"
                                                class="fw-medium text-dark text-decoration-none d-block">
                                                {{ $kontak->phone }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            {{-- Tampilan Cadangan/Fallback jika isi database kosong --}}
                            <div class="col-12 text-center text-muted py-4">
                                <div class="card border-0 shadow-sm p-4 bg-white rounded-4">
                                    <p class="mb-0">Data informasi kontak belum diunggah di database.</p>
                                </div>
                            </div>
                        @endif
                    </div>

                    {{-- PETA GOOGLE MAPS INTERAKTIF --}}
                    <div class="row" data-aos="fade-up" data-aos-delay="200">
                        <div class="col-12">
                            <div class="card border-0 shadow-sm overflow-hidden rounded-4">
                                <iframe width="100%" height="480" frameborder="0" style="border:0;"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.7197241285273!2d106.6891253!3d-6.3532999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e5a6a68f773d%3A0x6b4038fc9f12dfbb!2sJl.%20Raya%20Puspitek%2C%20Kota%20Tangerang%20Selatan%2C%20Banten!5e0!3m2!1sid!2sid!4v1716380000000!5m2!1sid!2sid"
                                    allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                                    title="Peta Lokasi Resmi TK Al Husainiyah Serpong">
                                </iframe>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </section>
@endsection