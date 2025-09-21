<footer class="footer-bg text-light py-5 mt-5">
    <div class="container">
        <div class="row">
            <!-- Company Info -->
            <div class="col-lg-4 col-md-6 mb-4">
                <h5 class="fw-bold mb-3">
                    <img src="{{ asset('logo.png') }}" alt="AlpiNet Logo" style="height: 25px;" class="me-2">AlpiNet
                </h5>
                <p class="text-light">
                    Penyedia layanan internet terpercaya untuk masyarakat Bekasi. Menyediakan 
                    koneksi internet cepat, stabil, dan harga terjangkau untuk rumah dan bisnis.
                </p>
                <div class="social-links">
                    <a href="#" class="text-light me-3" title="Facebook">
                        <i class="fab fa-facebook-f fa-lg"></i>
                    </a>
                    <a href="https://wa.me/6281234567890" class="text-light me-3" title="WhatsApp">
                        <i class="fab fa-whatsapp fa-lg"></i>
                    </a>
                    <a href="#" class="text-light me-3" title="Instagram">
                        <i class="fab fa-instagram fa-lg"></i>
                    </a>
                    <a href="#" class="text-light me-3" title="YouTube">
                        <i class="fab fa-youtube fa-lg"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h6 class="fw-bold mb-3">Menu Utama</h6>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="{{ url('/') }}" class="text-light text-decoration-none">
                            <i class="fas fa-angle-right me-1"></i>Beranda
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ url('/about') }}" class="text-light text-decoration-none">
                            <i class="fas fa-angle-right me-1"></i>Tentang Kami
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ url('/services') }}" class="text-light text-decoration-none">
                            <i class="fas fa-angle-right me-1"></i>Paket Internet
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ url('/contact') }}" class="text-light text-decoration-none">
                            <i class="fas fa-angle-right me-1"></i>Hubungi Kami
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Services -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h6 class="fw-bold mb-3">Paket Internet</h6>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <span class="text-light">
                            <i class="fas fa-wifi me-2 text-primary"></i>Basic 10 Mbps
                        </span>
                    </li>
                    <li class="mb-2">
                        <span class="text-light">
                            <i class="fas fa-wifi me-2 text-primary"></i>Family 20 Mbps
                        </span>
                    </li>
                    <li class="mb-2">
                        <span class="text-light">
                            <i class="fas fa-wifi me-2 text-primary"></i>Premium 50 Mbps
                        </span>
                    </li>
                    <li class="mb-2">
                        <span class="text-light">
                            <i class="fas fa-wifi me-2 text-primary"></i>Business 100 Mbps
                        </span>
                    </li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h6 class="fw-bold mb-3">Informasi Kontak</h6>
                <ul class="list-unstyled">
                    <li class="mb-2 text-light">
                        <i class="fas fa-map-marker-alt me-2 text-primary"></i>
                        Jl. Raya Bekasi No. 123, Bekasi Timur
                    </li>
                    <li class="mb-2 text-light">
                        <i class="fab fa-whatsapp me-2 text-primary"></i>
                        +62 812-3456-7890
                    </li>
                    <li class="mb-2 text-light">
                        <i class="fas fa-phone me-2 text-primary"></i>
                        (021) 8890-1234
                    </li>
                    <li class="mb-2 text-light">
                        <i class="fas fa-envelope me-2 text-primary"></i>
                        info@alpinet.id
                    </li>
                    <li class="mb-2 text-light">
                        <i class="fas fa-clock me-2 text-primary"></i>
                        Sen - Jum: 08:00 - 17:00
                    </li>
                </ul>
            </div>
        </div>

        <hr class="my-4 border-secondary">

        <!-- Copyright -->
        <div class="row">
            <div class="col-md-6">
                <p class="mb-0 text-light">
                    &copy; {{ date('Y') }} AlpiNet. Semua hak dilindungi.
                </p>
            </div>
            <div class="col-md-6 text-md-end">
                <p class="mb-0 text-light">
                    Internet Cepat & Stabil <i class="fas fa-wifi text-primary"></i> untuk Bekasi
                </p>
            </div>
        </div>
    </div>
</footer>