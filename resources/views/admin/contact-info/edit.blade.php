@extends('layouts.app')

@section('title', 'Edit Kontak Info - Admin')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex align-items-center mb-4">
                    <a href="{{ route('admin.contact-info.index') }}" class="btn btn-outline-secondary me-3">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <div>
                        <h2 class="fw-bold mb-0">Edit Informasi Kontak</h2>
                        <p class="text-muted mb-0">Edit kontak: {{ $contactInfo->label ?? ucfirst($contactInfo->type) }}</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <form action="{{ route('admin.contact-info.update', $contactInfo) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-3">
                                <label for="type" class="form-label">Tipe Kontak *</label>
                                <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
                                    <option value="">Pilih tipe kontak</option>
                                    <option value="address" {{ old('type', $contactInfo->type) == 'address' ? 'selected' : '' }}>Alamat</option>
                                    <option value="phone" {{ old('type', $contactInfo->type) == 'phone' ? 'selected' : '' }}>Telepon</option>
                                    <option value="email" {{ old('type', $contactInfo->type) == 'email' ? 'selected' : '' }}>Email</option>
                                    <option value="whatsapp" {{ old('type', $contactInfo->type) == 'whatsapp' ? 'selected' : '' }}>WhatsApp</option>
                                    <option value="hours" {{ old('type', $contactInfo->type) == 'hours' ? 'selected' : '' }}>Jam Operasional</option>
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="label" class="form-label">Label</label>
                                <input type="text" class="form-control @error('label') is-invalid @enderror" 
                                       id="label" name="label" value="{{ old('label', $contactInfo->label) }}" 
                                       placeholder="Contoh: Kantor Pusat, Customer Service, dll">
                                @error('label')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="value" class="form-label">Nilai *</label>
                                <textarea class="form-control @error('value') is-invalid @enderror" 
                                          id="value" name="value" rows="3" required>{{ old('value', $contactInfo->value) }}</textarea>
                                <small class="text-muted">
                                    Untuk jam operasional dan alamat, gunakan enter untuk baris baru
                                </small>
                                @error('value')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="is_primary" name="is_primary" value="1" {{ old('is_primary', $contactInfo->is_primary) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_primary">
                                            Kontak Utama
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $contactInfo->is_active) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">
                                            Aktif
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.contact-info.index') }}" class="btn btn-secondary me-2">Batal</a>
                                <button type="submit" class="btn btn-primary">Update Kontak</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection