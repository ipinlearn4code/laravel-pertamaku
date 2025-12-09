@extends('layouts.app')

@section('title', 'Area Layanan - Admin')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-start mb-4">
            <div>
                <h2 class="fw-bold mb-2">Kelola Area Layanan</h2>
                <p class="text-muted">Kelola wilayah jangkauan layanan internet</p>
            </div>
            <a href="{{ route('admin.service-areas.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Area
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Search & Filter -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-3">
                <form method="GET" action="{{ route('admin.service-areas.index') }}" class="row g-3">
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="search" value="{{ request('search') }}" 
                               placeholder="Cari area/nama...">
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" name="status">
                            <option value="">Semua Status</option>
                            <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Aktif</option>
                            <option value="planned" {{ request('status') === 'planned' ? 'selected' : '' }}>Planned</option>
                            <option value="maintenance" {{ request('status') === 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-outline-primary w-100">
                            <i class="fas fa-search"></i> Cari
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Data Table -->
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                @if($serviceAreas->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="25%">Area</th>
                                    <th width="20%">Nama</th>
                                    <th width="15%">RT/RW</th>
                                    <th width="15%">Status</th>
                                    <th width="20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($serviceAreas as $index => $area)
                                    <tr>
                                        <td>{{ $serviceAreas->firstItem() + $index }}</td>
                                        <td>
                                            <div class="fw-semibold">{{ $area->area }}</div>
                                            <small class="text-muted">{{ $area->district ?? '-' }}</small>
                                        </td>
                                        <td>
                                            <div class="fw-semibold">{{ $area->name }}</div>
                                            @if($area->description)
                                                <small class="text-muted">{{ Str::limit($area->description, 50) }}</small>
                                            @endif
                                        </td>
                                        <td>
                                            @if($area->rt || $area->rw)
                                                <span class="badge bg-light text-dark">
                                                    RT {{ $area->rt ?? '-' }} / RW {{ $area->rw ?? '-' }}
                                                </span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            @switch($area->status)
                                                @case('active')
                                                    <span class="badge bg-success">Aktif</span>
                                                    @break
                                                @case('planned')
                                                    <span class="badge bg-warning">Planned</span>
                                                    @break
                                                @case('maintenance')
                                                    <span class="badge bg-danger">Maintenance</span>
                                                    @break
                                                @default
                                                    <span class="badge bg-secondary">{{ ucfirst($area->status) }}</span>
                                            @endswitch
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.service-areas.edit', $area) }}" 
                                                   class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.service-areas.destroy', $area) }}" 
                                                      method="POST" class="d-inline"
                                                      onsubmit="return confirm('Yakin ingin hapus area {{ $area->name }}?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    @if($serviceAreas->hasPages())
                        <div class="card-footer border-top">
                            {{ $serviceAreas->withQueryString()->links('pagination::bootstrap-4') }}
                        </div>
                    @endif
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-map-marker-alt fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Belum ada area layanan</h5>
                        <p class="text-muted">Mulai dengan menambahkan area layanan pertama</p>
                        <a href="{{ route('admin.service-areas.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah Area Layanan
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection