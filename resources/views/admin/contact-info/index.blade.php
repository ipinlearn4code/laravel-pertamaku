@extends('layouts.app')

@section('title', 'Kelola Kontak Info - Admin')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold">Informasi Kontak</h2>
                <p class="text-muted mb-0">Kelola informasi kontak perusahaan</p>
            </div>
            <a href="{{ route('admin.contact-info.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Tambah Kontak
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
                                <th>Tipe</th>
                                <th>Label</th>
                                <th>Nilai</th>
                                <th>Status</th>
                                <th>Primary</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($contactInfos as $info)
                            <tr>
                                <td>
                                    @php
                                        $typeLabels = [
                                            'address' => 'Alamat',
                                            'phone' => 'Telepon',
                                            'email' => 'Email',
                                            'whatsapp' => 'WhatsApp',
                                            'hours' => 'Jam Operasional'
                                        ];
                                        $typeIcons = [
                                            'address' => 'fa-map-marker-alt',
                                            'phone' => 'fa-phone',
                                            'email' => 'fa-envelope',
                                            'whatsapp' => 'fab fa-whatsapp',
                                            'hours' => 'fa-clock'
                                        ];
                                    @endphp
                                    <i class="fas {{ $typeIcons[$info->type] ?? 'fa-info' }} me-2"></i>
                                    {{ $typeLabels[$info->type] ?? ucfirst($info->type) }}
                                </td>
                                <td>{{ $info->label ?? '-' }}</td>
                                <td>
                                    @if($info->type == 'hours' || $info->type == 'address')
                                        {{ Str::limit(str_replace("\n", " • ", $info->value), 50) }}
                                    @else
                                        {{ $info->value }}
                                    @endif
                                </td>
                                <td>
                                    @if($info->is_active)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-danger">Nonaktif</span>
                                    @endif
                                </td>
                                <td>
                                    @if($info->is_primary)
                                        <i class="fas fa-star text-warning"></i>
                                    @else
                                        <i class="fas fa-star text-muted"></i>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.contact-info.edit', $info) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="confirmDelete({{ $info->id }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    
                                    <form id="delete-form-{{ $info->id }}" action="{{ route('admin.contact-info.destroy', $info) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Belum ada informasi kontak</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{ $contactInfos->links() }}
            </div>
        </div>
    </div>
</section>

<script>
function confirmDelete(id) {
    if (confirm('Apakah Anda yakin ingin menghapus informasi kontak ini?')) {
        document.getElementById('delete-form-' + id).submit();
    }
}
</script>
@endsection