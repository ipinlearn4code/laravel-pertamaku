<!-- Call to Action Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="fw-bold mb-3">{{ $title ?? 'Siap Bergabung dengan AlpiNet?' }}</h2>
                <p class="lead text-muted mb-4">
                    {{ $description ?? 'Bergabunglah dengan ribuan pelanggan yang telah merasakan kualitas layanan internet AlpiNet di wilayah Bekasi.' }}
                </p>
                <div class="d-flex gap-3 justify-content-center">
                    <a href="{{ $primaryUrl ?? url('/services') }}" class="btn btn-primary-custom btn-lg">
                        <i class="{{ $primaryIcon ?? 'fas fa-wifi' }} me-2"></i>{{ $primaryText ?? 'Lihat Paket Internet' }}
                    </a>
                    <a href="{{ $secondaryUrl ?? url('/contact') }}" class="btn btn-outline-primary btn-lg">
                        <i class="{{ $secondaryIcon ?? 'fas fa-phone' }} me-2"></i>{{ $secondaryText ?? 'Hubungi Kami' }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>