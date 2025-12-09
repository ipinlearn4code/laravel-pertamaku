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
                        <p class="text-muted mb-5">
                            Isi formulir di bawah dan kami akan menghubungi Anda dalam 24 jam untuk proses instalasi.
                        </p>

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST" class="needs-validation" novalidate>
                            @csrf
                            <div class="row g-3">
                                <!-- Name Fields -->
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Nama Lengkap *</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @else
                                        <div class="invalid-feedback">Silakan masukkan nama lengkap Anda.</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">No. Telepon *</label>
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @else
                                        <div class="invalid-feedback">Silakan masukkan nomor telepon yang valid.</div>
                                    @enderror
                                </div>

                                <!-- Contact Fields -->
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="whatsapp" class="form-label">WhatsApp</label>
                                    <input type="tel" class="form-control @error('whatsapp') is-invalid @enderror" id="whatsapp" name="whatsapp" placeholder="Nomor WhatsApp" value="{{ old('whatsapp') }}">
                                    @error('whatsapp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Address -->
                                <div class="col-12">
                                    <label for="address" class="form-label">Alamat Lengkap *</label>
                                    <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3" 
                                              placeholder="Jl. Nama Jalan, No. Rumah, RT/RW, Kelurahan, Kecamatan, Bekasi" required>{{ old('address') }}</textarea>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @else
                                        <div class="invalid-feedback">Silakan masukkan alamat lengkap untuk instalasi.</div>
                                    @enderror
                                </div>

                                <!-- Package Selection -->
                                <div class="col-md-6">
                                    <label for="package_id" class="form-label">Pilih Paket Internet *</label>
                                    <select class="form-select @error('package_id') is-invalid @enderror" id="package_id" name="package_id" required>
                                        <option value="">Pilih paket</option>
                                        @foreach($packages as $package)
                                        <option value="{{ $package->id }}" {{ old('package_id') == $package->id ? 'selected' : '' }}>
                                            {{ $package->name }} - {{ $package->speed_mbps }} Mbps ({{ $package->formatted_price }}/bulan)
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('package_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @else
                                        <div class="invalid-feedback">Silakan pilih paket internet.</div>
                                    @enderror
                                </div>

                                <!-- Installation Preference -->
                                <div class="col-md-6">
                                    <label for="installation_time" class="form-label">Waktu Instalasi Preferensi</label>
                                    <select class="form-select @error('installation_time') is-invalid @enderror" id="installation_time" name="installation_time">
                                        <option value="">Pilih waktu</option>
                                        <option value="weekday-morning" {{ old('installation_time') == 'weekday-morning' ? 'selected' : '' }}>Hari kerja - Pagi (08:00-12:00)</option>
                                        <option value="weekday-afternoon" {{ old('installation_time') == 'weekday-afternoon' ? 'selected' : '' }}>Hari kerja - Siang (13:00-17:00)</option>
                                        <option value="weekend" {{ old('installation_time') == 'weekend' ? 'selected' : '' }}>Akhir pekan</option>
                                        <option value="flexible" {{ old('installation_time') == 'flexible' ? 'selected' : '' }}>Fleksibel</option>
                                    </select>
                                    @error('installation_time')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Message -->
                                <div class="col-12">
                                    <label for="notes" class="form-label">Catatan Tambahan</label>
                                    <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" rows="3" 
                                              placeholder="Pertanyaan khusus, request instalasi, atau informasi tambahan...">{{ old('notes') }}</textarea>
                                    @error('notes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Newsletter -->
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="newsletter_consent" name="newsletter_consent" value="1" {{ old('newsletter_consent') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="newsletter_consent">
                                            Saya ingin mendapatkan informasi promo dan update dari AlpiNet
                                        </label>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary-custom btn-lg w-100">
                                        <i class="fas fa-paper-plane me-2"></i>Kirim
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
                        
                        @if(isset($contactInfo['address']))
                            @foreach($contactInfo['address'] as $address)
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                                     style="width: 50px; height: 50px;">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ $address->label ?? 'Alamat' }}</h6>
                                    <p class="text-muted mb-0">{!! nl2br($address->value) !!}</p>
                                </div>
                            </div>
                            @endforeach
                        @endif

                        @if(isset($contactInfo['whatsapp']))
                            @foreach($contactInfo['whatsapp'] as $whatsapp)
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                                     style="width: 50px; height: 50px;">
                                    <i class="fab fa-whatsapp"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ $whatsapp->label ?? 'WhatsApp' }}</h6>
                                    <p class="text-muted mb-0">{{ $whatsapp->value }}</p>
                                    <small class="text-success">Respon cepat 24/7</small>
                                </div>
                            </div>
                            @endforeach
                        @endif

                        @if(isset($contactInfo['phone']))
                            @foreach($contactInfo['phone'] as $phone)
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                                     style="width: 50px; height: 50px;">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ $phone->label ?? 'Telepon' }}</h6>
                                    <p class="text-muted mb-0">{{ $phone->value }}</p>
                                </div>
                            </div>
                            @endforeach
                        @endif

                        @if(isset($contactInfo['email']))
                            @foreach($contactInfo['email'] as $email)
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                                     style="width: 50px; height: 50px;">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ $email->label ?? 'Email' }}</h6>
                                    <p class="text-muted mb-0">{{ $email->value }}</p>
                                </div>
                            </div>
                            @endforeach
                        @endif

                        @if(isset($contactInfo['hours']))
                            @foreach($contactInfo['hours'] as $hours)
                            <div class="d-flex align-items-center">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                                     style="width: 50px; height: 50px;">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ $hours->label ?? 'Jam Operasional' }}</h6>
                                    <p class="text-muted mb-0">
                                        {!! nl2br($hours->value) !!}
                                        <br><small class="text-success">Support teknis 24/7</small>
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        @endif
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
                            @if($serviceAreas->isNotEmpty())
                                @foreach($serviceAreas->take(8) as $area)
                                <div class="col-6">
                                    <span class="badge w-100 
                                        @if($area->status == 'active') bg-success
                                        @elseif($area->status == 'planned') bg-warning text-dark
                                        @elseif($area->status == 'maintenance') bg-danger
                                        @else bg-light text-dark
                                        @endif">
                                        {{ $area->area }}
                                    </span>
                                </div>
                                @endforeach
                            @else
                                <div class="col-12">
                                    <p class="text-muted text-center mb-0">
                                        <i class="fas fa-map-marker-alt me-2"></i>
                                        Area coverage sedang diperbarui
                                    </p>
                                </div>
                            @endif
                        </div>
                        <div class="mt-3">
                            <small class="text-muted">
                                <i class="fas fa-info-circle me-1"></i>
                                @if($serviceAreas->isNotEmpty())
                                    {{ $serviceAreas->count() }} area sudah terjangkau. 
                                @endif
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