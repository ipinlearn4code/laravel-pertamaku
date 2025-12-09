@extends('layouts.app')

@section('title', 'Edit Pendaftaran - Admin')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex align-items-center mb-4">
                    <a href="{{ route('admin.submissions.show', $submission) }}" class="btn btn-outline-secondary me-3">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <div>
                        <h2 class="fw-bold mb-0">Edit Pendaftaran</h2>
                        <p class="text-muted mb-0">{{ $submission->name }}</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <form action="{{ route('admin.submissions.update', $submission) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="status" class="form-label">Status *</label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                    <option value="pending" {{ old('status', $submission->status) == 'pending' ? 'selected' : '' }}>Menunggu</option>
                                    <option value="contacted" {{ old('status', $submission->status) == 'contacted' ? 'selected' : '' }}>Sudah Dihubungi</option>
                                    <option value="scheduled" {{ old('status', $submission->status) == 'scheduled' ? 'selected' : '' }}>Instalasi Dijadwalkan</option>
                                    <option value="completed" {{ old('status', $submission->status) == 'completed' ? 'selected' : '' }}>Instalasi Selesai</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="package_id" class="form-label">Paket</label>
                                <select class="form-select @error('package_id') is-invalid @enderror" id="package_id" name="package_id">
                                    <option value="">Belum dipilih</option>
                                    @foreach($packages as $package)
                                    <option value="{{ $package->id }}" {{ old('package_id', $submission->package_id) == $package->id ? 'selected' : '' }}>
                                        {{ $package->name }} - {{ $package->speed_mbps }} Mbps ({{ $package->formatted_price }}/bulan)
                                    </option>
                                    @endforeach
                                </select>
                                @error('package_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="installation_time" class="form-label">Waktu Instalasi Preferensi</label>
                                <select class="form-select @error('installation_time') is-invalid @enderror" id="installation_time" name="installation_time">
                                    <option value="">Belum ditentukan</option>
                                    <option value="weekday-morning" {{ old('installation_time', $submission->installation_time) == 'weekday-morning' ? 'selected' : '' }}>Hari kerja - Pagi (08:00-12:00)</option>
                                    <option value="weekday-afternoon" {{ old('installation_time', $submission->installation_time) == 'weekday-afternoon' ? 'selected' : '' }}>Hari kerja - Siang (13:00-17:00)</option>
                                    <option value="weekend" {{ old('installation_time', $submission->installation_time) == 'weekend' ? 'selected' : '' }}>Akhir pekan</option>
                                    <option value="flexible" {{ old('installation_time', $submission->installation_time) == 'flexible' ? 'selected' : '' }}>Fleksibel</option>
                                </select>
                                @error('installation_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="notes" class="form-label">Catatan Internal</label>
                                <textarea class="form-control @error('notes') is-invalid @enderror" 
                                          id="notes" name="notes" rows="4" 
                                          placeholder="Catatan untuk follow-up, jadwal instalasi, dll...">{{ old('notes', $submission->notes) }}</textarea>
                                @error('notes')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Read-only customer info -->
                            <div class="border rounded p-3 mb-4" style="background-color: #f8f9fa;">
                                <h6 class="fw-bold mb-3">Informasi Pelanggan (Read-only)</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="mb-1"><strong>Nama:</strong> {{ $submission->name }}</p>
                                        <p class="mb-1"><strong>Telepon:</strong> {{ $submission->phone }}</p>
                                        @if($submission->whatsapp)
                                        <p class="mb-1"><strong>WhatsApp:</strong> {{ $submission->whatsapp }}</p>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        @if($submission->email)
                                        <p class="mb-1"><strong>Email:</strong> {{ $submission->email }}</p>
                                        @endif
                                        <p class="mb-1"><strong>Alamat:</strong> {{ Str::limit($submission->address, 50) }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.submissions.show', $submission) }}" class="btn btn-secondary me-2">Batal</a>
                                <button type="submit" class="btn btn-primary">Update Status</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection