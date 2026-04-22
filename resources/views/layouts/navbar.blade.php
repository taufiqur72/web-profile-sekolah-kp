<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="{{ asset('assets/icons/favicon-sekolah.ico') }}" alt="Logo">
            <span class="ms-2 fw-bold text-success d-none d-sm-block">TK Al Husainiyah</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::is('profil*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Profil
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow">
                        <li><a class="dropdown-item" href="/profil/sambutan">Sambutan Kepala Sekolah</a></li>
                        <li><a class="dropdown-item" href="/profil/sejarah">Sejarah</a></li>
                        <li><a class="dropdown-item" href="/profil/visi-misi">Visi & Misi</a></li>
                        <li><a class="dropdown-item" href="/profil/guru">Tenaga Pendidik</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::is('alumni*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Alumni
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow">
                        <li><a class="dropdown-item" href="/alumni/info">Informasi Alumni</a></li>
                        <li><a class="dropdown-item" href="/alumni/prestasi">Prestasi Alumni</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('berita*') ? 'active' : '' }}" href="/berita">Berita</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::is('galeri*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Galeri
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow">
                        <li><a class="dropdown-item" href="/galeri">Foto Kegiatan</a></li>
                        <li><a class="dropdown-item" href="/galeri/ekstrakulikuler">Ekstrakulikuler</a></li>
                    </ul>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link {{ Request::is('kontak*') ? 'active' : '' }}" href="/kontak">Kontak</a>
                </li>
                <li class="nav-item">
                    <a href="/login" class="btn btn-danger px-4 shadow-sm">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>