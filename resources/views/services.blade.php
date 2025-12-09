@extends('layouts.app')

@section('title', 'Paket Internet - AlpiNet')

@section('content')
<!-- Page Header -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-4">Paket Internet AlpiNet</h1>
                <p class="lead">
                    Pilih paket internet yang sesuai dengan kebutuhan dan budget Anda. 
                    Internet cepat, stabil, dan harga terjangkau untuk semua kalangan.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Paket Internet Utama -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="fw-bold mb-3">Paket Internet Utama</h2>
                <p class="lead text-muted">
                    Paket internet rumahan dengan kecepatan dan kuota yang bervariasi sesuai kebutuhan Anda.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Basic Package -->
            <div class="col-lg-4">
                <div class="card h-100 border-0 shadow-sm card-hover">
                    <div class="card-body p-5 text-center">
                        <div class="text-primary mb-4">
                            <i class="fas fa-wifi fa-3x"></i>
                        </div>
                        <h3 class="fw-bold mb-3">Basic</h3>
                        <div class="mb-4">
                            <h1 class="fw-bold text-primary">10 Mbps</h1>
                            <p class="text-muted">Download & Upload</p>
                        </div>
                        <div class="mb-4">
                            <h2 class="fw-bold text-success">Rp 150.000<small class="text-muted fs-6">/bulan</small></h2>
                        </div>
                        <ul class="list-unstyled text-start mb-4">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Cocok untuk browsing & sosial media</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Streaming video 720p</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Chat & video call</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Support 1-2 device</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Support 24/7</li>
                        </ul>
                        <a href="{{ url('/contact') }}" class="btn btn-outline-primary btn-lg w-100">
                            Pilih Paket
                        </a>
                    </div>
                </div>
            </div>

            <!-- Family Package - Popular -->
            <div class="col-lg-4">
                <div class="card h-100 border-primary shadow card-hover position-relative">
                    <div class="position-absolute top-0 start-50 translate-middle">
                        <span class="badge bg-primary px-3 py-2">POPULER</span>
                    </div>
                    <div class="card-body p-5 text-center">
                        <div class="text-primary mb-4">
                            <i class="fas fa-wifi fa-3x"></i>
                        </div>
                        <h3 class="fw-bold mb-3">Family</h3>
                        <div class="mb-4">
                            <h1 class="fw-bold text-primary">20 Mbps</h1>
                            <p class="text-muted">Download & Upload</p>
                        </div>
                        <div class="mb-4">
                            <h2 class="fw-bold text-success">Rp 250.000<small class="text-muted fs-6">/bulan</small></h2>
                        </div>
                        <ul class="list-unstyled text-start mb-4">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Streaming HD tanpa buffering</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Meeting online lancar</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Belajar online stabil</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Support 3-5 device</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Support 24/7</li>
                        </ul>
                        <a href="{{ url('/contact') }}" class="btn btn-primary btn-lg w-100">
                            Pilih Paket
                        </a>
                    </div>
                </div>
            </div>

            <!-- Premium Package -->
            <div class="col-lg-4">
                <div class="card h-100 border-0 shadow-sm card-hover">
                    <div class="card-body p-5 text-center">
                        <div class="text-primary mb-4">
                            <i class="fas fa-wifi fa-3x"></i>
                        </div>
                        <h3 class="fw-bold mb-3">Premium</h3>
                        <div class="mb-4">
                            <h1 class="fw-bold text-primary">50 Mbps</h1>
                            <p class="text-muted">Download & Upload</p>
                        </div>
                        <div class="mb-4">
                            <h2 class="fw-bold text-success">Rp 400.000<small class="text-muted fs-6">/bulan</small></h2>
                        </div>
                        <ul class="list-unstyled text-start mb-4">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Gaming online tanpa lag</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Streaming 4K Ultra HD</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Usaha kecil & kantor</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Support 5-10 device</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Priority support</li>
                        </ul>
                        <a href="{{ url('/contact') }}" class="btn btn-outline-primary btn-lg w-100">
                            Pilih Paket
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Paket Spesial -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="fw-bold mb-3">Paket Spesial</h2>
                <p class="lead text-muted">
                    Paket khusus untuk kebutuhan tertentu dengan harga dan fitur yang disesuaikan.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Student Package -->
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-sm card-hover">
                    <div class="card-body p-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 60px; height: 60px;">
                                <i class="fas fa-graduation-cap fa-lg"></i>
                            </div>
                            <div>
                                <h3 class="fw-bold mb-0">Student</h3>
                                <p class="text-muted mb-0">15 Mbps - Rp 180.000/bulan</p>
                            </div>
                        </div>
                        <p class="text-muted mb-4">
                            Paket khusus untuk pelajar dan mahasiswa dengan harga spesial. 
                            Cocok untuk belajar online, tugas, dan riset.
                        </p>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check text-warning me-2"></i>Akses unlimited</li>
                            <li class="mb-2"><i class="fas fa-check text-warning me-2"></i>Speed 15 Mbps</li>
                            <li class="mb-2"><i class="fas fa-check text-warning me-2"></i>Gratis instalasi</li>
                            <li class="mb-2"><i class="fas fa-check text-warning me-2"></i>Syarat: Kartu pelajar/mahasiswa</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Business Package -->
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-sm card-hover">
                    <div class="card-body p-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 60px; height: 60px;">
                                <i class="fas fa-building fa-lg"></i>
                            </div>
                            <div>
                                <h3 class="fw-bold mb-0">Business</h3>
                                <p class="text-muted mb-0">100 Mbps - Rp 750.000/bulan</p>
                            </div>
                        </div>
                        <p class="text-muted mb-4">
                            Paket untuk usaha kecil menengah dan kantor dengan kecepatan tinggi 
                            dan dukungan teknis priority.
                        </p>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Speed dedicated 100 Mbps</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Static IP (opsional)</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Priority support</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>SLA 99.5% uptime</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Layanan Tambahan -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="fw-bold mb-3">Layanan Tambahan</h2>
                <p class="lead text-muted">
                    Layanan pendukung untuk melengkapi kebutuhan internet Anda.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Wi-Fi Setup -->
            <div class="col-lg-4 col-md-6">
                <div class="text-center">
                    <div class="bg-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow-sm" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-wifi fa-2x text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Setup Wi-Fi</h5>
                    <p class="text-muted">
                        Konfigurasi jaringan Wi-Fi yang optimal untuk seluruh rumah atau kantor.
                    </p>
                </div>
            </div>

            <!-- Router Upgrade -->
            <div class="col-lg-4 col-md-6">
                <div class="text-center">
                    <div class="bg-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow-sm" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-router fa-2x text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Router Upgrade</h5>
                    <p class="text-muted">
                        Upgrade router untuk performa Wi-Fi yang lebih baik dan jangkauan lebih luas.
                    </p>
                </div>
            </div>

            <!-- Network Monitoring -->
            <div class="col-lg-4 col-md-6">
                <div class="text-center">
                    <div class="bg-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow-sm" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-chart-line fa-2x text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Monitoring Jaringan</h5>
                    <p class="text-muted">
                        Monitoring kualitas jaringan 24/7 untuk memastikan koneksi selalu stabil.
                    </p>
                </div>
            </div>

            <!-- Technical Support -->
            <div class="col-lg-4 col-md-6">
                <div class="text-center">
                    <div class="bg-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow-sm" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-tools fa-2x text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Support Teknis</h5>
                    <p class="text-muted">
                        Tim teknis berpengalaman siap membantu troubleshooting dan maintenance.
                    </p>
                </div>
            </div>

            <!-- Fast Installation -->
            <div class="col-lg-4 col-md-6">
                <div class="text-center">
                    <div class="bg-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow-sm" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-clock fa-2x text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Instalasi Cepat</h5>
                    <p class="text-muted">
                        Proses instalasi dalam 1-3 hari kerja setelah konfirmasi pendaftaran.
                    </p>
                </div>
            </div>

            <!-- Network Security -->
            <div class="col-lg-4 col-md-6">
                <div class="text-center">
                    <div class="bg-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow-sm" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-shield-alt fa-2x text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Keamanan Jaringan</h5>
                    <p class="text-muted">
                        Firewall dan proteksi keamanan untuk melindungi jaringan dari ancaman cyber.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Area Coverage -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="fw-bold mb-3">Area Jangkauan</h2>
                <p class="lead text-muted">
                    Wilayah Bekasi yang sudah terjangkau layanan internet AlpiNet.
                </p>
            </div>
        </div>

        <div class="row g-4">
            @if($serviceAreas->isNotEmpty())
                @foreach($serviceAreas->take(4) as $district => $areas)
                    <div class="col-lg-3 col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center p-4">
                                <div class="text-primary mb-3">
                                    <i class="fas fa-map-marker-alt fa-2x"></i>
                                </div>
                                <h5 class="fw-bold mb-3">{{ $district ?: 'Area Bekasi' }}</h5>
                                <ul class="list-unstyled text-muted small">
                                    @foreach($areas->take(4) as $area)
                                        <li>{{ $area->area }}</li>
                                    @endforeach
                                </ul>
                                @if($areas->count() > 4)
                                    <small class="text-muted">dan {{ $areas->count() - 4 }} area lainnya...</small>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center py-5">
                    <i class="fas fa-map-marker-alt fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Area coverage sedang diperbarui</h5>
                    <p class="text-muted">Hubungi kami untuk informasi ketersediaan di area Anda</p>
                </div>
            @endif
        </div>

        @if($serviceAreas->isNotEmpty())
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <p class="text-muted">
                        <i class="fas fa-info-circle me-2"></i>
                        Total {{ $serviceAreas->flatten()->count() }} area sudah terjangkau layanan AlpiNet
                    </p>
                    <a href="{{ url('/contact') }}" class="btn btn-outline-primary">
                        <i class="fas fa-phone me-2"></i>Cek Ketersediaan di Area Anda
                    </a>
                </div>
            </div>
        @endif
    </div>
</section>

@include('partials.cta-section', [
    'title' => 'Siap Untuk Berlangganan?',
    'description' => 'Pilih paket yang sesuai dengan kebutuhan Anda dan nikmati internet cepat & stabil dari AlpiNet.',
    'primaryUrl' => url('/contact'),
    'primaryIcon' => 'fas fa-phone',
    'primaryText' => 'Daftar Sekarang',
    'secondaryUrl' => url('/about'),
    'secondaryIcon' => 'fas fa-info-circle',
    'secondaryText' => 'Tentang Kami'
])
@endsection