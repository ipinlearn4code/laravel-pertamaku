@extends('layouts.app')

@section('title', 'Pendaftaran Pelanggan - Admin')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold">Pendaftaran Pelanggan</h2>
                <p class="text-muted mb-0">Kelola pendaftaran dari calon pelanggan</p>
            </div>
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
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Kontak</th>
                                <th>Paket</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($submissions as $submission)
                            <tr>
                                <td>
                                    {{ $submission->created_at->format('d M Y') }}
                                    <br><small class="text-muted">{{ $submission->created_at->format('H:i') }}</small>
                                </td>
                                <td>
                                    <strong>{{ $submission->name }}</strong>
                                    <br><small class="text-muted">{{ Str::limit($submission->address, 30) }}</small>
                                </td>
                                <td>
                                    <span class="text-primary">{{ $submission->phone }}</span>
                                    @if($submission->whatsapp)
                                        <br><small class="text-success">WA: {{ $submission->whatsapp }}</small>
                                    @endif
                                </td>
                                <td>
                                    @if($submission->package)
                                        {{ $submission->package->name }}
                                        <br><small class="text-muted">{{ $submission->package->speed_mbps }} Mbps</small>
                                    @else
                                        <span class="text-muted">Belum dipilih</span>
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $statusClasses = [
                                            'pending' => 'bg-warning',
                                            'contacted' => 'bg-info',
                                            'scheduled' => 'bg-primary',
                                            'completed' => 'bg-success'
                                        ];
                                        $statusLabels = [
                                            'pending' => 'Menunggu',
                                            'contacted' => 'Dihubungi',
                                            'scheduled' => 'Dijadwalkan',
                                            'completed' => 'Selesai'
                                        ];
                                    @endphp
                                    <span class="badge {{ $statusClasses[$submission->status] ?? 'bg-secondary' }}">
                                        {{ $statusLabels[$submission->status] ?? $submission->status }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.submissions.show', $submission) }}" class="btn btn-sm btn-outline-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.submissions.edit', $submission) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="confirmDelete({{ $submission->id }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    
                                    <form id="delete-form-{{ $submission->id }}" action="{{ route('admin.submissions.destroy', $submission) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Belum ada pendaftaran</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{ $submissions->links() }}
            </div>
        </div>
    </div>
</section>

<script>
function confirmDelete(id) {
    if (confirm('Apakah Anda yakin ingin menghapus data pendaftaran ini?')) {
        document.getElementById('delete-form-' + id).submit();
    }
}
</script>
@endsection