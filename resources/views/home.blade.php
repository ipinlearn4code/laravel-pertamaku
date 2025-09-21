@extends('layouts.app')

@section('title', 'AlpiNet - Internet Cepat & Stabil di Bekasi')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">
                    Internet Tanpa Batas, 
                    <span class="text-warning">Harga Bersahabat</span>
                </h1>
                <p class="lead mb-4">
                    Nikmati koneksi stabil untuk streaming, belajar online, dan gaming tanpa lag. 
                    Layanan internet cepat & stabil untuk warga Bekasi.
                </p>
                <div class="d-flex gap-3">
                    <a href="{{ url('/contact') }}" class="btn btn-primary-custom btn-lg">
                        <i class="fas fa-phone me-2"></i>Daftar Sekarang
                    </a>
                    <a href="{{ url('/services') }}" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-wifi me-2"></i>Lihat Paket
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <i class="fas fa-wifi" style="font-size: 15rem; opacity: 0.1;"></i>
            </div>
        </div>
    </div>
</section>

<!-- Kenapa Pilih Kami -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="fw-bold mb-3">Kenapa Pilih Kami?</h2>
                <p class="lead text-muted">
                    Kami menghadirkan koneksi handal dengan harga terjangkau untuk rumah, usaha kecil, maupun kebutuhan gaming.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Kecepatan Stabil -->
            <div class="col-lg-6">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-bolt fa-lg"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="fw-bold">⚡ Kecepatan Stabil</h5>
                        <p class="text-muted mb-0">
                            Jaringan handal tanpa putus-putus untuk aktivitas online Anda.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Harga Terjangkau -->
            <div class="col-lg-6">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-dollar-sign fa-lg"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="fw-bold">💰 Harga Terjangkau</h5>
                        <p class="text-muted mb-0">
                            Paket sesuai kebutuhan & budget Anda.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Support Cepat -->
            <div class="col-lg-6">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-headset fa-lg"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="fw-bold">🎧 Support Cepat</h5>
                        <p class="text-muted mb-0">
                            Tim teknis siap membantu Anda kapan saja.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Jangkauan Lokal -->
            <div class="col-lg-6">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-map-marker-alt fa-lg"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="fw-bold">🌍 Jangkauan Lokal</h5>
                        <p class="text-muted mb-0">
                            Fokus melayani area Bekasi dengan kualitas terbaik.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Paket Internet Singkat -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="fw-bold mb-3">Paket Internet Singkat</h2>
                <p class="lead text-muted">
                    Pilih paket yang sesuai dengan kebutuhan internet Anda.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Basic -->
            <div class="col-md-4 text-center">
                <div class="card h-100 border-0 shadow-sm card-hover">
                    <div class="card-body p-4">
                        <div class="text-primary mb-3">
                            <i class="fas fa-wifi fa-3x"></i>
                        </div>
                        <h4 class="fw-bold">Basic</h4>
                        <h5 class="text-primary">10 Mbps</h5>
                        <h3 class="fw-bold text-success">Rp 150.000<small class="text-muted">/bln</small></h3>
                        <p class="text-muted mb-0">
                            Cocok untuk browsing, sosial media & chat.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Family -->
            <div class="col-md-4 text-center">
                <div class="card h-100 border-0 shadow-sm card-hover border-primary">
                    <div class="card-body p-4">
                        <div class="badge bg-primary mb-2">Populer</div>
                        <div class="text-primary mb-3">
                            <i class="fas fa-wifi fa-3x"></i>
                        </div>
                        <h4 class="fw-bold">Family</h4>
                        <h5 class="text-primary">20 Mbps</h5>
                        <h3 class="fw-bold text-success">Rp 250.000<small class="text-muted">/bln</small></h3>
                        <p class="text-muted mb-0">
                            Cocok untuk streaming, meeting online & belajar.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Premium -->
            <div class="col-md-4 text-center">
                <div class="card h-100 border-0 shadow-sm card-hover">
                    <div class="card-body p-4">
                        <div class="text-primary mb-3">
                            <i class="fas fa-wifi fa-3x"></i>
                        </div>
                        <h4 class="fw-bold">Premium</h4>
                        <h5 class="text-primary">50 Mbps</h5>
                        <h3 class="fw-bold text-success">Rp 400.000<small class="text-muted">/bln</small></h3>
                        <p class="text-muted mb-0">
                            Cocok untuk gaming, usaha kecil & streaming 4K.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-4">
            <a href="{{ url('/services') }}" class="btn btn-primary-custom">
                <i class="fas fa-eye me-2"></i>Lihat Semua Layanan
            </a>
        </div>
    </div>
</section>

<!-- Testimoni Pelanggan -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="fw-bold mb-3">Testimoni Pelanggan</h2>
                <p class="lead text-muted">
                    Apa kata pelanggan kami tentang layanan AlpiNet.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-quote-left fa-2x text-primary"></i>
                        </div>
                        <p class="text-muted mb-3">
                            "Internetnya stabil banget, cocok buat kerja WFH."
                        </p>
                        <div class="d-flex align-items-center">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 40px; height: 40px;">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0">Budi</h6>
                                <small class="text-muted">Warga Burangkeng</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-quote-left fa-2x text-primary"></i>
                        </div>
                        <p class="text-muted mb-3">
                            "Anak-anak bisa belajar online lancar, harga juga ramah."
                        </p>
                        <div class="d-flex align-items-center">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 40px; height: 40px;">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0">Ibu Sari</h6>
                                <small class="text-muted">Warga Tambelang</small>
                            </div>
                        </div>
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
                <h2 class="fw-bold mb-3">Siap Untuk Berlangganan?</h2>
                <p class="lead text-muted mb-4">
                    Hubungi kami sekarang dan nikmati internet cepat & stabil di rumah Anda.
                </p>
                <div class="d-flex gap-3 justify-content-center">
                    <a href="{{ url('/contact') }}" class="btn btn-primary-custom btn-lg">
                        <i class="fas fa-phone me-2"></i>Hubungi Kami
                    </a>
                    <a href="{{ url('/about') }}" class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-info-circle me-2"></i>Tentang Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection