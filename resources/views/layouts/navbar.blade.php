<nav class="navbar navbar-expand-lg fixed-top bg-white shadow-sm">
    <div class="container">
        {{-- Brand Logo & Nama Sekolah --}}
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="{{ asset('assets/icons/favicon-sekolah.ico') }}" alt="Logo Resmi TK Al Husainiyah" width="40" height="40">
            <span class="ms-2 fw-bold text-success d-none d-sm-block">TK Al Husainiyah</span>
        </a>
        
        {{-- Tombol Toggler untuk Mobile --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Menu Navigasi --}}
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                
                {{-- Beranda --}}
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active fw-bold text-success' : '' }}" href="/">Beranda</a>
                </li>
                
                {{-- Dropdown: Profil --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::is('profil*') ? 'active fw-bold text-success' : '' }}" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Profil
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                        <li><a class="dropdown-item {{ Request::is('profil/sambutan') ? 'active' : '' }}" href="/profil/sambutan">Sambutan Kepala Sekolah</a></li>
                        <li><a class="dropdown-item {{ Request::is('profil/sejarah') ? 'active' : '' }}" href="/profil/sejarah">Sejarah</a></li>
                        <li><a class="dropdown-item {{ Request::is('profil/visi-misi') ? 'active' : '' }}" href="/profil/visi-misi">Visi & Misi</a></li>
                        <li><a class="dropdown-item {{ Request::is('profil/guru') ? 'active' : '' }}" href="/profil/guru">Tenaga Pendidik</a></li>
                    </ul>
                </li>
                
                {{-- Dropdown: Alumni --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::is('alumni*') ? 'active fw-bold text-success' : '' }}" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Alumni
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                        <li><a class="dropdown-item {{ Request::is('alumni/info') ? 'active' : '' }}" href="/alumni/info">Informasi Alumni</a></li>
                        <li><a class="dropdown-item {{ Request::is('alumni/prestasi') ? 'active' : '' }}" href="/alumni/prestasi">Prestasi Alumni</a></li>
                    </ul>
                </li>
                
                {{-- Berita --}}
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('berita*') ? 'active fw-bold text-success' : '' }}" href="/berita">Berita</a>
                </li>
                
                {{-- Kontak --}}
                <li class="nav-item me-3">
                    <a class="nav-link {{ Request::is('kontak*') ? 'active fw-bold text-success' : '' }}" href="/kontak">Kontak</a>
                </li>
                
                {{-- Tombol Login CMS Admin (Filament - Secure Path & SEO Safe) --}}
                <li class="nav-item">
                    <a href="/admin/login" class="btn btn-danger px-4 shadow-sm fw-medium" rel="nofollow">Login</a>
                </li>

            </ul>
        </div>
    </div>
</nav>