@extends('layouts.app')

@section('title', 'Detail Testimoni - Admin AlpiNet')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex align-items-center mb-4">
                    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary me-3">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <h1 class="fw-bold mb-0">Detail Testimoni</h1>
                </div>

                <div class="card border-0 shadow-lg">
                    <div class="card-body p-5">
                        <!-- Header Info -->
                        <div class="d-flex align-items-center mb-4">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 60px; height: 60px;">
                                {{ strtoupper(substr($testimonial->name, 0, 1)) }}
                            </div>
                            <div>
                                <h4 class="fw-bold mb-1">{{ $testimonial->name }}</h4>
                                <p class="text-muted mb-0">{{ $testimonial->location }}</p>
                                <small class="text-muted">
                                    Dikirim: {{ $testimonial->created_at->format('d M Y H:i') }}
                                </small>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            @if($testimonial->is_published)
                                <span class="badge bg-success fs-6">
                                    <i class="fas fa-eye me-2"></i>Dipublikasikan
                                </span>
                                @if($testimonial->published_at)
                                <small class="text-muted ms-2">
                                    pada {{ $testimonial->published_at->format('d M Y H:i') }}
                                </small>
                                @endif
                            @else
                                <span class="badge bg-warning text-dark fs-6">
                                    <i class="fas fa-clock me-2"></i>Menunggu Review
                                </span>
                            @endif
                        </div>

                        <!-- Testimoni Content -->
                        <div class="mb-4">
                            <h5 class="fw-bold mb-3">Testimoni:</h5>
                            <div class="p-4 bg-light rounded">
                                <blockquote class="mb-0">
                                    <p class="fs-5">"{{ $testimonial->message }}"</p>
                                </blockquote>
                            </div>
                        </div>

                        <!-- Contact Info -->
                        @if($testimonial->email || $testimonial->phone)
                        <div class="mb-4">
                            <h5 class="fw-bold mb-3">Informasi Kontak:</h5>
                            <div class="row">
                                @if($testimonial->email)
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-envelope text-primary me-2"></i>
                                        <span>{{ $testimonial->email }}</span>
                                    </div>
                                </div>
                                @endif
                                @if($testimonial->phone)
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-phone text-primary me-2"></i>
                                        <span>{{ $testimonial->phone }}</span>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endif

                        <!-- Action Buttons -->
                        <div class="d-flex gap-3">
                            <!-- Toggle Publish -->
                            <form action="{{ route('admin.testimonials.toggle-publish', $testimonial) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                @if($testimonial->is_published)
                                    <button type="submit" class="btn btn-warning" 
                                            onclick="return confirm('Yakin ingin menyembunyikan testimoni ini?')">
                                        <i class="fas fa-eye-slash me-2"></i>Unpublish
                                    </button>
                                @else
                                    <button type="submit" class="btn btn-success" 
                                            onclick="return confirm('Yakin ingin mempublikasikan testimoni ini?')">
                                        <i class="fas fa-eye me-2"></i>Publish
                                    </button>
                                @endif
                            </form>

                            <!-- Edit -->
                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-primary">
                                <i class="fas fa-edit me-2"></i>Edit
                            </a>

                            <!-- Delete -->
                            <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" 
                                        onclick="return confirm('Yakin ingin menghapus testimoni ini? Aksi ini tidak dapat dibatalkan.')">
                                    <i class="fas fa-trash me-2"></i>Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Timeline / History -->
                <div class="card border-0 shadow mt-4">
                    <div class="card-header">
                        <h6 class="fw-bold mb-0">Riwayat</h6>
                    </div>
                    <div class="card-body">
                        <div class="timeline">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                                     style="width: 30px; height: 30px; font-size: 12px;">
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div>
                                    <small class="fw-bold">Testimoni dibuat</small>
                                    <br>
                                    <small class="text-muted">{{ $testimonial->created_at->format('d M Y H:i') }}</small>
                                </div>
                            </div>

                            @if($testimonial->is_published && $testimonial->published_at)
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                                     style="width: 30px; height: 30px; font-size: 12px;">
                                    <i class="fas fa-eye"></i>
                                </div>
                                <div>
                                    <small class="fw-bold">Testimoni dipublikasikan</small>
                                    <br>
                                    <small class="text-muted">{{ $testimonial->published_at->format('d M Y H:i') }}</small>
                                </div>
                            </div>
                            @endif

                            @if($testimonial->updated_at->gt($testimonial->created_at))
                            <div class="d-flex align-items-center">
                                <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                                     style="width: 30px; height: 30px; font-size: 12px;">
                                    <i class="fas fa-edit"></i>
                                </div>
                                <div>
                                    <small class="fw-bold">Testimoni diupdate</small>
                                    <br>
                                    <small class="text-muted">{{ $testimonial->updated_at->format('d M Y H:i') }}</small>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection