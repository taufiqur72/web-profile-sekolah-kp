<nav class="navbar navbar-expand-lg fixed-top bg-white shadow-sm py-3">
    <div class="container">
        {{-- Brand --}}
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
            <img src="{{ asset('assets/icons/favicon-sekolah.ico') }}" alt="Logo TK Al Husainiyah" width="40" height="40">
            <span class="fw-bold text-success d-none d-sm-block">TK Al Husainiyah</span>
        </a>

        {{-- Toggler Mobile --}}
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Menu Navigasi --}}
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active text-success fw-bold' : 'text-dark' }}" href="{{ url('/') }}">Beranda</a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown">Profil</a>
                    <ul class="dropdown-menu border-0 shadow-lg mt-2 rounded-3">
                        <li><a class="dropdown-item py-2" href="{{ url('/profil/sambutan') }}">Sambutan Kepala Sekolah</a></li>
                        <li><a class="dropdown-item py-2" href="{{ url('/profil/sejarah') }}">Sejarah</a></li>
                        <li><a class="dropdown-item py-2" href="{{ url('/profil/visi-misi') }}">Visi & Misi</a></li>
                        <li><a class="dropdown-item py-2" href="{{ url('/profil/guru') }}">Tenaga Pendidik</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ url('/alumni') }}">Alumni</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ url('/berita') }}">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ url('/kontak') }}">Kontak</a>
                </li>

                <li class="nav-item mt-2 mt-lg-0">
                    <a href="{{ url('/admin/login') }}" class="btn btn-outline-danger rounded-pill px-4" rel="nofollow">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>