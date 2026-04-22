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
                <img src="{{ asset('assets/images/placeholder-kepsek.jpg') }}" class="img-fluid rounded shadow-lg" alt="Kepala Sekolah" onerror="this.src='https://via.placeholder.com/400x500?text=Foto+Kepsek'">
            </div>
            <div class="col-lg-8" data-aos="fade-left">
                <h3 class="fw-bold mb-3">Assalamu'alaikum Warahmatullahi Wabarakatuh</h3>
                <p class="text-muted">
                    Puji syukur kita panjatkan ke hadirat Allah SWT yang telah memberikan rahmat dan hidayah-Nya kepada kita semua. 
                    Website ini kami hadirkan sebagai media informasi dan komunikasi antara sekolah, orang tua, siswa, dan masyarakat luas.
                </p>
                <p class="text-muted">
                    SMP Al Husainiyah berkomitmen untuk mencetak generasi yang tidak hanya unggul dalam prestasi akademik, 
                    tetapi juga memiliki karakter mulia dan berlandaskan nilai-nilai agama yang kuat. 
                    Kami terus berupaya meningkatkan kualitas pendidikan melalui inovasi pembelajaran dan pengembangan diri siswa.
                </p>
                <p class="text-muted">
                    Semoga website ini dapat memberikan manfaat bagi kita semua. Terima kasih atas kepercayaan Bapak/Ibu 
                    yang telah mengamanahkan putra-putrinya untuk dididik di sekolah kami.
                </p>
                <br>
                <h5 class="fw-bold text-success">H. Ahmad Fauzi, S.Pd., M.M.</h5>
                <p class="text-muted small">Kepala Sekolah SMP Al Husainiyah</p>
            </div>
        </div>
    </div>
</section>
@endsection
