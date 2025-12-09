@extends('layouts.app')

@section('title', 'Edit Testimoni - Admin AlpiNet')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex align-items-center mb-4">
                    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary me-3">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <h1 class="fw-bold mb-0">Edit Testimoni</h1>
                </div>

                @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>{{ Session::get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="card border-0 shadow-lg">
                    <div class="card-body p-5">
                        <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name', $testimonial->name) }}" 
                                           required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="location" class="form-label fw-bold">Lokasi <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('location') is-invalid @enderror" 
                                           id="location" 
                                           name="location" 
                                           value="{{ old('location', $testimonial->location) }}" 
                                           required>
                                    @error('location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label fw-bold">Email</label>
                                    <input type="email" 
                                           class="form-control @error('email') is-invalid @enderror" 
                                           id="email" 
                                           name="email" 
                                           value="{{ old('email', $testimonial->email) }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label fw-bold">No. Telepon/WhatsApp</label>
                                    <input type="text" 
                                           class="form-control @error('phone') is-invalid @enderror" 
                                           id="phone" 
                                           name="phone" 
                                           value="{{ old('phone', $testimonial->phone) }}">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="message" class="form-label fw-bold">Testimoni <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('message') is-invalid @enderror" 
                                          id="message" 
                                          name="message" 
                                          rows="6" 
                                          required>{{ old('message', $testimonial->message) }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Status Info -->
                            <div class="alert alert-info">
                                <h6><i class="fas fa-info-circle me-2"></i>Status Testimoni</h6>
                                <p class="mb-0">
                                    Status saat ini: 
                                    @if($testimonial->is_published)
                                        <span class="badge bg-success">Dipublikasikan</span>
                                        <small class="text-muted">({{ $testimonial->published_at?->format('d M Y H:i') }})</small>
                                    @else
                                        <span class="badge bg-warning text-dark">Menunggu Review</span>
                                    @endif
                                </p>
                                <small class="text-muted">
                                    Untuk mengubah status publish/unpublish, gunakan tombol aksi di halaman daftar testimoni.
                                </small>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary me-md-2">
                                    <i class="fas fa-times me-2"></i>Batal
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="card border-0 shadow mt-4">
                    <div class="card-header bg-light">
                        <h6 class="fw-bold mb-0">Aksi Cepat</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-flex gap-2">
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
            </div>
        </div>
    </div>
</section>
@endsection