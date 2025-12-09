@extends('layouts.app')

@section('title', 'Detail Pendaftaran - Admin')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex align-items-center mb-4">
                    <a href="{{ route('admin.submissions.index') }}" class="btn btn-outline-secondary me-3">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <div>
                        <h2 class="fw-bold mb-0">Detail Pendaftaran</h2>
                        <p class="text-muted mb-0">{{ $submission->name }} - {{ $submission->created_at->format('d M Y H:i') }}</p>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-8">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">Informasi Pelanggan</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <strong>Nama:</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        {{ $submission->name }}
                                    </div>
                                </div>
                                <hr>
                                
                                <div class="row">
                                    <div class="col-sm-4">
                                        <strong>No. Telepon:</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        <a href="tel:{{ $submission->phone }}" class="text-primary">{{ $submission->phone }}</a>
                                    </div>
                                </div>
                                <hr>

                                @if($submission->whatsapp)
                                <div class="row">
                                    <div class="col-sm-4">
                                        <strong>WhatsApp:</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        <a href="https://wa.me/{{ str_replace(['+', '-', ' '], '', $submission->whatsapp) }}" target="_blank" class="text-success">
                                            {{ $submission->whatsapp }} <i class="fab fa-whatsapp"></i>
                                        </a>
                                    </div>
                                </div>
                                <hr>
                                @endif

                                @if($submission->email)
                                <div class="row">
                                    <div class="col-sm-4">
                                        <strong>Email:</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        <a href="mailto:{{ $submission->email }}" class="text-primary">{{ $submission->email }}</a>
                                    </div>
                                </div>
                                <hr>
                                @endif

                                <div class="row">
                                    <div class="col-sm-4">
                                        <strong>Alamat:</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        {{ $submission->address }}
                                    </div>
                                </div>
                                <hr>

                                @if($submission->package)
                                <div class="row">
                                    <div class="col-sm-4">
                                        <strong>Paket Dipilih:</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        <span class="badge bg-primary">{{ $submission->package->name }}</span>
                                        - {{ $submission->package->speed_mbps }} Mbps
                                        ({{ $submission->package->formatted_price }}/bulan)
                                    </div>
                                </div>
                                <hr>
                                @endif

                                @if($submission->installation_time)
                                <div class="row">
                                    <div class="col-sm-4">
                                        <strong>Waktu Instalasi:</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        @php
                                            $installationTimes = [
                                                'weekday-morning' => 'Hari kerja - Pagi (08:00-12:00)',
                                                'weekday-afternoon' => 'Hari kerja - Siang (13:00-17:00)',
                                                'weekend' => 'Akhir pekan',
                                                'flexible' => 'Fleksibel'
                                            ];
                                        @endphp
                                        {{ $installationTimes[$submission->installation_time] ?? $submission->installation_time }}
                                    </div>
                                </div>
                                <hr>
                                @endif

                                @if($submission->notes)
                                <div class="row">
                                    <div class="col-sm-4">
                                        <strong>Catatan:</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        {{ $submission->notes }}
                                    </div>
                                </div>
                                <hr>
                                @endif

                                <div class="row">
                                    <div class="col-sm-4">
                                        <strong>Newsletter:</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        @if($submission->newsletter_consent)
                                            <span class="badge bg-success">Ya</span>
                                        @else
                                            <span class="badge bg-secondary">Tidak</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header">
                                <h6 class="mb-0">Status & Aksi</h6>
                            </div>
                            <div class="card-body">
                                @php
                                    $statusClasses = [
                                        'pending' => 'bg-warning',
                                        'contacted' => 'bg-info', 
                                        'scheduled' => 'bg-primary',
                                        'completed' => 'bg-success'
                                    ];
                                    $statusLabels = [
                                        'pending' => 'Menunggu',
                                        'contacted' => 'Dihubungi',
                                        'scheduled' => 'Dijadwalkan', 
                                        'completed' => 'Selesai'
                                    ];
                                @endphp
                                
                                <div class="text-center mb-3">
                                    <span class="badge {{ $statusClasses[$submission->status] ?? 'bg-secondary' }} fs-6">
                                        {{ $statusLabels[$submission->status] ?? $submission->status }}
                                    </span>
                                </div>

                                <div class="d-grid gap-2">
                                    <a href="{{ route('admin.submissions.edit', $submission) }}" class="btn btn-primary">
                                        <i class="fas fa-edit me-2"></i>Edit Status
                                    </a>
                                    
                                    @if($submission->whatsapp)
                                    <a href="https://wa.me/{{ str_replace(['+', '-', ' '], '', $submission->whatsapp) }}" 
                                       target="_blank" class="btn btn-success">
                                        <i class="fab fa-whatsapp me-2"></i>Chat WhatsApp
                                    </a>
                                    @endif
                                    
                                    <a href="tel:{{ $submission->phone }}" class="btn btn-outline-primary">
                                        <i class="fas fa-phone me-2"></i>Telepon
                                    </a>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                <small>Dibuat: {{ $submission->created_at->format('d M Y H:i') }}</small>
                                <br><small>Diperbarui: {{ $submission->updated_at->format('d M Y H:i') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection