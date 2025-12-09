@extends('layouts.app')

@section('title', 'Blog - AlpiNet')

@section('content')
<!-- Page Header -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-4">Blog AlpiNet</h1>
                <p class="lead">
                    Koleksi artikel terbaru tentang teknologi internet, tips networking, dan update industri telekomunikasi.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            @if($posts->count() > 0)
                @foreach($posts as $post)
                <div class="col-lg-6">
                    <div class="card h-100 border-0 shadow-sm card-hover">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <span class="badge bg-primary">{{ $post->formatted_published_date }}</span>
                                <small class="text-muted">By {{ $post->author->name }}</small>
                            </div>
                            <h5 class="card-title fw-bold">
                                <a href="{{ route('blog.show', $post->slug) }}" class="text-decoration-none text-dark">
                                    {{ $post->title }}
                                </a>
                            </h5>
                            <p class="card-text text-muted">{{ $post->summary }}</p>
                            <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-outline-primary">
                                <i class="fas fa-arrow-right me-2"></i>Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12">
                    <div class="card border-0 shadow-sm text-center p-5">
                        <div class="card-body">
                            <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                            <h5>Belum Ada Artikel</h5>
                            <p class="text-muted">Artikel blog akan segera hadir. Stay tuned!</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Pagination -->
        @if($posts->hasPages())
        <div class="d-flex justify-content-center mt-5">
            {{ $posts->links() }}
        </div>
        @endif

        <!-- Blog Stats -->
        <div class="row mt-5">
            <div class="col-lg-8 mx-auto">
                <div class="card bg-primary text-white border-0">
                    <div class="card-body text-center p-4">
                        <h5 class="fw-bold mb-3">📊 Statistik Blog</h5>
                        <div class="row">
                            <div class="col-6">
                                <div class="h4 fw-bold">{{ $posts->total() }}</div>
                                <div class="small opacity-75">Total Artikel</div>
                            </div>
                            <div class="col-6">
                                <div class="h4 fw-bold">{{ $posts->lastPage() }}</div>
                                <div class="small opacity-75">Total Halaman</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
