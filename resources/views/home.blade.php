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

<!-- Berita & Tips Terbaru -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="fw-bold mb-3">Berita & Tips Terbaru</h2>
                <p class="lead text-muted">
                    Update terbaru seputar teknologi internet dan tips dari AlpiNet.
                </p>
            </div>
        </div>

        @php
            $latestPosts = \App\Models\BlogPost::published()->latest()->take(4)->get();
        @endphp

        @if($latestPosts->count() > 0)
        <!-- Custom Carousel with Center Focus -->
        <div class="custom-carousel-container position-relative">
            <div class="custom-carousel" id="customBlogCarousel">
                @foreach($latestPosts as $index => $post)
                <div class="carousel-slide {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}">
                    <div class="card border-0 shadow-lg">
                        @if($post->image)
                            <img src="data:image/jpeg;base64,{{ $post->image }}" 
                                 class="card-img-top" 
                                 style="height: 250px; object-fit: cover;" 
                                 alt="{{ $post->title }}">
                        @else
                            <div class="bg-primary text-white d-flex align-items-center justify-content-center" style="height: 250px;">
                                <i class="fas fa-newspaper fa-3x"></i>
                            </div>
                        @endif
                        <div class="card-body p-4">
                            <small class="text-primary fw-semibold">{{ $post->published_at->format('d M Y') }}</small>
                            <h5 class="fw-bold mt-2 mb-3">{{ $post->title }}</h5>
                            <p class="text-muted">{{ Str::limit($post->summary, 120) }}</p>
                            <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-primary">
                                <i class="fas fa-arrow-right me-2"></i>Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Navigation Arrows -->
            <button class="custom-prev-btn" id="prevBtn">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="custom-next-btn" id="nextBtn">
                <i class="fas fa-chevron-right"></i>
            </button>
            
            <!-- Dots Indicator -->
            <div class="custom-dots">
                @foreach($latestPosts as $index => $post)
                <button class="custom-dot {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}"></button>
                @endforeach
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('blog.index') }}" class="btn btn-primary-custom">
                <i class="fas fa-newspaper me-2"></i>Lihat Semua Berita
            </a>
        </div>

        @else
        <div class="text-center py-5">
            <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
            <p class="text-muted">Berita akan segera hadir. Stay tuned!</p>
        </div>
        @endif
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.getElementById('customBlogCarousel');
    const slides = document.querySelectorAll('.carousel-slide');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const dots = document.querySelectorAll('.custom-dot');
    
    let currentIndex = 0;
    const totalSlides = slides.length;
    
    if (totalSlides === 0) return;
    
    function updateCarousel() {
        slides.forEach((slide, index) => {
            slide.classList.remove('active', 'prev', 'next');
            
            if (index === currentIndex) {
                slide.classList.add('active');
            } else if (index === (currentIndex - 1 + totalSlides) % totalSlides) {
                slide.classList.add('prev');
            } else if (index === (currentIndex + 1) % totalSlides) {
                slide.classList.add('next');
            }
        });
        
        // Update dots
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentIndex);
        });
    }
    
    function nextSlide() {
        currentIndex = (currentIndex + 1) % totalSlides;
        updateCarousel();
    }
    
    function prevSlide() {
        currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
        updateCarousel();
    }
    
    function goToSlide(index) {
        currentIndex = index;
        updateCarousel();
    }
    
    // Event listeners
    nextBtn?.addEventListener('click', nextSlide);
    prevBtn?.addEventListener('click', prevSlide);
    
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => goToSlide(index));
    });
    
    // Auto-play (optional)
    let autoplayInterval;
    
    function startAutoplay() {
        autoplayInterval = setInterval(nextSlide, 3500);
    }
    
    function stopAutoplay() {
        clearInterval(autoplayInterval);
    }
    
    // Start autoplay
    startAutoplay();
    
    // Pause autoplay on hover
    const carouselContainer = document.querySelector('.custom-carousel-container');
    carouselContainer?.addEventListener('mouseenter', stopAutoplay);
    carouselContainer?.addEventListener('mouseleave', startAutoplay);
    
    // Touch/swipe support for mobile
    let startX = 0;
    let endX = 0;
    
    carouselContainer?.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
    });
    
    carouselContainer?.addEventListener('touchmove', (e) => {
        endX = e.touches[0].clientX;
    });
    
    carouselContainer?.addEventListener('touchend', () => {
        const diff = startX - endX;
        const threshold = 50;
        
        if (Math.abs(diff) > threshold) {
            if (diff > 0) {
                nextSlide();
            } else {
                prevSlide();
            }
        }
    });
    
    // Initialize
    updateCarousel();
});
</script>

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