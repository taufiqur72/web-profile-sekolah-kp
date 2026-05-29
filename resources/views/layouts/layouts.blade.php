<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- SEO Dinamis --}}
    <title>@yield('meta_title', 'TK Al Husainiyah | Cerdas, Berkarakter, Religius')</title>
    <meta name="description" content="@yield('meta_description', 'Website Resmi TK Al Husainiyah - Cerdas, Berkarakter, Religius')">
    <meta name="keywords" content="@yield('meta_keywords', 'tk al husainiyah, sekolah, berita, informasi')">

    @stack('meta_tags')

    <link rel="shortcut icon" href="{{ asset('assets/icons/favicon-sekolah.ico') }}">
    <title>{{ config('app.name', 'TK Al-Husainiyyah') }}</title>

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    {{-- CSS Libraries --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Custom CSS Global (Versioning agar Cache ter-reset otomatis) --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?v={{ time() }}">
</head>

<body>

    {{-- Navbar --}}
    @include('layouts.navbar')

    {{-- Main Content --}}
    <main style="padding-top: 80px;">
        @yield('content')
    </main>

    {{-- FOOTER SECTION --}}
    <footer id="footer" class="bg-white border-top mt-5">
        <div class="container py-5">
            <div class="row align-items-start g-4" data-aos="fade-up">
                {{-- 1. Navigasi --}}
                <div class="col-12 col-md-3">
                    <h5 class="fw-bold mb-3">Navigasi</h5>
                    <ul class="nav flex-column gap-1 list-unstyled">
                        <li><a href="{{ url('/profil/sambutanh') }}"
                                class="text-decoration-none text-muted small">Profil</a></li>
                        <li><a href="{{ url('/ekstrakulikuler') }}"
                                class="text-decoration-none text-muted small">Alumni</a></li>
                        <li><a href="{{ url('/berita') }}" class="text-decoration-none text-muted small">Berita</a></li>
                        <li><a href="{{ url('/kontak') }}" class="text-decoration-none text-muted small">Kontak</a></li>
                    </ul>
                </div>

                {{-- 2. Media Sosial --}}
                <div class="col-12 col-md-3">
                    <h5 class="fw-bold mb-3">Media Sosial Kami</h5>
                    <div class="d-flex gap-3">
                        <a href="https://www.facebook.com/SMPALHUSAINIYYAH/" target="_blank" class="text-dark"><i
                                class="bi bi-facebook fs-5"></i></a>
                        <a href="https://www.instagram.com/tkalhusainiyyah/" target="_blank" class="text-dark"><i
                                class="bi bi-instagram fs-5"></i></a>
                        <a href="https://www.youtube.com/@SMPALHUSAINIYYAH_OFFICIAL" target="_blank"
                            class="text-dark"><i class="bi bi-youtube fs-5"></i></a>
                    </div>
                </div>

                {{-- 3. Kontak Kami --}}
                <div class="col-12 col-md-3">
                    <h5 class="fw-bold mb-3">Kontak Kami</h5>
                    <ul class="list-unstyled text-muted small">
                        <li class="d-flex align-items-center mb-3">
                            <i class="bi bi-telephone-fill me-2 text-success fs-5"></i>
                            <span class="text-break">(021) 12345678</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="bi bi-envelope-at-fill me-2 text-success fs-5"></i>
                            <span class="text-break">info@smpalhusainiyyah.sch.id</span>
                        </li>
                    </ul>
                </div>

                {{-- 4. Alamat Sekolah --}}
                <div class="col-12 col-md-3">
                    <h5 class="fw-bold mb-3">Alamat Sekolah</h5>
                    <div class="d-flex small text-muted">
                        <i class="bi bi-geo-alt-fill me-2 text-success fs-5"></i>
                        <p class="mb-0">Jl. Raya Puspitek No. 123, Kel. Buaran, Kec. Serpong, Kota Tangerang Selatan,
                            Banten 15310</p>
                    </div>
                </div>
            </div>
            <hr class="my-4 opacity-25">
            <p class="text-center small text-muted mb-0">&copy; {{ date('Y') }} SMP Al Husainiyyah. All rights
                reserved.</p>
        </div>
    </footer>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 100,
            easing: 'ease-out-cubic'
        });

        // Navbar Scroll Effect
        const navbar = document.querySelector(".navbar");
        let lastScrollY = window.scrollY;
        window.addEventListener("scroll", () => {
            if (!navbar) return;
            const scrollY = window.scrollY;
            if (scrollY > 50) {
                navbar.classList.toggle("navbar-hidden", scrollY > lastScrollY);
            } else {
                navbar.classList.remove("navbar-hidden");
            }
            lastScrollY = scrollY;
        });
    </script>
</body>

</html>
