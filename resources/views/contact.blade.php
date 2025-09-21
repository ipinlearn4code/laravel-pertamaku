@extends('layouts.app')

@section('title', 'Hubungi Kami - AlpiNet')

@section('content')
<!-- Page Header -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-4">Hubungi Kami</h1>
                <p class="lead">
                    Siap berlangganan internet AlpiNet? Hubungi tim kami untuk informasi lebih lanjut 
                    dan daftar paket yang sesuai dengan kebutuhan Anda.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form & Info -->
<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Contact Form -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <h3 class="fw-bold mb-4">Daftar Paket Internet</h3>
                        <p class="text-muted mb-4">
                            Isi formulir di bawah dan kami akan menghubungi Anda dalam 24 jam untuk proses instalasi.
                        </p>

                        <form action="#" method="POST" class="needs-validation" novalidate>
                            @csrf
                            <div class="row g-3">
                                <!-- Name Fields -->
                                <div class="col-md-6">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap *</label>
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                                    <div class="invalid-feedback">
                                        Silakan masukkan nama lengkap Anda.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="no_telepon" class="form-label">No. Telepon *</label>
                                    <input type="tel" class="form-control" id="no_telepon" name="no_telepon" required>
                                    <div class="invalid-feedback">
                                        Silakan masukkan nomor telepon yang valid.
                                    </div>
                                </div>

                                <!-- Contact Fields -->
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="col-md-6">
                                    <label for="whatsapp" class="form-label">WhatsApp</label>
                                    <input type="tel" class="form-control" id="whatsapp" name="whatsapp" placeholder="Nomor WhatsApp">
                                </div>

                                <!-- Address -->
                                <div class="col-12">
                                    <label for="alamat" class="form-label">Alamat Lengkap *</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3" 
                                              placeholder="Jl. Nama Jalan, No. Rumah, RT/RW, Kelurahan, Kecamatan, Bekasi" required></textarea>
                                    <div class="invalid-feedback">
                                        Silakan masukkan alamat lengkap untuk instalasi.
                                    </div>
                                </div>

                                <!-- Package Selection -->
                                <div class="col-md-6">
                                    <label for="paket" class="form-label">Pilih Paket Internet *</label>
                                    <select class="form-select" id="paket" name="paket" required>
                                        <option value="">Pilih paket</option>
                                        <option value="basic">Basic - 10 Mbps (Rp 150.000/bulan)</option>
                                        <option value="family">Family - 20 Mbps (Rp 250.000/bulan)</option>
                                        <option value="premium">Premium - 50 Mbps (Rp 400.000/bulan)</option>
                                        <option value="student">Student - 15 Mbps (Rp 180.000/bulan)</option>
                                        <option value="business">Business - 100 Mbps (Rp 750.000/bulan)</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Silakan pilih paket internet.
                                    </div>
                                </div>

                                <!-- Installation Preference -->
                                <div class="col-md-6">
                                    <label for="waktu_instalasi" class="form-label">Waktu Instalasi Preferensi</label>
                                    <select class="form-select" id="waktu_instalasi" name="waktu_instalasi">
                                        <option value="">Pilih waktu</option>
                                        <option value="weekday-morning">Hari kerja - Pagi (08:00-12:00)</option>
                                        <option value="weekday-afternoon">Hari kerja - Siang (13:00-17:00)</option>
                                        <option value="weekend">Akhir pekan</option>
                                        <option value="flexible">Fleksibel</option>
                                    </select>
                                </div>

                                <!-- Message -->
                                <div class="col-12">
                                    <label for="catatan" class="form-label">Catatan Tambahan</label>
                                    <textarea class="form-control" id="catatan" name="catatan" rows="3" 
                                              placeholder="Pertanyaan khusus, request instalasi, atau informasi tambahan..."></textarea>
                                </div>

                                <!-- Newsletter -->
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="newsletter" name="newsletter" value="1">
                                        <label class="form-check-label" for="newsletter">
                                            Saya ingin mendapatkan informasi promo dan update dari AlpiNet
                                        </label>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary-custom btn-lg w-100">
                                        <i class="fas fa-paper-plane me-2"></i>Kirim Pendaftaran
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="col-lg-5">
                <!-- Contact Details -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-4">Informasi Kontak</h4>
                        
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 50px; height: 50px;">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Alamat Kantor</h6>
                                <p class="text-muted mb-0">Jl. Raya Bekasi No. 123<br>Bekasi Timur, Bekasi 17113</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 50px; height: 50px;">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">WhatsApp</h6>
                                <p class="text-muted mb-0">+62 812-3456-7890</p>
                                <small class="text-success">Respon cepat 24/7</small>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 50px; height: 50px;">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Telepon</h6>
                                <p class="text-muted mb-0">(021) 8890-1234</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 50px; height: 50px;">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Email</h6>
                                <p class="text-muted mb-0">info@alpinet.id</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 50px; height: 50px;">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Jam Operasional</h6>
                                <p class="text-muted mb-0">
                                    Senin - Jumat: 08:00 - 17:00<br>
                                    Sabtu: 08:00 - 15:00<br>
                                    <small class="text-success">Support teknis 24/7</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Contact -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 text-center">
                        <div class="text-success mb-3">
                            <i class="fab fa-whatsapp fa-3x"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Hubungi Via WhatsApp</h5>
                        <p class="text-muted mb-3">
                            Chat langsung dengan tim customer service kami untuk konsultasi gratis.
                        </p>
                        <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-success btn-lg">
                            <i class="fab fa-whatsapp me-2"></i>Chat Sekarang
                        </a>
                    </div>
                </div>

                <!-- Area Coverage -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3">Area Jangkauan</h5>
                        <div class="row g-2">
                            <div class="col-6">
                                <span class="badge bg-light text-dark w-100">Bekasi Timur</span>
                            </div>
                            <div class="col-6">
                                <span class="badge bg-light text-dark w-100">Bekasi Barat</span>
                            </div>
                            <div class="col-6">
                                <span class="badge bg-light text-dark w-100">Bekasi Utara</span>
                            </div>
                            <div class="col-6">
                                <span class="badge bg-light text-dark w-100">Bekasi Selatan</span>
                            </div>
                        </div>
                        <div class="mt-3">
                            <small class="text-muted">
                                <i class="fas fa-info-circle me-1"></i>
                                Cek ketersediaan di lokasi Anda dengan menghubungi kami
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Process -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="fw-bold mb-3">Proses Berlangganan</h2>
                <p class="lead text-muted">
                    Mudah dan cepat! Hanya 4 langkah untuk menikmati internet AlpiNet.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Step 1 -->
            <div class="col-lg-3 col-md-6">
                <div class="text-center">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <span class="fw-bold fs-4">1</span>
                    </div>
                    <h5 class="fw-bold mb-3">Daftar</h5>
                    <p class="text-muted">
                        Isi formulir pendaftaran atau hubungi kami via WhatsApp untuk konsultasi paket.
                    </p>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="col-lg-3 col-md-6">
                <div class="text-center">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <span class="fw-bold fs-4">2</span>
                    </div>
                    <h5 class="fw-bold mb-3">Survey</h5>
                    <p class="text-muted">
                        Tim teknis melakukan survey lokasi untuk memastikan coverage dan kualitas sinyal.
                    </p>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="col-lg-3 col-md-6">
                <div class="text-center">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <span class="fw-bold fs-4">3</span>
                    </div>
                    <h5 class="fw-bold mb-3">Instalasi</h5>
                    <p class="text-muted">
                        Proses instalasi perangkat dan konfigurasi jaringan di lokasi Anda.
                    </p>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="col-lg-3 col-md-6">
                <div class="text-center">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <span class="fw-bold fs-4">4</span>
                    </div>
                    <h5 class="fw-bold mb-3">Aktivasi</h5>
                    <p class="text-muted">
                        Internet siap digunakan! Nikmati koneksi cepat dan stabil dari AlpiNet.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="fw-bold mb-3">Pertanyaan yang Sering Diajukan</h2>
                <p class="lead text-muted">
                    Jawaban untuk pertanyaan umum seputar layanan internet AlpiNet.
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="accordion" id="faqAccordion">
                    <!-- FAQ 1 -->
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header" id="faq1">
                            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" 
                                    data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                Berapa lama proses instalasi internet AlpiNet?
                            </button>
                        </h2>
                        <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="faq1" 
                             data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Proses instalasi biasanya memakan waktu 1-3 hari kerja setelah konfirmasi pendaftaran dan survey lokasi. 
                                Tim teknis kami akan mengatur jadwal instalasi yang sesuai dengan ketersediaan Anda.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header" id="faq2">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" 
                                    data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                Apakah ada biaya instalasi dan berapa besarnya?
                            </button>
                        </h2>
                        <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="faq2" 
                             data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Saat ini kami sedang ada promo gratis instalasi untuk pelanggan baru! 
                                Promo ini berlaku terbatas, jadi segera hubungi kami untuk mendapatkan penawaran terbaik.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header" id="faq3">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" 
                                    data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                Bagaimana jika ada gangguan atau masalah teknis?
                            </button>
                        </h2>
                        <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="faq3" 
                             data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Tim support teknis kami siaga 24/7 untuk membantu mengatasi gangguan. 
                                Anda bisa menghubungi kami via WhatsApp, telepon, atau email kapan saja untuk mendapatkan bantuan cepat.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="accordion-item border-0 shadow-sm">
                        <h2 class="accordion-header" id="faq4">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" 
                                    data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                Apakah bisa upgrade atau downgrade paket?
                            </button>
                        </h2>
                        <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="faq4" 
                             data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Tentu saja! Anda bisa upgrade atau downgrade paket kapan saja sesuai kebutuhan. 
                                Hubungi customer service kami untuk proses perubahan paket yang mudah dan cepat.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
// Form validation
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
</script>
@endpush