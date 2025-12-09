@extends('layouts.app')

@section('title', 'Tambah Area Layanan - Admin')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex align-items-center mb-4">
                    <a href="{{ route('admin.service-areas.index') }}" class="btn btn-outline-secondary me-3">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <div>
                        <h2 class="fw-bold mb-0">Tambah Area Layanan</h2>
                        <p class="text-muted mb-0">Tambahkan wilayah jangkauan layanan baru</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <form action="{{ route('admin.service-areas.store') }}" method="POST">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-8 mb-3">
                                    <label for="area" class="form-label">Nama Area *</label>
                                    <input type="text" class="form-control @error('area') is-invalid @enderror" 
                                           id="area" name="area" value="{{ old('area') }}" required
                                           placeholder="Contoh: Bekasi Utara, Tambelang, dll">
                                    @error('area')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-4 mb-3">
                                    <label for="status" class="form-label">Status *</label>
                                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                        <option value="">Pilih status</option>
                                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                                        <option value="planned" {{ old('status') == 'planned' ? 'selected' : '' }}>Planned</option>
                                        <option value="maintenance" {{ old('status') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name') }}" 
                                       placeholder="Contoh: Cluster ABC, Perumahan XYZ">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="district" class="form-label">Kecamatan</label>
                                <input type="text" class="form-control @error('district') is-invalid @enderror" 
                                       id="district" name="district" value="{{ old('district') }}" 
                                       placeholder="Contoh: Bekasi Utara">
                                @error('district')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="rt" class="form-label">RT</label>
                                    <input type="text" class="form-control @error('rt') is-invalid @enderror" 
                                           id="rt" name="rt" value="{{ old('rt') }}" 
                                           placeholder="Contoh: 01, 02">
                                    @error('rt')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="rw" class="form-label">RW</label>
                                    <input type="text" class="form-control @error('rw') is-invalid @enderror" 
                                           id="rw" name="rw" value="{{ old('rw') }}" 
                                           placeholder="Contoh: 05, 10">
                                    @error('rw')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" 
                                          id="description" name="description" rows="3">{{ old('description') }}</textarea>
                                <small class="text-muted">Informasi tambahan tentang area layanan</small>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.service-areas.index') }}" class="btn btn-secondary me-2">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan Area</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection