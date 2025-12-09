@extends('layouts.app')

@section('title', 'Tambah Paket Internet - Admin')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex align-items-center mb-4">
                    <a href="{{ route('admin.packages.index') }}" class="btn btn-outline-secondary me-3">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <div>
                        <h2 class="fw-bold mb-0">Tambah Paket Internet</h2>
                        <p class="text-muted mb-0">Tambahkan paket internet baru</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <form action="{{ route('admin.packages.store') }}" method="POST">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Nama Paket *</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="speed_mbps" class="form-label">Kecepatan (Mbps) *</label>
                                    <input type="number" class="form-control @error('speed_mbps') is-invalid @enderror" 
                                           id="speed_mbps" name="speed_mbps" value="{{ old('speed_mbps') }}" min="1" required>
                                    @error('speed_mbps')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Harga per Bulan (Rp) *</label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror" 
                                       id="price" name="price" value="{{ old('price') }}" min="0" step="1000" required>
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" 
                                          id="description" name="description" rows="3">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Fitur-fitur</label>
                                <div id="features-container">
                                    @if(old('features'))
                                        @foreach(old('features') as $index => $feature)
                                        <div class="input-group mb-2 feature-input">
                                            <input type="text" class="form-control" name="features[]" value="{{ $feature }}">
                                            <button type="button" class="btn btn-outline-danger" onclick="removeFeature(this)">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                        @endforeach
                                    @else
                                    <div class="input-group mb-2 feature-input">
                                        <input type="text" class="form-control" name="features[]" placeholder="Contoh: Unlimited kuota">
                                        <button type="button" class="btn btn-outline-danger" onclick="removeFeature(this)">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                    @endif
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-primary" onclick="addFeature()">
                                    <i class="fas fa-plus me-1"></i>Tambah Fitur
                                </button>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="is_popular" name="is_popular" value="1" {{ old('is_popular') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_popular">
                                            Paket Populer
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">
                                            Aktif
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.packages.index') }}" class="btn btn-secondary me-2">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan Paket</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function addFeature() {
    const container = document.getElementById('features-container');
    const div = document.createElement('div');
    div.className = 'input-group mb-2 feature-input';
    div.innerHTML = `
        <input type="text" class="form-control" name="features[]" placeholder="Masukkan fitur">
        <button type="button" class="btn btn-outline-danger" onclick="removeFeature(this)">
            <i class="fas fa-minus"></i>
        </button>
    `;
    container.appendChild(div);
}

function removeFeature(button) {
    const container = document.getElementById('features-container');
    if (container.children.length > 1) {
        button.closest('.feature-input').remove();
    }
}
</script>
@endsection