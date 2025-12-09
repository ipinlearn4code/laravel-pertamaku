@extends('layouts.app')

@section('title', 'Kelola Paket Internet - Admin')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold">Paket Internet</h2>
                <p class="text-muted mb-0">Kelola paket internet yang ditawarkan</p>
            </div>
            <a href="{{ route('admin.packages.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Tambah Paket
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nama Paket</th>
                                <th>Kecepatan</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>Populer</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($packages as $package)
                            <tr>
                                <td>
                                    <strong>{{ $package->name }}</strong>
                                    @if($package->description)
                                    <br><small class="text-muted">{{ Str::limit($package->description, 50) }}</small>
                                    @endif
                                </td>
                                <td>{{ $package->speed_mbps }} Mbps</td>
                                <td>{{ $package->formatted_price }}/bulan</td>
                                <td>
                                    @if($package->is_active)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-danger">Nonaktif</span>
                                    @endif
                                </td>
                                <td>
                                    @if($package->is_popular)
                                        <i class="fas fa-star text-warning"></i>
                                    @else
                                        <i class="fas fa-star text-muted"></i>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.packages.edit', $package) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="confirmDelete({{ $package->id }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    
                                    <form id="delete-form-{{ $package->id }}" action="{{ route('admin.packages.destroy', $package) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Belum ada paket internet</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{ $packages->links() }}
            </div>
        </div>
    </div>
</section>

<script>
function confirmDelete(id) {
    if (confirm('Apakah Anda yakin ingin menghapus paket ini?')) {
        document.getElementById('delete-form-' + id).submit();
    }
}
</script>
@endsection