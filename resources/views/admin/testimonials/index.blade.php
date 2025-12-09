@extends('layouts.app')

@section('title', 'Kelola Testimoni - Admin AlpiNet')

@section('content')
<section class="py-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="fw-bold">Kelola Testimoni</h1>
                    <a href="{{ route('testimonials.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Tambah Testimoni
                    </a>
                </div>

                @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>{{ Session::get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- Stats Cards -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-comments fa-2x text-primary mb-2"></i>
                                <h4 class="fw-bold">{{ \App\Models\Testimonial::count() }}</h4>
                                <small class="text-muted">Total Testimoni</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-eye fa-2x text-success mb-2"></i>
                                <h4 class="fw-bold text-success">{{ \App\Models\Testimonial::published()->count() }}</h4>
                                <small class="text-muted">Dipublikasikan</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-clock fa-2x text-warning mb-2"></i>
                                <h4 class="fw-bold text-warning">{{ \App\Models\Testimonial::unpublished()->count() }}</h4>
                                <small class="text-muted">Menunggu Review</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-calendar-today fa-2x text-info mb-2"></i>
                                <h4 class="fw-bold text-info">{{ \App\Models\Testimonial::whereDate('created_at', today())->count() }}</h4>
                                <small class="text-muted">Hari Ini</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonials Table -->
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Lokasi</th>
                                        <th>Testimoni</th>
                                        <th>Kontak</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($testimonials as $testimonial)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2" 
                                                     style="width: 35px; height: 35px; font-size: 14px;">
                                                    {{ strtoupper(substr($testimonial->name, 0, 1)) }}
                                                </div>
                                                <strong>{{ $testimonial->name }}</strong>
                                            </div>
                                        </td>
                                        <td>{{ $testimonial->location }}</td>
                                        <td>
                                            <p class="mb-0" style="max-width: 300px;">
                                                {{ Str::limit($testimonial->message, 100) }}
                                            </p>
                                        </td>
                                        <td>
                                            @if($testimonial->email)
                                                <small class="d-block">
                                                    <i class="fas fa-envelope me-1"></i>{{ $testimonial->email }}
                                                </small>
                                            @endif
                                            @if($testimonial->phone)
                                                <small class="d-block">
                                                    <i class="fas fa-phone me-1"></i>{{ $testimonial->phone }}
                                                </small>
                                            @endif
                                            @if(!$testimonial->email && !$testimonial->phone)
                                                <small class="text-muted">Tidak ada</small>
                                            @endif
                                        </td>
                                        <td>
                                            @if($testimonial->is_published)
                                                <span class="badge bg-success">
                                                    <i class="fas fa-eye me-1"></i>Dipublikasikan
                                                </span>
                                                <small class="d-block text-muted">
                                                    {{ $testimonial->published_at?->format('d M Y') }}
                                                </small>
                                            @else
                                                <span class="badge bg-warning text-dark">
                                                    <i class="fas fa-clock me-1"></i>Menunggu Review
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <small>{{ $testimonial->created_at->format('d M Y H:i') }}</small>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group">
                                                <!-- Toggle Publish Button -->
                                                <form action="{{ route('admin.testimonials.toggle-publish', $testimonial) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    @if($testimonial->is_published)
                                                        <button type="submit" class="btn btn-outline-warning" 
                                                                title="Unpublish"
                                                                onclick="return confirm('Yakin ingin menyembunyikan testimoni ini?')">
                                                            <i class="fas fa-eye-slash"></i>
                                                        </button>
                                                    @else
                                                        <button type="submit" class="btn btn-outline-success" 
                                                                title="Publish"
                                                                onclick="return confirm('Yakin ingin mempublikasikan testimoni ini?')">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                    @endif
                                                </form>

                                                <!-- Edit Button -->
                                                <a href="{{ route('admin.testimonials.edit', $testimonial) }}" 
                                                   class="btn btn-outline-primary" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <!-- Delete Button -->
                                                <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger" 
                                                            title="Hapus"
                                                            onclick="return confirm('Yakin ingin menghapus testimoni ini? Aksi ini tidak dapat dibatalkan.')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-5">
                                            <i class="fas fa-comments fa-3x text-muted mb-3"></i>
                                            <p class="text-muted">Belum ada testimoni yang masuk.</p>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        @if($testimonials->hasPages())
                        <div class="d-flex justify-content-center mt-4">
                            {{ $testimonials->links() }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection