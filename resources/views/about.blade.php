@extends('layouts.app')

@section('title', 'Tentang Kami - AlpiNet')

@section('content')
<!-- Page Header -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-4">Tentang AlpiNet</h1>
                <p class="lead">
                    Penyedia layanan internet terpercaya untuk masyarakat Bekasi dengan komitmen 
                    memberikan koneksi stabil dan harga terjangkau.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Company History -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4">Sejarah Kami</h2>
                <p class="text-muted mb-4">
                    AlpiNet didirikan dengan misi sederhana: menyediakan akses internet berkualitas 
                    dengan harga yang terjangkau untuk masyarakat Bekasi. Kami memahami betapa 
                    pentingnya koneksi internet yang stabil untuk kehidupan sehari-hari.
                </p>
                <p class="text-muted mb-4">
                    Berawal dari kebutuhan akan internet yang handal di lingkungan sekitar, 
                    AlpiNet terus berkembang melayani berbagai kebutuhan digital masyarakat, 
                    mulai dari rumahan hingga usaha kecil menengah.
                </p>
                <p class="text-muted">
                    Saat ini, kami bangga menjadi pilihan utama provider internet lokal yang 
                    fokus pada kualitas layanan dan kepuasan pelanggan di wilayah Bekasi.
                </p>
            </div>
            <div class="col-lg-6 text-center">
                <div class="bg-light rounded p-5">
                    <i class="fas fa-wifi text-primary" style="font-size: 8rem; opacity: 0.3;"></i>
                    <h4 class="fw-bold mt-3">Internet Stabil</h4>
                    <p class="text-muted mb-0">untuk Masyarakat Bekasi</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision & Mission -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="fw-bold mb-3">Visi & Misi Kami</h2>
                <p class="lead text-muted">
                    Prinsip yang mendasari setiap langkah AlpiNet dalam melayani masyarakat.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Vision -->
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-sm card-hover">
                    <div class="card-body p-5 text-center">
                        <div class="text-primary mb-4">
                            <i class="fas fa-eye fa-3x"></i>
                        </div>
                        <h3 class="fw-bold mb-4">Visi Kami</h3>
                        <p class="text-muted">
                            Menjadi penyedia layanan internet terdepan di Bekasi yang menghadirkan 
                            koneksi berkualitas, stabil, dan terjangkau untuk mendukung kemajuan 
                            digital masyarakat lokal.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Mission -->
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-sm card-hover">
                    <div class="card-body p-5 text-center">
                        <div class="text-primary mb-4">
                            <i class="fas fa-bullseye fa-3x"></i>
                        </div>
                        <h3 class="fw-bold mb-4">Misi Kami</h3>
                        <p class="text-muted">
                            Memberikan layanan internet berkualitas tinggi dengan harga yang 
                            kompetitif, dukungan teknis yang responsif, dan komitmen untuk 
                            terus meningkatkan kualitas layanan demi kepuasan pelanggan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Core Values -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="fw-bold mb-3">Nilai-nilai Kami</h2>
                <p class="lead text-muted">
                    Prinsip fundamental yang membentuk budaya dan memandu tindakan kami.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Reliability -->
            <div class="col-lg-4 col-md-6">
                <div class="text-center">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-shield-alt fa-2x"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Keandalan</h5>
                    <p class="text-muted">
                        Kami berkomitmen memberikan layanan internet yang stabil dan dapat 
                        diandalkan untuk mendukung aktivitas digital Anda setiap hari.
                    </p>
                </div>
            </div>

            <!-- Affordability -->
            <div class="col-lg-4 col-md-6">
                <div class="text-center">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-dollar-sign fa-2x"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Keterjangkauan</h5>
                    <p class="text-muted">
                        Menawarkan paket internet dengan harga yang bersahabat tanpa 
                        mengorbankan kualitas layanan yang diberikan.
                    </p>
                </div>
            </div>

            <!-- Local Focus -->
            <div class="col-lg-4 col-md-6">
                <div class="text-center">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-map-marker-alt fa-2x"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Fokus Lokal</h5>
                    <p class="text-muted">
                        Memahami kebutuhan spesifik masyarakat Bekasi dan memberikan 
                        solusi yang tepat untuk kondisi lingkungan setempat.
                    </p>
                </div>
            </div>

            <!-- Customer Service -->
            <div class="col-lg-4 col-md-6">
                <div class="text-center">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-headset fa-2x"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Layanan Prima</h5>
                    <p class="text-muted">
                        Tim teknis yang responsif dan siap membantu kapan saja untuk 
                        memastikan pengalaman internet yang optimal.
                    </p>
                </div>
            </div>

            <!-- Innovation -->
            <div class="col-lg-4 col-md-6">
                <div class="text-center">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-lightbulb fa-2x"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Inovasi</h5>
                    <p class="text-muted">
                        Terus mengembangkan teknologi dan metode untuk memberikan 
                        layanan internet yang semakin baik dan efisien.
                    </p>
                </div>
            </div>

            <!-- Community -->
            <div class="col-lg-4 col-md-6">
                <div class="text-center">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Komunitas</h5>
                    <p class="text-muted">
                        Berkomitmen untuk berkontribusi dalam memajukan digitalisasi 
                        dan konektivitas di komunitas lokal Bekasi.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Komitmen Pelayanan -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="fw-bold mb-3">Komitmen Pelayanan</h2>
                <p class="lead text-muted">
                    Dedikasi kami untuk memberikan pengalaman internet terbaik.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <!-- 24/7 Support -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm card-hover text-center">
                    <div class="card-body p-4">
                        <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 100px; height: 100px;">
                            <i class="fas fa-clock fa-3x text-primary"></i>
                        </div>
                        <h5 class="fw-bold">Support 24/7</h5>
                        <p class="text-primary mb-2">Siap Membantu Kapan Saja</p>
                        <p class="text-muted small">
                            Tim teknis kami siaga untuk membantu mengatasi masalah koneksi.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Quick Installation -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm card-hover text-center">
                    <div class="card-body p-4">
                        <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 100px; height: 100px;">
                            <i class="fas fa-tools fa-3x text-primary"></i>
                        </div>
                        <h5 class="fw-bold">Instalasi Cepat</h5>
                        <p class="text-primary mb-2">Proses Mudah & Efisien</p>
                        <p class="text-muted small">
                            Proses instalasi yang cepat dengan teknisi berpengalaman.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Local Team -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm card-hover text-center">
                    <div class="card-body p-4">
                        <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 100px; height: 100px;">
                            <i class="fas fa-home fa-3x text-primary"></i>
                        </div>
                        <h5 class="fw-bold">Tim Lokal</h5>
                        <p class="text-primary mb-2">Melayani Area Bekasi</p>
                        <p class="text-muted small">
                            Tim lokal yang memahami kebutuhan dan kondisi wilayah Bekasi.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="fw-bold mb-3">Siap Bergabung dengan AlpiNet?</h2>
                <p class="lead text-muted mb-4">
                    Bergabunglah dengan ribuan pelanggan yang telah merasakan kualitas 
                    layanan internet AlpiNet di wilayah Bekasi.
                </p>
                <div class="d-flex gap-3 justify-content-center">
                    <a href="{{ url('/services') }}" class="btn btn-primary-custom btn-lg">
                        <i class="fas fa-wifi me-2"></i>Lihat Paket Internet
                    </a>
                    <a href="{{ url('/contact') }}" class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-phone me-2"></i>Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection