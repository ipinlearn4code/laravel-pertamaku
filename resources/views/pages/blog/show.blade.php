@extends('layouts.app')

@section('title', $post->title . ' - Blog AlpiNet')

@section('content')
<!-- Page Header -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-5 fw-bold mb-4">{{ $post->title }}</h1>
                <div class="d-flex justify-content-center align-items-center gap-3 text-light">
                    <span><i class="fas fa-calendar me-1"></i>{{ $post->formatted_published_date }}</span>
                    <span>•</span>
                    <span><i class="fas fa-user me-1"></i>{{ $post->author->name }}</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <!-- Back Button -->
        <div class="mb-4">
            <a href="{{ route('blog.index') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left me-2"></i>Kembali ke Blog
            </a>
        </div>

        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- Article Card -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <!-- Article Summary -->
                        <div class="alert alert-info border-0" role="alert">
                            <h6 class="alert-heading"><i class="fas fa-info-circle me-2"></i>Ringkasan</h6>
                            <p class="mb-0">{{ $post->summary }}</p>
                        </div>

                        <!-- Article Content -->
                        <div class="mt-4">
                            <div class="content-wrapper">
                                {!! nl2br(e($post->content)) !!}
                            </div>
                        </div>

                        <!-- Article Tags -->
                        <div class="mt-5 pt-4 border-top">
                            <h6 class="fw-bold mb-3">Tags:</h6>
                            <div class="d-flex flex-wrap gap-2">
                                @php
                                    $tags = match($post->id) {
                                        1 => ['Laravel', 'PHP', 'Framework', 'Web Development'],
                                        2 => ['PHP', 'Programming', 'Tips', 'Beginner'],
                                        3 => ['Database', 'Design', 'Best Practices', 'SQL'],
                                        4 => ['Frontend', 'Backend', 'Web Development', 'Career'],
                                        default => ['Web Security', 'Security', 'Best Practices', 'Programming']
                                    };
                                @endphp

                                @foreach($tags as $tag)
                                    <span class="badge bg-light text-dark">{{ $tag }}</span>
                                @endforeach
                            </div>
                        </div>

                        <!-- Share Section -->
                        <div class="mt-4 pt-4 border-top">
                            <h6 class="fw-bold mb-3">Bagikan Artikel:</h6>
                            <div class="d-flex gap-2">
                                <a href="https://wa.me/?text=Baca artikel menarik: {{ $post->title }} - {{ url()->current() }}" 
                                   target="_blank" class="btn btn-success btn-sm">
                                    <i class="fab fa-whatsapp me-2"></i>WhatsApp
                                </a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" 
                                   target="_blank" class="btn btn-primary btn-sm">
                                    <i class="fab fa-facebook me-2"></i>Facebook
                                </a>
                                <button type="button" class="btn btn-secondary btn-sm" onclick="copyToClipboard()">
                                    <i class="fas fa-link me-2"></i>Copy Link
                                </button>
                            </div>
                        </div>

                        <!-- Author Info -->
                        <div class="mt-5 pt-4 border-top">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                                     style="width: 50px; height: 50px;">
                                    <i class="fas fa-user fa-lg"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ $post->author->name }}</h6>
                                    <p class="text-muted mb-0 small">Content Creator AlpiNet</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Related Posts -->
                <div class="mt-5">
                    <h5 class="fw-bold mb-4">Artikel Lainnya</h5>
                    <div class="row g-3">
                        @php
                            $relatedPosts = \App\Models\BlogPost::published()
                                            ->where('id', '!=', $post->id)
                                            ->latest()
                                            ->take(2)
                                            ->get();
                        @endphp
                        
                        @foreach($relatedPosts as $relatedPost)
                        <div class="col-md-6">
                            <div class="card border-0 shadow-sm card-hover h-100">
                                <div class="card-body">
                                    <h6 class="card-title fw-bold">
                                        <a href="{{ route('blog.show', $relatedPost->slug) }}" 
                                           class="text-decoration-none text-dark">
                                            {{ $relatedPost->title }}
                                        </a>
                                    </h6>
                                    <p class="card-text text-muted small">{{ Str::limit($relatedPost->summary, 100) }}</p>
                                    <small class="text-muted">{{ $relatedPost->formatted_published_date }}</small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
function copyToClipboard() {
    navigator.clipboard.writeText(window.location.href).then(function() {
        alert('Link artikel berhasil disalin!');
    });
}
</script>
@endpush
@endsection
                    <button class="text-blue-600 hover:text-blue-800 transition-colors">
                        👍 Like
                    </button>
                    <button class="text-green-600 hover:text-green-800 transition-colors">
                        🔗 Share
                    </button>
                </div>
            </div>
        </div>
    </article>

    <!-- Related Articles -->
    <div class="mt-8 bg-white rounded-lg shadow-sm p-8">
        <h3 class="text-2xl font-bold text-gray-800 mb-6">Artikel Terkait</h3>
        
        @php
            $relatedPosts = [
                ['id' => 2, 'title' => 'Tips dan Trik PHP untuk Pemula', 'date' => '10 Jan 2024'],
                ['id' => 3, 'title' => 'Database Design Best Practices', 'date' => '5 Jan 2024']
            ];
        @endphp

        <div class="grid md:grid-cols-2 gap-6">
            @foreach($relatedPosts as $relatedPost)
                @if($relatedPost['id'] != $post['id'])
                    <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                        <h4 class="font-semibold text-gray-800 mb-2">{{ $relatedPost['title'] }}</h4>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">{{ $relatedPost['date'] }}</span>
                            <a href="{{ route('blog.show', $relatedPost['id']) }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                Baca →
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
