@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold">Admin Dashboard</h2>
                    <p class="text-muted mb-0">Welcome back, {{ auth()->user()->name }}!</p>
                </div>
                <div class="dropdown">
                    <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user me-2"></i>{{ auth()->user()->name }}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row g-4 mb-5">
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <a href="{{ route('admin.blog.index') }}" class="text-decoration-none text-dark">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 50px; height: 50px;">
                                        <i class="fas fa-newspaper"></i>
                                    </div>
                                    <div>
                                        <h3 class="fw-bold mb-0">{{ \App\Models\BlogPost::count() }}</h3>
                                        <small class="text-muted">Total Posts</small>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <a href="{{ route('admin.packages.index') }}" class="text-decoration-none text-dark">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 50px; height: 50px;">
                                        <i class="fas fa-wifi"></i>
                                    </div>
                                    <div>
                                        <h3 class="fw-bold mb-0">{{ \App\Models\InternetPackage::count() }}</h3>
                                        <small class="text-muted">Paket Internet</small>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <a href="{{ route('admin.submissions.index') }}" class="text-decoration-none text-dark">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 50px; height: 50px;">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div>
                                        <h3 class="fw-bold mb-0">{{ \App\Models\ContactSubmission::count() }}</h3>
                                        <small class="text-muted">Pendaftaran</small>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <a href="{{ route('admin.service-areas.index') }}" class="text-decoration-none text-dark">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 50px; height: 50px;">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div>
                                        <h3 class="fw-bold mb-0">{{ \App\Models\ServiceArea::count() }}</h3>
                                        <small class="text-muted">Area Layanan</small>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">Pendaftaran Terbaru</h5>
                        </div>
                        <div class="card-body">
                            @php
                                $recentSubmissions = \App\Models\ContactSubmission::with('package')->latest()->limit(5)->get();
                            @endphp
                            @if($recentSubmissions->count() > 0)
                                <div class="list-group list-group-flush">
                                    @foreach($recentSubmissions as $submission)
                                        <div class="list-group-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="mb-1">{{ $submission->name }}</h6>
                                                    <p class="mb-1 text-muted small">{{ $submission->phone }}</p>
                                                    <small class="text-muted">{{ $submission->created_at->diffForHumans() }}</small>
                                                </div>
                                                <div class="text-end">
                                                    @if($submission->package)
                                                        <span class="badge bg-primary">{{ $submission->package->name }}</span>
                                                    @endif
                                                    <br>
                                                    @php
                                                        $statusClasses = [
                                                            'pending' => 'bg-warning',
                                                            'contacted' => 'bg-info',
                                                            'scheduled' => 'bg-primary',
                                                            'completed' => 'bg-success'
                                                        ];
                                                    @endphp
                                                    <span class="badge {{ $statusClasses[$submission->status] ?? 'bg-secondary' }}">
                                                        {{ ucfirst($submission->status) }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="mt-3 text-center">
                                    <a href="{{ route('admin.submissions.index') }}" class="btn btn-outline-primary">Lihat
                                        Semua</a>
                                </div>
                            @else
                                <p class="text-muted text-center">Belum ada pendaftaran</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">Status Pendaftaran</h5>
                        </div>
                        <div class="card-body">
                            @php
                                $statusCounts = \App\Models\ContactSubmission::selectRaw('status, COUNT(*) as count')
                                    ->groupBy('status')
                                    ->pluck('count', 'status');
                                $statusLabels = [
                                    'pending' => 'Menunggu',
                                    'contacted' => 'Dihubungi',
                                    'scheduled' => 'Dijadwalkan',
                                    'completed' => 'Selesai'
                                ];
                            @endphp

                            @foreach($statusLabels as $status => $label)
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span>{{ $label }}</span>
                                    <span class="badge {{ $statusClasses[$status] ?? 'bg-secondary' }}">
                                        {{ $statusCounts[$status] ?? 0 }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm mt-4">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">Quick Links</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <a href="{{ route('admin.service-areas.index') }}" class="btn btn-outline-secondary btn-sm">
                                    <i class="fas fa-map me-2"></i>Area Layanan
                                </a>
                                <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-secondary btn-sm">
                                    <i class="fas fa-newspaper me-2"></i>Blog Posts
                                </a>
                                <a href="{{ route('home') }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-globe me-2"></i>Lihat Website
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection